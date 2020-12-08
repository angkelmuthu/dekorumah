<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tipe_pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tipe_pesanan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_tipe_pesanan/m_tipe_pesanan_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_tipe_pesanan_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tipe_pesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tipe_pesanan' => $row->id_tipe_pesanan,
		'nm_tipe_pesanan' => $row->nm_tipe_pesanan,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_tipe_pesanan/m_tipe_pesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tipe_pesanan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tipe_pesanan/create_action'),
	    'id_tipe_pesanan' => set_value('id_tipe_pesanan'),
	    'nm_tipe_pesanan' => set_value('nm_tipe_pesanan'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_tipe_pesanan/m_tipe_pesanan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_tipe_pesanan' => $this->input->post('nm_tipe_pesanan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_tipe_pesanan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tipe_pesanan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tipe_pesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tipe_pesanan/update_action'),
		'id_tipe_pesanan' => set_value('id_tipe_pesanan', $row->id_tipe_pesanan),
		'nm_tipe_pesanan' => set_value('nm_tipe_pesanan', $row->nm_tipe_pesanan),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_tipe_pesanan/m_tipe_pesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tipe_pesanan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tipe_pesanan', TRUE));
        } else {
            $data = array(
		'nm_tipe_pesanan' => $this->input->post('nm_tipe_pesanan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_tipe_pesanan_model->update($this->input->post('id_tipe_pesanan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tipe_pesanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tipe_pesanan_model->get_by_id($id);

        if ($row) {
            $this->M_tipe_pesanan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tipe_pesanan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tipe_pesanan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_tipe_pesanan', 'nm tipe pesanan', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_tipe_pesanan', 'id_tipe_pesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_tipe_pesanan.php */
/* Location: ./application/controllers/M_tipe_pesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 06:24:38 */
/* http://harviacode.com */