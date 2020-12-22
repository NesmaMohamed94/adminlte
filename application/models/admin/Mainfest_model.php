<?php
	class Mainfest_model extends CI_Model{

		//---------------------------------------------------
		// Insert New Invoice
		public function add_mainfest_header($data){
            $this->db->insert('mainfest_header', $data);
             $this->db->from("mainfest_header");
             $this->db->order_by('id', 'desc');
            return  $this->db->get()->row()->id;
		}

		//---------------------------------------------------
		// Insert New Invoice
		public function add_mainfest($data){
			$this->db->insert('mainfest', $data);
			return $this->db->insert_id();
		}

		//---------------------------------------------------
		// Get Add Invoices
		public function get_all_mainfest(){
			$this->db->select('
					mainfest_header.id as header_id,
	    			mainfest_header.created_at,
	    			warehouses.warehouse_name,
	    			vendors.user_name,
					ci_admin.username,
					mainfest_header.to_from,
					mainfest_header.type,
					mainfest_header.note,
					mainfest_header.posted,
					mainfest.vshipment_id,
					mainfest.id'
	    	);
	    	$this->db->from('mainfest_header');
	    	$this->db->join('mainfest', 'mainfest_header.id = mainfest.mainfest_id');
	    	$this->db->join('warehouses', 'warehouses.warehouse_no = mainfest_header.warehouse_no');
	    	$this->db->join('vendors', 'vendors.id = mainfest_header.to_from_id');
	    	$this->db->join('ci_admin', 'ci_admin.admin_id = mainfest_header.created_by');
	    	$query = $this->db->get();					 
			return $query->result_array();
		}

		//---------------------------------------------------
		// Get Invoice Detil by ID
		public function get_invoice_by_id($id){

			$this->db->select('
					ci_payments.id,
					ci_payments.user_id as client_id,
	    			ci_payments.invoice_no,
	    			ci_payments.items_detail,
	    			ci_payments.payment_status,
	    			ci_payments.sub_total,
	    			ci_payments.total_tax,
	    			ci_payments.discount,
					ci_payments.grand_total,
					ci_payments.currency,
					ci_payments.client_note,
					ci_payments.termsncondition,
					ci_payments.due_date,
					ci_payments.created_date,
					ci_users.username as client_name,
					ci_users.firstname,
					ci_users.lastname,
					ci_users.email as client_email,
					ci_users.mobile_no as client_mobile_no,
					ci_users.address as client_address,
					ci_companies.id as company_id,
					ci_companies.name as company_name,
					ci_companies.email as company_email,
					ci_companies.address1 as company_address1,
					ci_companies.address2 as company_address2,
					ci_companies.mobile_no as company_mobile_no,
					'
	    	);
	    	$this->db->from('ci_payments');
	    	$this->db->join('ci_users', 'ci_users.id = ci_payments.user_id ', 'Left');
	    	$this->db->join('ci_companies', 'ci_companies.id = ci_payments.company_id ', 'Left');
	    	$this->db->where('ci_payments.id' , $id);
	    	$query = $this->db->get();					 
			return $query->row_array();

		}



		//---------------------------------------------------
		// Get Invoice Detil by ID
		public function update_invoice($data, $id){
			$this->db->where('id', $id);
			return $this->db->update('ci_payments', $data);
		}

		//---------------------------------------------------
		// Update Customer Detail in invoice
		public function update_company($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_companies', $data);
			return $id; // return the updated id
		}

		
	}

?>