<?php defined('BASEPATH') or exit('No direct script access allowed');

class Drivers extends MY_Controller
{
    public function __construct()
    {

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->helper('string');
        $this->load->model('admin/drivers_model', 'driver');
        $this->load->model('admin/Activity_model', 'activity_model');
    }

    //-----------------------------------------------------
    public function index($type = '')
    {

        $data['title'] = 'Drivers List';

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/drivers/index', $data);
        $this->load->view('admin/includes/_footer');
    }

    //--------------------------------------------------
    public function list_data()
    {

        $data['info'] = $this->driver->get_all();

        $this->load->view('admin/drivers/list', $data);
    }

    //--------------------------------------------------
    public function add()
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('first_name', 'Contact Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Other Contact', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('phone', 'Number', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/drivers/add'), 'refresh');
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'team_id' => $this->input->post('team_id'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'licence_plate' => $this->input->post('licence_plate'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'date_created' => date('Y-m-d : h:m:s'),
                    'date_modified' => date('Y-m-d : h:m:s'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->driver->add_driver($data);
                if ($result) {

                    // Activity Log
                    $this->activity_model->add_log(20);
                    $this->session->set_flashdata('success', 'Driver has been added successfully!');
                    redirect(base_url('admin/drivers'));
                }
            }
        } else {
            $data['teams'] = $this->driver->teams();
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/drivers/add',$data);
            $this->load->view('admin/includes/_footer');
        }
    }

    //--------------------------------------------------
    public function edit($id = "")
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('first_name', 'Contact Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Other Contact', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('phone', 'Number', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/drivers/edit/' . $id), 'refresh');
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'team_id' => $this->input->post('team_id'),
                    'email' => $this->input->post('email'),
                    'licence_plate' => $this->input->post('licence_plate'),
                    'phone' => $this->input->post('phone'),
                    'date_modified' => date('Y-m-d : h:m:s'),
                );

                if ($this->input->post('password') != '') {
                    $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                }

                $data = $this->security->xss_clean($data);
                $result = $this->driver->edit_driver($data, $id);

                if ($result) {
                    // Activity Log
                    $this->activity_model->add_log(21);

                    $this->session->set_flashdata('success', 'Driver has been updated successfully!');
                    redirect(base_url('admin/drivers'));
                }
            }
        } elseif ($id == "") {
            redirect('admin/drivers');
        } else {
            $data['driver'] = $this->driver->get_driver_by_id($id);
            $data['teams'] = $this->driver->teams();
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/drivers/edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    //--------------------------------------------------
    public function view($id = "")
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($id == "") {
            redirect('admin/drivers');
        } else {
            $data['driver'] = $this->driver->get_driver_by_id($id);
            $this->activity_model->add_log(21);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/drivers/view', $data);
            $this->load->view('admin/includes/_footer');
        }
    }
    //-----------------------------------------------------------
	function change_status(){

		$this->rbac->check_operation_access(); // check opration permission

		$this->driver->change_status();
	}

}
