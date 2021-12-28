<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_info_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_info/web_info_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_info_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_info_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'tlpn' => $row->tlpn,
		'email' => $row->email,
		'fb' => $row->fb,
		'ig' => $row->ig,
	    );
            $this->template->load('template','web_info/web_info_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_info'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_info/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'tlpn' => set_value('tlpn'),
	    'email' => set_value('email'),
	    'fb' => set_value('fb'),
	    'ig' => set_value('ig'),
	);
        $this->template->load('template','web_info/web_info_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'tlpn' => $this->input->post('tlpn',TRUE),
		'email' => $this->input->post('email',TRUE),
		'fb' => $this->input->post('fb',TRUE),
		'ig' => $this->input->post('ig',TRUE),
	    );

            $this->Web_info_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_info'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_info_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_info/update_action'),
		'id' => set_value('id', $row->id),
		'title' => set_value('title', $row->title),
		'tlpn' => set_value('tlpn', $row->tlpn),
		'email' => set_value('email', $row->email),
		'fb' => set_value('fb', $row->fb),
		'ig' => set_value('ig', $row->ig),
	    );
            $this->template->load('template','web_info/web_info_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_info'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'tlpn' => $this->input->post('tlpn',TRUE),
		'email' => $this->input->post('email',TRUE),
		'fb' => $this->input->post('fb',TRUE),
		'ig' => $this->input->post('ig',TRUE),
	    );

            $this->Web_info_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_info'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_info_model->get_by_id($id);

        if ($row) {
            $this->Web_info_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_info'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_info'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('tlpn', 'tlpn', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('fb', 'fb', 'trim|required');
	$this->form_validation->set_rules('ig', 'ig', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_info.php */
/* Location: ./application/controllers/Web_info.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:41:05 */
/* http://harviacode.com */