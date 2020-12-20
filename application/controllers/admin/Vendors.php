<?php defined('BASEPATH') or exit('No direct script access allowed');

class Vendors extends MY_Controller
{
    public function __construct()
    {

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->helper('string');
        $this->load->model('admin/vendors_model', 'vendor');
        $this->load->model('admin/Activity_model', 'activity_model');
    }

    //-----------------------------------------------------
    public function index($type = '')
    {

        $data['title'] = 'Vendors List';

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/vendors/index', $data);
        $this->load->view('admin/includes/_footer');
    }

    //--------------------------------------------------
    public function list_data()
    {

        $data['info'] = $this->vendor->get_all();

        $this->load->view('admin/vendors/list', $data);
    }

    //--------------------------------------------------
    public function add()
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[ci_admin.username]|required');
            $this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required');
            $this->form_validation->set_rules('other_contact', 'Other Contact', 'trim|required');
            $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');
            $this->form_validation->set_rules('company_info', 'Company Information', 'trim|required');
            $this->form_validation->set_rules('country_code', 'Country_code', 'trim|required');
            $this->form_validation->set_rules('email_address', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('mobile_number', 'Number', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/vendors/add'), 'refresh');
            } else {
                $data = array(
                    'user_name' => $this->input->post('username'),
                    'apikey' => random_string("sha1",30),
                    'contact_name' => $this->input->post('contact_name'),
                    'other_contact' => $this->input->post('other_contact'),
                    'company_name' => $this->input->post('company_name'),
                    'company_address' => $this->input->post('company_address'),
                    'company_info' => $this->input->post('company_info'),
                    'country_code' => $this->input->post('country_code'),
                    'email_address' => $this->input->post('email_address'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'created_at' => date('Y-m-d : h:m:s'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->vendor->add_vendor($data);
                if ($result) {

                    // Activity Log
                    $this->activity_model->add_log(4);

                    $this->session->set_flashdata('success', 'Vendor has been added successfully!');
                    redirect(base_url('admin/vendors'));
                }
            }
        } else {
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/vendors/add');
            $this->load->view('admin/includes/_footer');
        }
    }

    //--------------------------------------------------
    public function edit($id = "")
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[vendors.user_name]|required');
            $this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required');
            $this->form_validation->set_rules('other_contact', 'Other Contact', 'trim|required');
            $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');
            $this->form_validation->set_rules('company_info', 'Company Information', 'trim|required');
            $this->form_validation->set_rules('country_code', 'Country_code', 'trim|required');
            $this->form_validation->set_rules('email_address', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('mobile_number', 'Number', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/vendors/edit/' . $id), 'refresh');
            } else {
                $data = array(
                    'user_name' => $this->input->post('username'),
                    'contact_name' => $this->input->post('contact_name'),
                    'other_contact' => $this->input->post('other_contact'),
                    'company_name' => $this->input->post('company_name'),
                    'company_address' => $this->input->post('company_address'),
                    'company_info' => $this->input->post('company_info'),
                    'country_code' => $this->input->post('country_code'),
                    'email_address' => $this->input->post('email_address'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'status' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                );

                if ($this->input->post('password') != '') {
                    $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                }

                $data = $this->security->xss_clean($data);
                $result = $this->vendor->edit_vendor($data, $id);

                if ($result) {
                    // Activity Log
                    $this->activity_model->add_log(5);

                    $this->session->set_flashdata('success', 'Vendor has been updated successfully!');
                    redirect(base_url('admin/vendors'));
                }
            }
        } elseif ($id == "") {
            redirect('admin/vendors');
        } else {
            $data['vendor'] = $this->vendor->get_vendor_by_id($id);

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/vendors/edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    //--------------------------------------------------
    public function view($id = "")
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($id == "") {
            redirect('admin/vendors');
        } else {
            $data['vendor'] = $this->vendor->get_vendor_by_id($id);

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/vendors/view', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

}
