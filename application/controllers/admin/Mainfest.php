<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mainfest extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->helper('string');
        $this->load->model('admin/mainfest_model', 'mainfest');
        $this->load->model('admin/vendors_model', 'vendors');
        $this->load->model('admin/drivers_model', 'drivers');
        $this->load->model('admin/branch_model', 'branch');
        $this->load->model('admin/warehouses_model', 'warehouses');
        $this->load->model('admin/Activity_model', 'activity_model');
        $this->load->helper('pdf_helper'); // loaded pdf helper
    }

    //---------------------------------------------------
    // Get All Invoices
    public function index()
    {

        $data['mainfest_detail'] = $this->mainfest->get_all_mainfest();
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/mainfest/mainfest_list', $data);
        $this->load->view('admin/includes/_footer');
    }

    //---------------------------------------------------
    // Add New Invoices
    public function add()
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            if (empty($this->input->post('product_description'))) {
                $data = array(
                    'errors' => "AWB# is required",
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/mainfest'), 'refresh');
            } else {
                if ($this->session->userdata('user_id') != '') {
                    $created_by = $this->session->userdata('user_id');

                } else {
                    $created_by = $this->session->userdata('admin_id');

                }
                $data['mainfest_header'] = array(
                    'header_id' => "TMX-" . date('m') . date('d') . "-" . random_string('numeric', 4),
                    'warehouse_no' => $this->input->post('warehouse_no'),
                    'created_by' => $created_by,
                    'to_from_id' => $this->input->post('to_from_id'),
                    'to_from' => $this->input->post('to_from'),
                    'type' => $this->input->post('type'),
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d h:m:s'),
                );
                $data = $this->security->xss_clean($data['mainfest_header']);
                $mainfest_id = $this->mainfest->add_mainfest_header($data);
                if ($mainfest_id) {
                    $shipment_id = $this->input->post('product_description');
                    $data['mainfest'] = array(
                        'vshipment_id' => $this->input->post('product_description'),
                        'mainfest_id' => $mainfest_id,
                    );
                    $mainfest = serialize($mainfest);

                    $mainfest_data = $this->security->xss_clean($data['mainfest']);
                    foreach ($shipment_id as $value) {
                        $data['mainfest'] = array(
                            'vshipment_id' => $value,
                            'mainfest_id' => $mainfest_id,
                        );
                        $mainfest = serialize($mainfest);

                        $mainfest_data = $this->security->xss_clean($data['mainfest']);
                        $result = $this->mainfest->add_mainfest($mainfest_data);
                    }

                    // Activity Log
                    $this->activity_model->add_log(10);

                    $this->session->set_flashdata('success', 'Mainfest has been Added Successfully!');
                    redirect(base_url('admin/mainfest'));

                }
            }
            //print_r($data['invoice_data']);
        } else {
            $data['title'] = 'Mainfest';
            $data['warehouses'] = $this->warehouses->get_all();
            $data['vendors'] = $this->vendors->get_all();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/mainfest/addVendor', $data);
            $this->load->view('admin/includes/_footer');
        }

    }
    //---------------------------------------------------
    // Add New Invoices
    public function add_driver()
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            if (empty($this->input->post('product_description'))) {
                $data = array(
                    'errors' => "AWB# is required",
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/mainfest'), 'refresh');
            } else {
                if ($this->session->userdata('user_id') != '') {
                    $created_by = $this->session->userdata('user_id');

                } else {
                    $created_by = $this->session->userdata('admin_id');

                }
                $data['mainfest_header'] = array(
                    'header_id' => "TMX-" . date('m') . date('d') . "-" . random_string('numeric', 4),
                    'warehouse_no' => $this->input->post('warehouse_no'),
                    'created_by' => $created_by,
                    'to_from_id' => $this->input->post('to_from_id'),
                    'to_from' => $this->input->post('to_from'),
                    'type' => $this->input->post('type'),
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d h:m:s'),
                );
                $data = $this->security->xss_clean($data['mainfest_header']);
                $mainfest_id = $this->mainfest->add_mainfest_header($data);
                if ($mainfest_id) {
                    $shipment_id = $this->input->post('product_description');
                    $data['mainfest'] = array(
                        'vshipment_id' => $this->input->post('product_description'),
                        'mainfest_id' => $mainfest_id,
                    );
                    $mainfest = serialize($mainfest);

                    $mainfest_data = $this->security->xss_clean($data['mainfest']);
                    foreach ($shipment_id as $value) {
                        $data['mainfest'] = array(
                            'vshipment_id' => $value,
                            'mainfest_id' => $mainfest_id,
                        );
                        $mainfest = serialize($mainfest);

                        $mainfest_data = $this->security->xss_clean($data['mainfest']);
                        $result = $this->mainfest->add_mainfest($mainfest_data);
                    }

                    // Activity Log
                    $this->activity_model->add_log(10);

                    $this->session->set_flashdata('success', 'Mainfest has been Added Successfully!');
                    redirect(base_url('admin/mainfest'));

                }
            }
            //print_r($data['invoice_data']);
        } else {
            $data['title'] = 'Mainfest';
            $data['warehouses'] = $this->warehouses->get_all();
            $data['drivers'] = $this->drivers->get_all();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/mainfest/add_driver', $data);
            $this->load->view('admin/includes/_footer');
        }

    }
    //---------------------------------------------------
    // Add New Invoices
    public function add_branch()
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            if (empty($this->input->post('product_description'))) {
                $data = array(
                    'errors' => "AWB# is required",
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/mainfest'), 'refresh');
            } else {
                if ($this->session->userdata('user_id') != '') {
                    $created_by = $this->session->userdata('user_id');

                } else {
                    $created_by = $this->session->userdata('admin_id');

                }
                $data['mainfest_header'] = array(
                    'header_id' => "TMX-" . date('m') . date('d') . "-" . random_string('numeric', 4),
                    'warehouse_no' => $this->input->post('warehouse_no'),
                    'created_by' => $created_by,
                    'to_from_id' => $this->input->post('to_from_id'),
                    'to_from' => $this->input->post('to_from'),
                    'type' => $this->input->post('type'),
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d h:m:s'),
                );
                $data = $this->security->xss_clean($data['mainfest_header']);
                $mainfest_id = $this->mainfest->add_mainfest_header($data);
                if ($mainfest_id) {
                    $shipment_id = $this->input->post('product_description');
                    $data['mainfest'] = array(
                        'vshipment_id' => $this->input->post('product_description'),
                        'mainfest_id' => $mainfest_id,
                    );
                    $mainfest = serialize($mainfest);

                    $mainfest_data = $this->security->xss_clean($data['mainfest']);
                    foreach ($shipment_id as $value) {
                        $data['mainfest'] = array(
                            'vshipment_id' => $value,
                            'mainfest_id' => $mainfest_id,
                        );
                        $mainfest = serialize($mainfest);

                        $mainfest_data = $this->security->xss_clean($data['mainfest']);
                        $result = $this->mainfest->add_mainfest($mainfest_data);
                    }

                    // Activity Log
                    $this->activity_model->add_log(10);

                    $this->session->set_flashdata('success', 'Mainfest has been Added Successfully!');
                    redirect(base_url('admin/mainfest'));

                }
            }
            //print_r($data['invoice_data']);
        } else {
            $data['title'] = 'Mainfest';
            $data['warehouses'] = $this->warehouses->get_all();
            $data['branches'] = $this->branch->get_all();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/mainfest/add_branch', $data);
            $this->load->view('admin/includes/_footer');
        }

    }
    //---------------------------------------------------
    // Add New Invoices
    public function return_vendor()
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            if (empty($this->input->post('product_description'))) {
                $data = array(
                    'errors' => "AWB# is required",
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/mainfest'), 'refresh');
            } else {
                if ($this->session->userdata('user_id') != '') {
                    $created_by = $this->session->userdata('user_id');

                } else {
                    $created_by = $this->session->userdata('admin_id');

                }
                $data['mainfest_header'] = array(
                    'header_id' => "TMX-" . date('m') . date('d') . "-" . random_string('numeric', 4),
                    'warehouse_no' => $this->input->post('warehouse_no'),
                    'created_by' => $created_by,
                    'to_from_id' => $this->input->post('to_from_id'),
                    'to_from' => $this->input->post('to_from'),
                    'type' => $this->input->post('type'),
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d h:m:s'),
                );
                $data = $this->security->xss_clean($data['mainfest_header']);
                $mainfest_id = $this->mainfest->add_mainfest_header($data);
                if ($mainfest_id) {
                    $shipment_id = $this->input->post('product_description');
                    $data['mainfest'] = array(
                        'vshipment_id' => $this->input->post('product_description'),
                        'mainfest_id' => $mainfest_id,
                    );
                    $mainfest = serialize($mainfest);

                    $mainfest_data = $this->security->xss_clean($data['mainfest']);
                    foreach ($shipment_id as $value) {
                        $data['mainfest'] = array(
                            'vshipment_id' => $value,
                            'mainfest_id' => $mainfest_id,
                        );
                        $mainfest = serialize($mainfest);

                        $mainfest_data = $this->security->xss_clean($data['mainfest']);
                        $result = $this->mainfest->add_mainfest($mainfest_data);
                    }

                    // Activity Log
                    $this->activity_model->add_log(10);

                    $this->session->set_flashdata('success', 'Mainfest has been Added Successfully!');
                    redirect(base_url('admin/mainfest'));

                }
            }
            //print_r($data['invoice_data']);
        } else {
            $data['title'] = 'Mainfest';
            $data['warehouses'] = $this->warehouses->get_all();
            $data['vendors'] = $this->vendors->get_all();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/mainfest/return_to_vendor', $data);
            $this->load->view('admin/includes/_footer');
        }

    }
    //---------------------------------------------------
    // Add New Invoices
    public function return_driver()
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            if (empty($this->input->post('product_description'))) {
                $data = array(
                    'errors' => "AWB# is required",
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/mainfest'), 'refresh');
            } else {
                if ($this->session->userdata('user_id') != '') {
                    $created_by = $this->session->userdata('user_id');

                } else {
                    $created_by = $this->session->userdata('admin_id');

                }
                $data['mainfest_header'] = array(
                    'header_id' => "TMX-" . date('m') . date('d') . "-" . random_string('numeric', 4),
                    'warehouse_no' => $this->input->post('warehouse_no'),
                    'created_by' => $created_by,
                    'to_from_id' => $this->input->post('to_from_id'),
                    'to_from' => $this->input->post('to_from'),
                    'type' => $this->input->post('type'),
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d h:m:s'),
                );
                $data = $this->security->xss_clean($data['mainfest_header']);
                $mainfest_id = $this->mainfest->add_mainfest_header($data);
                if ($mainfest_id) {
                    $shipment_id = $this->input->post('product_description');
                    $data['mainfest'] = array(
                        'vshipment_id' => $this->input->post('product_description'),
                        'mainfest_id' => $mainfest_id,
                    );
                    $mainfest = serialize($mainfest);

                    $mainfest_data = $this->security->xss_clean($data['mainfest']);
                    foreach ($shipment_id as $value) {
                        $data['mainfest'] = array(
                            'vshipment_id' => $value,
                            'mainfest_id' => $mainfest_id,
                        );
                        $mainfest = serialize($mainfest);

                        $mainfest_data = $this->security->xss_clean($data['mainfest']);
                        $result = $this->mainfest->add_mainfest($mainfest_data);
                    }

                    // Activity Log
                    $this->activity_model->add_log(10);

                    $this->session->set_flashdata('success', 'Mainfest has been Added Successfully!');
                    redirect(base_url('admin/mainfest'));

                }
            }
            //print_r($data['invoice_data']);
        } else {
            $data['title'] = 'Mainfest';
            $data['warehouses'] = $this->warehouses->get_all();
            $data['drivers'] = $this->drivers->get_all();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/mainfest/return_to_driver', $data);
            $this->load->view('admin/includes/_footer');
        }

    }
    //---------------------------------------------------
    // Add New Invoices
    public function return_branch()
    {
        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            if (empty($this->input->post('product_description'))) {
                $data = array(
                    'errors' => "AWB# is required",
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/mainfest'), 'refresh');
            } else {
                if ($this->session->userdata('user_id') != '') {
                    $created_by = $this->session->userdata('user_id');

                } else {
                    $created_by = $this->session->userdata('admin_id');

                }
                $data['mainfest_header'] = array(
                    'header_id' => "TMX-" . date('m') . date('d') . "-" . random_string('numeric', 4),
                    'warehouse_no' => $this->input->post('warehouse_no'),
                    'created_by' => $created_by,
                    'to_from_id' => $this->input->post('to_from_id'),
                    'to_from' => $this->input->post('to_from'),
                    'type' => $this->input->post('type'),
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d h:m:s'),
                );
                $data = $this->security->xss_clean($data['mainfest_header']);
                $mainfest_id = $this->mainfest->add_mainfest_header($data);
                if ($mainfest_id) {
                    $shipment_id = $this->input->post('product_description');
                    $data['mainfest'] = array(
                        'vshipment_id' => $this->input->post('product_description'),
                        'mainfest_id' => $mainfest_id,
                    );
                    $mainfest = serialize($mainfest);

                    $mainfest_data = $this->security->xss_clean($data['mainfest']);
                    foreach ($shipment_id as $value) {
                        $data['mainfest'] = array(
                            'vshipment_id' => $value,
                            'mainfest_id' => $mainfest_id,
                        );
                        $mainfest = serialize($mainfest);

                        $mainfest_data = $this->security->xss_clean($data['mainfest']);
                        $result = $this->mainfest->add_mainfest($mainfest_data);
                    }

                    // Activity Log
                    $this->activity_model->add_log(10);

                    $this->session->set_flashdata('success', 'Mainfest has been Added Successfully!');
                    redirect(base_url('admin/mainfest'));

                }
            }
            //print_r($data['invoice_data']);
        } else {
            $data['title'] = 'Mainfest';
            $data['warehouses'] = $this->warehouses->get_all();
            $data['branches'] = $this->branch->get_all();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/mainfest/return_to_branch', $data);
            $this->load->view('admin/includes/_footer');
        }

    }

    //---------------------------------------------------
    // Get View Invoice
    public function view($id = 0)
    {

        $this->rbac->check_operation_access(); // check opration permission

        $data['invoice_detail'] = $this->mainfest->get_invoice_by_id($id);

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/invoices/invoice_view', $data);
        $this->load->view('admin/includes/_footer');
    }

    //---------------------------------------------------
    // Delete Invoices
    public function delete($id)
    {

        $this->rbac->check_operation_access(); // check opration permission

        $result = $this->mainfest->delete($id);
     
            // Activity Log
            $this->activity_model->add_log(11);
            $this->session->set_flashdata('success', 'Record has been deleted Successfully!');
            redirect(base_url('admin/mainfest'));
    }

}
