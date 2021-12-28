<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_projek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_projek_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_projek/web_projek_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_projek_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_projek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_projek' => $row->id_projek,
		'id_produk' => $row->id_produk,
		'projek_name' => $row->projek_name,
		'projek_lokasi' => $row->projek_lokasi,
		'projek_start' => $row->projek_start,
		'projek_end' => $row->projek_end,
		'projek_desk' => $row->projek_desk,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','web_projek/web_projek_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_projek'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_projek/create_action'),
	    'id_projek' => set_value('id_projek'),
	    'id_produk' => set_value('id_produk'),
	    'projek_name' => set_value('projek_name'),
	    'projek_lokasi' => set_value('projek_lokasi'),
	    'projek_start' => set_value('projek_start'),
	    'projek_end' => set_value('projek_end'),
	    'projek_desk' => set_value('projek_desk'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','web_projek/web_projek_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'projek_name' => $this->input->post('projek_name',TRUE),
		'projek_lokasi' => $this->input->post('projek_lokasi',TRUE),
		'projek_start' => $this->input->post('projek_start',TRUE),
		'projek_end' => $this->input->post('projek_end',TRUE),
		'projek_desk' => $this->input->post('projek_desk',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Web_projek_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_projek'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_projek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_projek/update_action'),
		'id_projek' => set_value('id_projek', $row->id_projek),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'projek_name' => set_value('projek_name', $row->projek_name),
		'projek_lokasi' => set_value('projek_lokasi', $row->projek_lokasi),
		'projek_start' => set_value('projek_start', $row->projek_start),
		'projek_end' => set_value('projek_end', $row->projek_end),
		'projek_desk' => set_value('projek_desk', $row->projek_desk),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','web_projek/web_projek_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_projek'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_projek', TRUE));
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'projek_name' => $this->input->post('projek_name',TRUE),
		'projek_lokasi' => $this->input->post('projek_lokasi',TRUE),
		'projek_start' => $this->input->post('projek_start',TRUE),
		'projek_end' => $this->input->post('projek_end',TRUE),
		'projek_desk' => $this->input->post('projek_desk',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Web_projek_model->update($this->input->post('id_projek', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_projek'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_projek_model->get_by_id($id);

        if ($row) {
            $this->Web_projek_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_projek'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_projek'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('projek_name', 'projek name', 'trim|required');
	$this->form_validation->set_rules('projek_lokasi', 'projek lokasi', 'trim|required');
	$this->form_validation->set_rules('projek_start', 'projek start', 'trim|required');
	$this->form_validation->set_rules('projek_end', 'projek end', 'trim|required');
	$this->form_validation->set_rules('projek_desk', 'projek desk', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_projek', 'id_projek', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_projek.php */
/* Location: ./application/controllers/Web_projek.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:42:57 */
/* http://harviacode.com */