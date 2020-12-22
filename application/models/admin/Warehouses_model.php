<?php defined('BASEPATH') or exit('No direct script access allowed');

class warehouses_model extends CI_Model
{

    //-----------------------------------------------------
    public function get_warehouse_by_id($id)
    {
        $this->db->from('warehouses');
        $this->db->where('warehouse_no', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //-----------------------------------------------------
    public function get_all()
    {

        $this->db->from('warehouses');
        $this->db->order_by('warehouses.warehouse_no', 'desc');
        $query = $this->db->get();

        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }

    //-----------------------------------------------------
    public function add_warehouse($data)
    {
        $this->db->insert('warehouses', $data);
        return true;
    }

    //-----------------------------------------------------
    public function count_warehouses()
    {
        $this->db->from('warehouses');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_last_random(){
        $this->db->from('warehouses');
        $this->db->order_by('warehouses.warehouse_no', 'desc');
        $query = $this->db->get();
        return $query->row()->warehouse_no;

    }

    //---------------------------------------------------
    // Edit Admin Record
    public function edit_warehouse($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('warehouses', $data);
        return true;
    }

    //-----------------------------------------------------
    public function delete($id)
    {
        $this->db->where('admin_id', $id);
        $this->db->delete('ci_admin');
    }

}
