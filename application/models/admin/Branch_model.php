<?php defined('BASEPATH') or exit('No direct script access allowed');

class Branch_model extends CI_Model
{

    //-----------------------------------------------------
    public function get_branch_by_id($id)
    {
        $this->db->from('branches');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //-----------------------------------------------------
    public function get_all()
    {

        $this->db->from('branches');
        $this->db->order_by('branches.id', 'desc');
        $query = $this->db->get();

        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }

    //-----------------------------------------------------
    public function add_branch($data)
    {
        $this->db->insert('branches', $data);
        return true;
    }

    //---------------------------------------------------
    // Edit Admin Record
    public function edit_branch($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('branches', $data);
        return true;
    }

    //-----------------------------------------------------
    public function delete($id)
    {
        $this->db->where('admin_id', $id);
        $this->db->delete('ci_admin');
    }

}
