<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_status_invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_status_invoice_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_status_invoice/m_status_invoice_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_status_invoice_model->json();
    }

    public function read($id)
    {
        $row = $this->M_status_invoice_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_status' => $row->id_status,
		'status' => $row->status,
	    );
            $this->template->load('template','m_status_invoice/m_status_invoice_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_status_invoice'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_status_invoice/create_action'),
	    'id_status' => set_value('id_status'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','m_status_invoice/m_status_invoice_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'status' => $this->input->post('status',TRUE),
	    );

            $this->M_status_invoice_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_status_invoice'));
        }
    }

    public function update($id)
    {
        $row = $this->M_status_invoice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_status_invoice/update_action'),
		'id_status' => set_value('id_status', $row->id_status),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','m_status_invoice/m_status_invoice_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_status_invoice'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status', TRUE));
        } else {
            $data = array(
		'status' => $this->input->post('status',TRUE),
	    );

            $this->M_status_invoice_model->update($this->input->post('id_status', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_status_invoice'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_status_invoice_model->get_by_id($id);

        if ($row) {
            $this->M_status_invoice_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_status_invoice'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_status_invoice'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_status', 'id_status', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_status_invoice.php */
/* Location: ./application/controllers/M_status_invoice.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-01 15:01:43 */
/* http://harviacode.com */