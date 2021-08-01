<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_stok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_stok_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_stok/m_stok_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_stok_model->json();
    }

    public function read($id)
    {
        $row = $this->M_stok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_stok' => $row->id_stok,
		'id_barang' => $row->id_barang,
		'harga_satuan' => $row->harga_satuan,
		'stok' => $row->stok,
		'id_user' => $row->id_user,
		'update_date' => $row->update_date,
	    );
            $this->template->load('template','m_stok/m_stok_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_stok'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_stok/create_action'),
	    'id_stok' => set_value('id_stok'),
	    'id_barang' => set_value('id_barang'),
	    'harga_satuan' => set_value('harga_satuan'),
	    'stok' => set_value('stok'),
	    'id_user' => set_value('id_user'),
	    'update_date' => set_value('update_date'),
	);
        $this->template->load('template','m_stok/m_stok_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->M_stok_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_stok'));
        }
    }

    public function update($id)
    {
        $row = $this->M_stok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_stok/update_action'),
		'id_stok' => set_value('id_stok', $row->id_stok),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
		'stok' => set_value('stok', $row->stok),
		'id_user' => set_value('id_user', $row->id_user),
		'update_date' => set_value('update_date', $row->update_date),
	    );
            $this->template->load('template','m_stok/m_stok_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_stok'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_stok', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->M_stok_model->update($this->input->post('id_stok', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_stok'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_stok_model->get_by_id($id);

        if ($row) {
            $this->M_stok_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_stok'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_stok'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('update_date', 'update date', 'trim|required');

	$this->form_validation->set_rules('id_stok', 'id_stok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_stok.php */
/* Location: ./application/controllers/M_stok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 10:53:46 */
/* http://harviacode.com */