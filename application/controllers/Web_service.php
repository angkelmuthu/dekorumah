<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_service_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_service/web_service_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_service_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_service_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'service_title' => $row->service_title,
		'service_desk' => $row->service_desk,
	    );
            $this->template->load('template','web_service/web_service_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_service'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_service/create_action'),
	    'id' => set_value('id'),
	    'service_title' => set_value('service_title'),
	    'service_desk' => set_value('service_desk'),
	);
        $this->template->load('template','web_service/web_service_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'service_title' => $this->input->post('service_title',TRUE),
		'service_desk' => $this->input->post('service_desk',TRUE),
	    );

            $this->Web_service_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_service'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_service_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_service/update_action'),
		'id' => set_value('id', $row->id),
		'service_title' => set_value('service_title', $row->service_title),
		'service_desk' => set_value('service_desk', $row->service_desk),
	    );
            $this->template->load('template','web_service/web_service_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_service'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'service_title' => $this->input->post('service_title',TRUE),
		'service_desk' => $this->input->post('service_desk',TRUE),
	    );

            $this->Web_service_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_service'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_service_model->get_by_id($id);

        if ($row) {
            $this->Web_service_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_service'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_service'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('service_title', 'service title', 'trim|required');
	$this->form_validation->set_rules('service_desk', 'service desk', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_service.php */
/* Location: ./application/controllers/Web_service.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:45:06 */
/* http://harviacode.com */