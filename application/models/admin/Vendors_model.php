<?php defined('BASEPATH') or exit('No direct script access allowed');

class Vendors_model extends CI_Model
{

    //-----------------------------------------------------
    public function get_vendor_by_id($id)
    {
        $this->db->from('vendors');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //-----------------------------------------------------
    public function get_all()
    {

        $this->db->from('vendors');
        $this->db->order_by('vendors.id', 'desc');
        $query = $this->db->get();

        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }

    //-----------------------------------------------------
    public function add_vendor($data)
    {
        $this->db->insert('vendors', $data);
        return true;
    }

    //---------------------------------------------------
    // Edit Admin Record
    public function edit_vendor($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('vendors', $data);
        return true;
    }


}
