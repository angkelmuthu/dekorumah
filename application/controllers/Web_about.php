<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_about extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_about_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_about/web_about_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_about_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_about_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'about_title' => $row->about_title,
		'about_desk' => $row->about_desk,
		'about_client' => $row->about_client,
		'about_cabang' => $row->about_cabang,
		'about_award' => $row->about_award,
	    );
            $this->template->load('template','web_about/web_about_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_about'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_about/create_action'),
	    'id' => set_value('id'),
	    'about_title' => set_value('about_title'),
	    'about_desk' => set_value('about_desk'),
	    'about_client' => set_value('about_client'),
	    'about_cabang' => set_value('about_cabang'),
	    'about_award' => set_value('about_award'),
	);
        $this->template->load('template','web_about/web_about_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'about_title' => $this->input->post('about_title',TRUE),
		'about_desk' => $this->input->post('about_desk',TRUE),
		'about_client' => $this->input->post('about_client',TRUE),
		'about_cabang' => $this->input->post('about_cabang',TRUE),
		'about_award' => $this->input->post('about_award',TRUE),
	    );

            $this->Web_about_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_about'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_about_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_about/update_action'),
		'id' => set_value('id', $row->id),
		'about_title' => set_value('about_title', $row->about_title),
		'about_desk' => set_value('about_desk', $row->about_desk),
		'about_client' => set_value('about_client', $row->about_client),
		'about_cabang' => set_value('about_cabang', $row->about_cabang),
		'about_award' => set_value('about_award', $row->about_award),
	    );
            $this->template->load('template','web_about/web_about_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_about'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'about_title' => $this->input->post('about_title',TRUE),
		'about_desk' => $this->input->post('about_desk',TRUE),
		'about_client' => $this->input->post('about_client',TRUE),
		'about_cabang' => $this->input->post('about_cabang',TRUE),
		'about_award' => $this->input->post('about_award',TRUE),
	    );

            $this->Web_about_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_about'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_about_model->get_by_id($id);

        if ($row) {
            $this->Web_about_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_about'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_about'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('about_title', 'about title', 'trim|required');
	$this->form_validation->set_rules('about_desk', 'about desk', 'trim|required');
	$this->form_validation->set_rules('about_client', 'about client', 'trim|required');
	$this->form_validation->set_rules('about_cabang', 'about cabang', 'trim|required');
	$this->form_validation->set_rules('about_award', 'about award', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_about.php */
/* Location: ./application/controllers/Web_about.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:34:12 */
/* http://harviacode.com */