<?php defined('BASEPATH') or exit('No direct script access allowed');

class Shipments_model extends CI_Model
{

    //-----------------------------------------------------
    public function get_shipment_by_id($id)
    {
		$this->db->from('shipments');
        $this->db->select('shipments.*,vendors.id as vendor_id,vendors.user_name,branches.id as branch_id,branches.branch_name');
		$this->db->join('vendors', 'vendors.id=shipments.vendor_id');
		$this->db->join('branches', 'branches.id=shipments.branch_id');
        $this->db->where('shipments.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //-----------------------------------------------------
    public function get_all_shipments()
    {

        $this->db->from('shipments');
        $this->db->select('shipments.*,vendors.id as vendor_id,vendors.user_name,branches.id as branch_id,branches.branch_name');
        $this->db->join('vendors', 'vendors.id=shipments.vendor_id');
        $this->db->join('branches', 'branches.id=shipments.branch_id');
        $this->db->order_by('shipments.id', 'desc');

        $query = $this->db->get();

        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
        }

        return $module;
    }

    //-----------------------------------------------------
    public function add_shipment($data)
    {
        $this->db->insert('shipments', $data);
        return true;
    }
    //-----------------------------------------------------
    public function vendors()
    {
		$this->db->from('vendors');
		$query = $this->db->get();
        return $query->result_array();
    }
    //-----------------------------------------------------
    public function branches()
    {
		$this->db->from('branches');
		$query = $this->db->get();
        return $query->result_array();
    }

    //---------------------------------------------------
    // Edit Shipment Record
    public function update_shipment($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('shipments', $data);
        return true;
    }

}
