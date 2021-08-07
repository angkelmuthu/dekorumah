<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_produk_detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_produk_detail_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_produk_detail/m_produk_detail_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_produk_detail_model->json();
    }

    public function read($id)
    {
        $row = $this->M_produk_detail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_produk_detail' => $row->id_produk_detail,
		'nm_produk_detail' => $row->nm_produk_detail,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_produk_detail/m_produk_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_detail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_produk_detail/create_action'),
	    'id_produk_detail' => set_value('id_produk_detail'),
	    'nm_produk_detail' => set_value('nm_produk_detail'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_produk_detail/m_produk_detail_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_produk_detail' => $this->input->post('nm_produk_detail',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_produk_detail_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_produk_detail'));
        }
    }

    public function update($id)
    {
        $row = $this->M_produk_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_produk_detail/update_action'),
		'id_produk_detail' => set_value('id_produk_detail', $row->id_produk_detail),
		'nm_produk_detail' => set_value('nm_produk_detail', $row->nm_produk_detail),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_produk_detail/m_produk_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_detail'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk_detail', TRUE));
        } else {
            $data = array(
		'nm_produk_detail' => $this->input->post('nm_produk_detail',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_produk_detail_model->update($this->input->post('id_produk_detail', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_produk_detail'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_produk_detail_model->get_by_id($id);

        if ($row) {
            $this->M_produk_detail_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_produk_detail'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_detail'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_produk_detail', 'nm produk detail', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_produk_detail', 'id_produk_detail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_produk_detail.php */
/* Location: ./application/controllers/M_produk_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-07 16:10:33 */
/* http://harviacode.com */