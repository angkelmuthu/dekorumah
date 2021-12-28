<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_cabang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_cabang/web_cabang_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_cabang_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_cabang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'cabang_kota' => $row->cabang_kota,
		'cabang_alamat' => $row->cabang_alamat,
		'cabang_tlpn' => $row->cabang_tlpn,
		'cabang_map' => $row->cabang_map,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','web_cabang/web_cabang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_cabang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_cabang/create_action'),
	    'id' => set_value('id'),
	    'cabang_kota' => set_value('cabang_kota'),
	    'cabang_alamat' => set_value('cabang_alamat'),
	    'cabang_tlpn' => set_value('cabang_tlpn'),
	    'cabang_map' => set_value('cabang_map'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','web_cabang/web_cabang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'cabang_kota' => $this->input->post('cabang_kota',TRUE),
		'cabang_alamat' => $this->input->post('cabang_alamat',TRUE),
		'cabang_tlpn' => $this->input->post('cabang_tlpn',TRUE),
		'cabang_map' => $this->input->post('cabang_map',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Web_cabang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_cabang'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_cabang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_cabang/update_action'),
		'id' => set_value('id', $row->id),
		'cabang_kota' => set_value('cabang_kota', $row->cabang_kota),
		'cabang_alamat' => set_value('cabang_alamat', $row->cabang_alamat),
		'cabang_tlpn' => set_value('cabang_tlpn', $row->cabang_tlpn),
		'cabang_map' => set_value('cabang_map', $row->cabang_map),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','web_cabang/web_cabang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_cabang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'cabang_kota' => $this->input->post('cabang_kota',TRUE),
		'cabang_alamat' => $this->input->post('cabang_alamat',TRUE),
		'cabang_tlpn' => $this->input->post('cabang_tlpn',TRUE),
		'cabang_map' => $this->input->post('cabang_map',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Web_cabang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_cabang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_cabang_model->get_by_id($id);

        if ($row) {
            $this->Web_cabang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_cabang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_cabang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('cabang_kota', 'cabang kota', 'trim|required');
	$this->form_validation->set_rules('cabang_alamat', 'cabang alamat', 'trim|required');
	$this->form_validation->set_rules('cabang_tlpn', 'cabang tlpn', 'trim|required');
	$this->form_validation->set_rules('cabang_map', 'cabang map', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_cabang.php */
/* Location: ./application/controllers/Web_cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:40:05 */
/* http://harviacode.com */