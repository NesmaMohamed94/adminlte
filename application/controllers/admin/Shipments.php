<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Shipments extends MY_Controller {

		public function __construct(){

			parent::__construct();
			auth_check(); // check login auth
			$this->rbac->check_module_access();
			$this->load->helper('string');
			$this->load->model('admin/shipments_model', 'shipment');
			$this->load->model('admin/Activity_model', 'activity_model');
			$this->load->helper('pdf_helper'); // loaded pdf helper
		}

		//---------------------------------------------------
		// Get All Shipments
		public function index(){

			$data['shipments'] = $this->shipment->get_all_shipments();

			$this->load->view('admin/includes/_header');
        	$this->load->view('admin/shipments/list', $data);
        	$this->load->view('admin/includes/_footer');
		}

		//---------------------------------------------------
		// Add New Shipments
		public function add()
		{
			$this->rbac->check_operation_access(); // check opration permission

			if($this->input->post('submit')){
				$data = array(
					'vshipment_id' => random_string('numeric',14),
					'trans_type' => $this->input->post('trans_type'),
					'description' => $this->input->post('description'),
					'critical' => $this->input->post('critical'),
					'cod' => $this->input->post('cod'),
					'numpc' => $this->input->post('numpc'),
					'vendor_id' => $this->input->post('vendor_id'),
					'branch_id' => $this->input->post('branch_id'),
					'payment_type' => $this->input->post('payment_type'),
					'weight' => $this->input->post('weight'),
					'dimension' => $this->input->post('dimension'),
					'reference' => $this->input->post('reference'),
					'currency' => $this->input->post('currency'),
					'live_time' => $this->input->post('live_time'),
					'note' => $this->input->post('note'),
					'content' => $this->input->post('content'),
					'declare_value' => $this->input->post('declare_value'),
					'dropoff_contact_name' => $this->input->post('dropoff_contact_name'),
					'dropoff_contact_number' => $this->input->post('dropoff_contact_number'),
					'dropoff_address' => $this->input->post('dropoff_address'),
					'dropoff_addr_type' => $this->input->post('dropoff_addr_type'),
					'dropoff_set_by' => $this->session->userdata('admin_id'),
					'dropoff_email' => $this->input->post('dropoff_email'),
					'dropoff_city' => $this->input->post('dropoff_city'),
					'dropoff_country' => $this->input->post('dropoff_country'),
					'dropoff_dist' => $this->input->post('dropoff_dist'),
					'dropoff_street' => $this->input->post('dropoff_street'),
					'dropoff_zipcode' => $this->input->post('dropoff_zipcode'),
					'dropoff_building' => $this->input->post('dropoff_building'),
					'dropoff_extra' => $this->input->post('dropoff_extra'),
					'customer_extra' => $this->input->post('customer_extra'),
					'customer_name' => $this->input->post('customer_name'),
					'contact_number' => $this->input->post('customer_contact_number'),
					'email' => $this->input->post('customer_email'),
					'insurance' => $this->input->post('insurance'),
					'delivery_address' => $this->input->post('delivery_address'),
					'customer_addr_type ' => $this->input->post('customer_addr_type '),
					'customer_country' => $this->input->post('customer_country'),
					'customer_city' => $this->input->post('customer_city'),
					'customer_dist' => $this->input->post('customer_dist'),
					'customer_street' => $this->input->post('customer_street'),
					'customer_zipcode' => $this->input->post('customer_zipcode'),
					'customer_building' => $this->input->post('customer_building'),
					'customer_extra' => $this->input->post('customer_extra'),
					'delivery_date' => date('Y-m-d h:m:s'),
					'received_date' =>date('Y-m-d h:m:s'),
					// 'delivery_date' => date('Y-m-d', strtotime($this->input->post('delivery_date'))),
					// 'received_date' => date('Y-m-d', strtotime($this->input->post('received_date'))),
					'created_at' => date('Y-m-d h:m:s')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->shipment->add_shipment($data);
                if ($result) {

                    // Activity Log
                    $this->activity_model->add_log(4);
                    $this->session->set_flashdata('success', 'Shipment has been added successfully!');
                    redirect(base_url('admin/shipments'));
                }
			}
			else{
				$data['title'] = 'Shipments';
				$data['vendors'] =  $this->shipment->vendors();
				$data['branches'] =  $this->shipment->branches();
				$this->load->view('admin/includes/_header');
        		$this->load->view('admin/shipments/add', $data);
        		$this->load->view('admin/includes/_footer');
			}
			
		}

		
		//---------------------------------------------------
		// Get View Invoice
		public function view($id=0){

			$this->rbac->check_operation_access(); // check opration permission

			$data['invoice_detail'] = $this->shipments->get_invoice_by_id($id);

			$this->load->view('admin/includes/_header');
        	$this->load->view('admin/invoices/invoice_view', $data);
        	$this->load->view('admin/includes/_footer');
		}

		//---------------------------------------------------
		// Edit Invoice
		public function edit($id=0){

			$this->rbac->check_operation_access(); // check opration permission

			if($this->input->post('submit')){
				$data = array(
					'cod' => $this->input->post('cod'),
					'branch_id' => $this->input->post('branch_id'),
					'dropoff_contact_number' => $this->input->post('dropoff_contact_number'),
					'dropoff_city' => $this->input->post('dropoff_city'),
					'contact_number' => $this->input->post('customer_contact_number'),
					'customer_city' => $this->input->post('customer_city'),
					'updated_at' => date('Y-m-d h:m:s')
				);

					$shipment_data = $this->security->xss_clean($data);
						
					$result = $this->shipment->update_shipment($shipment_data, $id);
					if($result){
						// Activity Log 
						$this->activity_model->add_log(8);
						$this->session->set_flashdata('success', 'Shipment has been updated Successfully!');
						redirect(base_url('admin/shipments/edit/'.$id));
					}
				}	
			
			else{
				$data['shipment'] = $this->shipment->get_shipment_by_id($id);
				$data['title'] = 'Edit Shipment';
				$data['branches']  = $this->shipment->branches();

				$this->load->view('admin/includes/_header');
        		$this->load->view('admin/shipments/edit', $data);
        		$this->load->view('admin/includes/_footer');
			}
		}
	}

?>	