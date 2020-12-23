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
                    $this->activity_model->add_log(7);

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
                    $this->activity_model->add_log(7);

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
                    $this->activity_model->add_log(7);

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
                    $this->activity_model->add_log(7);

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
                    $this->activity_model->add_log(7);

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
                    $this->activity_model->add_log(7);

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
    // Edit Invoice
    public function edit($id = 0)
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {
            $data['company_data'] = array(
                'name' => $this->input->post('company_name'),
                'address1' => $this->input->post('company_address_1'),
                'address2' => $this->input->post('company_address_2'),
                'email' => $this->input->post('company_email'),
                'mobile_no' => $this->input->post('company_mobile_no'),
                'created_date' => date('Y-m-d h:m:s'),
            );
            $data = $this->security->xss_clean($data['company_data']);
            $company_id = $this->mainfest->update_company($data, $this->input->post('company_id'));
            if ($company_id) {
                $items_detail = array(
                    'product_description' => $this->input->post('product_description'),
                    'quantity' => $this->input->post('quantity'),
                    'price' => $this->input->post('price'),
                    'tax' => $this->input->post('tax'),
                    'total' => $this->input->post('total'),
                );
                $items_detail = serialize($items_detail);

                $data['invoice_data'] = array(

                    'admin_id' => $this->session->userdata('admin_id'),
                    'user_id' => $this->input->post('user_id'),
                    'company_id' => $company_id,
                    'invoice_no' => $this->input->post('invoice_no'),
                    'txn_id' => '',
                    'items_detail' => $items_detail,
                    'sub_total' => $this->input->post('sub_total'),
                    'total_tax' => $this->input->post('total_tax'),
                    'discount' => $this->input->post('discount'),
                    'grand_total' => $this->input->post('grand_total'),
                    'currency ' => 'USD',
                    'payment_method' => '',
                    'payment_status ' => $this->input->post('payment_status'),
                    'client_note ' => $this->input->post('client_note'),
                    'termsncondition ' => $this->input->post('termsncondition'),
                    'due_date' => date('Y-m-d', strtotime($this->input->post('due_date'))),
                    'updated_date' => date('Y-m-d'),
                );

                $invoice_data = $this->security->xss_clean($data['invoice_data']);

                $result = $this->mainfest->update_invoice($invoice_data, $id);
                if ($result) {
                    // Activity Log
                    $this->activity_model->add_log(8);
                    $this->session->set_flashdata('success', 'Invoice has been updated Successfully!');
                    redirect(base_url('admin/invoices/edit/' . $id));
                }
            }
        } else {
            $data['invoice_detail'] = $this->mainfest->get_invoice_by_id($id);
            $data['customer_list'] = $this->mainfest->get_customer_list();

            $data['title'] = 'Edit Invoice';

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/invoices/invoice_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    //---------------------------------------------------
    // Download PDF Invoices
    public function invoice_pdf_download($id = 0)
    {

        $data['invoice_detail'] = $this->mainfest->get_invoice_by_id($id);
        $this->load->view('admin/invoices/invoice_pdf_download', $data);
    }

    //---------------------------------------------------------------
    // Create PDF invoice at run time for Email
    public function create_pdf($id = 0)
    {

        $data['invoice_detail'] = $this->mainfest->get_invoice_by_id($id);
        $html = $this->load->view('admin/invoices/invoice_pdf', $data, true);

        $filename = $data['invoice_detail']['invoice_no'];

        $pdf_file_path = FCPATH . "/uploads/invoices/" . $filename . ".pdf";

        $mpdf = new mPDF('c', 'A4', '', '', 32, 25, 27, 25, 16, 13);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
        // LOAD a stylesheet
        $stylesheet = file_get_contents(base_url('public/dist/css/mpdfstyletables.css'));
        $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output($pdf_file_path, 'F');

        echo base_url() . "uploads/invoices/" . $filename . ".pdf";
        exit;

    }

    //---------------------------------------------------------------
    // Sending email with invoice attachemnt
    public function send_email_with_invoice()
    {

        $this->load->helper('email_helper');

        $to = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $cc = $this->input->post('cc');
        $file = $this->input->post('file');

        $check = send_email($to, $subject, $message, $file, $cc);

        if ($check) {
            echo 'success';
        }

    }

    //---------------------------------------------------
    // Delete Invoices
    public function delete($id)
    {

        $this->rbac->check_operation_access(); // check opration permission

        $result = $this->db->delete('ci_payments', array('id' => $id));
        if ($result) {
            // Activity Log
            $this->activity_model->add_log(9);
            $this->session->set_flashdata('success', 'Record has been deleted Successfully!');
            redirect(base_url('admin/invoices'));
        }
    }

}
