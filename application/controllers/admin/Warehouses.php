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
						$this->activity_model->add_log(22);
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
	
}

?>