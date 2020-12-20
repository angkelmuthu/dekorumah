<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_barang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_barang/m_barang_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_barang_model->json();
    }

    public function read($id)
    {
        $row = $this->M_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'nm_barang' => $row->nm_barang,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_barang/m_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'nm_barang' => set_value('nm_barang'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_barang/m_barang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_barang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function update($id)
    {
        $row = $this->M_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'nm_barang' => set_value('nm_barang', $row->nm_barang),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_barang/m_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_barang_model->get_by_id($id);

        if ($row) {
            $this->M_barang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_barang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_barang', 'nm barang', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_barang.php */
/* Location: ./application/controllers/M_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-20 09:24:58 */
/* http://harviacode.com */