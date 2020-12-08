<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jenis_bahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_jenis_bahan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_jenis_bahan/m_jenis_bahan_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_jenis_bahan_model->json();
    }

    public function read($id)
    {
        $row = $this->M_jenis_bahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_bahan' => $row->id_jenis_bahan,
		'nm_jenis_bahan' => $row->nm_jenis_bahan,
		'harga' => $row->harga,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_jenis_bahan/m_jenis_bahan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenis_bahan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_jenis_bahan/create_action'),
	    'id_jenis_bahan' => set_value('id_jenis_bahan'),
	    'nm_jenis_bahan' => set_value('nm_jenis_bahan'),
	    'harga' => set_value('harga'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_jenis_bahan/m_jenis_bahan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_jenis_bahan' => $this->input->post('nm_jenis_bahan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_jenis_bahan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_jenis_bahan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_jenis_bahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_jenis_bahan/update_action'),
		'id_jenis_bahan' => set_value('id_jenis_bahan', $row->id_jenis_bahan),
		'nm_jenis_bahan' => set_value('nm_jenis_bahan', $row->nm_jenis_bahan),
		'harga' => set_value('harga', $row->harga),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_jenis_bahan/m_jenis_bahan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenis_bahan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_bahan', TRUE));
        } else {
            $data = array(
		'nm_jenis_bahan' => $this->input->post('nm_jenis_bahan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_jenis_bahan_model->update($this->input->post('id_jenis_bahan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_jenis_bahan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_jenis_bahan_model->get_by_id($id);

        if ($row) {
            $this->M_jenis_bahan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_jenis_bahan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenis_bahan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_jenis_bahan', 'nm jenis bahan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_jenis_bahan', 'id_jenis_bahan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_jenis_bahan.php */
/* Location: ./application/controllers/M_jenis_bahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 06:34:41 */
/* http://harviacode.com */