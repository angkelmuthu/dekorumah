<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_video extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_video_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','web_video/web_video_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Web_video_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_video_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'video_cover' => $row->video_cover,
		'video_url' => $row->video_url,
	    );
            $this->template->load('template','web_video/web_video_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_video'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_video/create_action'),
	    'id' => set_value('id'),
	    'video_cover' => set_value('video_cover'),
	    'video_url' => set_value('video_url'),
	);
        $this->template->load('template','web_video/web_video_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'video_cover' => $this->input->post('video_cover',TRUE),
		'video_url' => $this->input->post('video_url',TRUE),
	    );

            $this->Web_video_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_video'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_video_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_video/update_action'),
		'id' => set_value('id', $row->id),
		'video_cover' => set_value('video_cover', $row->video_cover),
		'video_url' => set_value('video_url', $row->video_url),
	    );
            $this->template->load('template','web_video/web_video_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_video'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'video_cover' => $this->input->post('video_cover',TRUE),
		'video_url' => $this->input->post('video_url',TRUE),
	    );

            $this->Web_video_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_video'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_video_model->get_by_id($id);

        if ($row) {
            $this->Web_video_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_video'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_video'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('video_cover', 'video cover', 'trim|required');
	$this->form_validation->set_rules('video_url', 'video url', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Web_video.php */
/* Location: ./application/controllers/Web_video.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:48:47 */
/* http://harviacode.com */