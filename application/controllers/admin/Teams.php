<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('admin/teams_model', 'team');
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }

	//-----------------------------------------------------		
	function index(){

        $data['title'] = 'Teams List';
        
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/teams/index', $data);
		$this->load->view('admin/includes/_footer');
	}


	//--------------------------------------------------		
	function list_data(){

		$data['info'] = $this->team->get_all();

		$this->load->view('admin/teams/list',$data);
	}

	
	//--------------------------------------------------
	function add(){

        $this->rbac->check_operation_access(); // check opration permission
        
		if($this->input->post('submit')){
				$this->form_validation->set_rules('team_name', 'Team Name', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/teams/add'),'refresh');
				}
				else{
					$data = array(
						'team_name' => $this->input->post('team_name'),
						'date_created' => date('Y-m-d : h:m:s'),
						'date_modified' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->team->add_team($data);
					if($result){
						// Activity Log 
						$this->activity_model->add_log(18);
						$this->session->set_flashdata('success', 'Team has been added successfully!');
						redirect(base_url('admin/teams'));
					}
				}
			}
			else
			{
				$this->load->view('admin/includes/_header');
        		$this->load->view('admin/teams/add');
        		$this->load->view('admin/includes/_footer');
			}
	}

	//--------------------------------------------------
	function edit($id=""){

		$this->rbac->check_operation_access(); // check opration permission
		if($this->input->post('submit')){
			$this->form_validation->set_rules('team_name', 'Team Name', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/teams/edit/'.$id),'refresh');
			}
			else{
				$data = array(
					'team_name' => $this->input->post('team_name'),
					'date_modified' => date('Y-m-d : h:m:s'),
                );
                $result = $this->team->edit_team($data, $id);

				if($result){
					// Activity Log 
					$this->activity_model->add_log(19);
					$this->session->set_flashdata('success', 'Team has been updated successfully!');
					redirect(base_url('admin/teams'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/teams');
		}
		else{
			$data['team'] = $this->team->get_team_by_id($id);
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/teams/edit', $data);
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