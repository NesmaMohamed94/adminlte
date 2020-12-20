<?php defined('BASEPATH') or exit('No direct script access allowed');

class Teams_model extends CI_Model
{

    //-----------------------------------------------------
    public function get_team_by_id($id)
    {
        $this->db->from('teams');
        $this->db->where('team_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //-----------------------------------------------------
    public function get_all()
    {

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
    public function add_team($data)
    {
        $this->db->insert('teams', $data);
        return true;
    }

    //---------------------------------------------------
    // Edit Team Record
    public function edit_team($data, $id)
    {
        $this->db->where('team_id', $id);
        $this->db->update('teams', $data);
        return true;
    }


}
