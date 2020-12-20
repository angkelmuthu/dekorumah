<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_bahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_bahan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_bahan/m_bahan_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_bahan_model->json();
    }

    public function read($id)
    {
        $row = $this->M_bahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bahan' => $row->id_bahan,
		'nm_bahan' => $row->nm_bahan,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_bahan/m_bahan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bahan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_bahan/create_action'),
	    'id_bahan' => set_value('id_bahan'),
	    'nm_bahan' => set_value('nm_bahan'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_bahan/m_bahan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_bahan' => $this->input->post('nm_bahan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_bahan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_bahan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_bahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_bahan/update_action'),
		'id_bahan' => set_value('id_bahan', $row->id_bahan),
		'nm_bahan' => set_value('nm_bahan', $row->nm_bahan),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_bahan/m_bahan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bahan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bahan', TRUE));
        } else {
            $data = array(
		'nm_bahan' => $this->input->post('nm_bahan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_bahan_model->update($this->input->post('id_bahan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_bahan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_bahan_model->get_by_id($id);

        if ($row) {
            $this->M_bahan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_bahan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bahan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_bahan', 'nm bahan', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_bahan', 'id_bahan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_bahan.php */
/* Location: ./application/controllers/M_bahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-18 13:09:36 */
/* http://harviacode.com */