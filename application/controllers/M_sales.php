<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_sales_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_sales/m_sales_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_sales_model->json();
    }

    public function read($id)
    {
        $row = $this->M_sales_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sales' => $row->id_sales,
		'nm_sales' => $row->nm_sales,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_sales/m_sales_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_sales'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_sales/create_action'),
	    'id_sales' => set_value('id_sales'),
	    'nm_sales' => set_value('nm_sales'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_sales/m_sales_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_sales' => $this->input->post('nm_sales',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_sales_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_sales'));
        }
    }

    public function update($id)
    {
        $row = $this->M_sales_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_sales/update_action'),
		'id_sales' => set_value('id_sales', $row->id_sales),
		'nm_sales' => set_value('nm_sales', $row->nm_sales),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_sales/m_sales_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_sales'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sales', TRUE));
        } else {
            $data = array(
		'nm_sales' => $this->input->post('nm_sales',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_sales_model->update($this->input->post('id_sales', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_sales'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_sales_model->get_by_id($id);

        if ($row) {
            $this->M_sales_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_sales'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_sales'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_sales', 'nm sales', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_sales', 'id_sales', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_sales.php */
/* Location: ./application/controllers/M_sales.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-11 10:24:30 */
/* http://harviacode.com */