<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_produk_kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_produk_kategori_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_produk_kategori/m_produk_kategori_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_produk_kategori_model->json();
    }

    public function read($id)
    {
        $row = $this->M_produk_kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'kategori' => $row->kategori,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_produk_kategori/m_produk_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_kategori'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_produk_kategori/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'kategori' => set_value('kategori'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_produk_kategori/m_produk_kategori_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_produk_kategori_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_produk_kategori'));
        }
    }

    public function update($id)
    {
        $row = $this->M_produk_kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_produk_kategori/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'kategori' => set_value('kategori', $row->kategori),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_produk_kategori/m_produk_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_kategori'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_produk_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_produk_kategori'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_produk_kategori_model->get_by_id($id);

        if ($row) {
            $this->M_produk_kategori_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_produk_kategori'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_kategori'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_produk_kategori.php */
/* Location: ./application/controllers/M_produk_kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-30 08:00:57 */
/* http://harviacode.com */