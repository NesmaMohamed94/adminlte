<?php defined('BASEPATH') OR exit('No direct script access allowed');

class warehouses extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('admin/warehouses_model', 'warehouse');
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }

	//-----------------------------------------------------		
	function index(){

        $data['title'] = 'warehouses List';
        
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/warehouse/index', $data);
		$this->load->view('admin/includes/_footer');
	}


	//--------------------------------------------------		
	function list_data(){

		$data['info'] = $this->warehouse->get_all();

		$this->load->view('admin/warehouse/list',$data);
	}

	
	//--------------------------------------------------
	function add(){

        $this->rbac->check_operation_access(); // check opration permission
        
		if($this->input->post('submit')){
				$this->form_validation->set_rules('warehouse_name', 'Warehouse Name', 'trim|required');
				$this->form_validation->set_rules('warehouse_location', 'Warehouse Location', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/warehouses/add'),'refresh');
				}
				else{
                    $count =$this->warehouse->count_warehouses();
                    if($count == 0){
                        $random = 1000;
                    }else{
                        $value = explode("w-",$this->warehouse->get_last_random());
                        $random = $value[1] + 1;
                    }
					$data = array(
						'warehouse_no' => "w-".$random,
						'warehouse_name' => $this->input->post('warehouse_name'),
						'warehouse_location' => $this->input->post('warehouse_location'),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->warehouse->add_warehouse($data);
					if($result){
						// Activity Log 
						$this->activity_model->add_log(4);
						$this->session->set_flashdata('success', 'Warehouse has been added successfully!');
						redirect(base_url('admin/warehouses'));
					}
				}
			}
			else
			{
				$this->load->view('admin/includes/_header');
        		$this->load->view('admin/warehouse/add');
        		$this->load->view('admin/includes/_footer');
			}
	}

	//--------------------------------------------------
	function edit($id=""){

		$this->rbac->check_operation_access(); // check opration permission
		if($this->input->post('submit')){
			$this->form_validation->set_rules('branch_no', 'Branch Number', 'trim|numeric|required');
			$this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/branches/edit/'.$id),'refresh');
			}
			else{
				$data = array(
					'branch_no' => $this->input->post('branch_no'),
					'branch_name' => $this->input->post('branch_name'),
					'updated_at' => date('Y-m-d : h:m:s'),
                );
                $result = $this->branch->edit_branch($data, $id);

				if($result){
					// Activity Log 
					$this->activity_model->add_log(5);
					$this->session->set_flashdata('success', 'Branch has been updated successfully!');
					redirect(base_url('admin/branches'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/branches');
		}
		else{
			$data['branch'] = $this->branch->get_branch_by_id($id);
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/branches/edit', $data);
			$this->load->view('admin/includes/_footer');
		}		
	}
    //------------------------------------------------------------
	function delete($id=''){
	   
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->delete($id);

		// Activity Log 
		$this->activity_model->add_log(6);

		$this->session->set_flashdata('success','User has been Deleted Successfully.');	
		redirect('admin/admin');
	}
	
}

?>