<?php defined('BASEPATH') or exit('No direct script access allowed');

class Drivers_model extends CI_Model
{

    //-----------------------------------------------------
    public function get_driver_by_id($id)
    {
        $this->db->from('drivers');
        $this->db->select("drivers.*,teams.*");
		$this->db->join('teams', 'teams.team_id=drivers.team_id');
        $this->db->where('driver_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //-----------------------------------------------------
    public function get_all()
    {

        $this->db->from('drivers');
        $this->db->order_by('drivers.driver_id', 'desc');
        $query = $this->db->get();

        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }

    //-----------------------------------------------------
    public function add_driver($data)
    {
        $this->db->insert('drivers', $data);
        return true;
    }

    //---------------------------------------------------
    // Edit Admin Record
    public function edit_driver($data, $id)
    {
        $this->db->where('driver_id', $id);
        $this->db->update('drivers', $data);
        return true;
    }

    public function teams(){
        $this->db->from('teams');
        $this->db->order_by('teams.team_id', 'desc');
        $query = $this->db->get();

        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }
	//-----------------------------------------------------
    function change_status()
    {		
        $this->db->set('status',$this->input->post('status'));
        $this->db->where('driver_id',$this->input->post('id'));
        $this->db->update('drivers');
    }

}
