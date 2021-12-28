<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_testimoni extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_testimoni_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_testimoni/web_testimoni_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_testimoni_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_testimoni_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'client_name' => $row->client_name,
		'client_desk' => $row->client_desk,
		'client_testi' => $row->client_testi,
		'client_rate' => $row->client_rate,
		'aktif' => $row->aktif,
		'client_foto' => $row->client_foto,
	    );
            $this->template->load('template','web_testimoni/web_testimoni_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_testimoni'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_testimoni/create_action'),
	    'id' => set_value('id'),
	    'client_name' => set_value('client_name'),
	    'client_desk' => set_value('client_desk'),
	    'client_testi' => set_value('client_testi'),
	    'client_rate' => set_value('client_rate'),
	    'aktif' => set_value('aktif'),
	    'client_foto' => set_value('client_foto'),
	);
        $this->template->load('template','web_testimoni/web_testimoni_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'client_name' => $this->input->post('client_name',TRUE),
		'client_desk' => $this->input->post('client_desk',TRUE),
		'client_testi' => $this->input->post('client_testi',TRUE),
		'client_rate' => $this->input->post('client_rate',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'client_foto' => $this->input->post('client_foto',TRUE),
	    );

            $this->Web_testimoni_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_testimoni'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_testimoni_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_testimoni/update_action'),
		'id' => set_value('id', $row->id),
		'client_name' => set_value('client_name', $row->client_name),
		'client_desk' => set_value('client_desk', $row->client_desk),
		'client_testi' => set_value('client_testi', $row->client_testi),
		'client_rate' => set_value('client_rate', $row->client_rate),
		'aktif' => set_value('aktif', $row->aktif),
		'client_foto' => set_value('client_foto', $row->client_foto),
	    );
            $this->template->load('template','web_testimoni/web_testimoni_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_testimoni'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'client_name' => $this->input->post('client_name',TRUE),
		'client_desk' => $this->input->post('client_desk',TRUE),
		'client_testi' => $this->input->post('client_testi',TRUE),
		'client_rate' => $this->input->post('client_rate',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'client_foto' => $this->input->post('client_foto',TRUE),
	    );

            $this->Web_testimoni_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_testimoni'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_testimoni_model->get_by_id($id);

        if ($row) {
            $this->Web_testimoni_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_testimoni'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_testimoni'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('client_name', 'client name', 'trim|required');
	$this->form_validation->set_rules('client_desk', 'client desk', 'trim|required');
	$this->form_validation->set_rules('client_testi', 'client testi', 'trim|required');
	$this->form_validation->set_rules('client_rate', 'client rate', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
	$this->form_validation->set_rules('client_foto', 'client foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_testimoni.php */
/* Location: ./application/controllers/Web_testimoni.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:48:27 */
/* http://harviacode.com */