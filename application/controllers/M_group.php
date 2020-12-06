<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_group extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_group_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_group/m_group_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_group_model->json();
    }

    public function read($id)
    {
        $row = $this->M_group_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_group' => $row->id_group,
		'nm_group' => $row->nm_group,
	    );
            $this->template->load('template','m_group/m_group_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_group'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_group/create_action'),
	    'id_group' => set_value('id_group'),
	    'nm_group' => set_value('nm_group'),
	);
        $this->template->load('template','m_group/m_group_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_group' => $this->input->post('nm_group',TRUE),
	    );

            $this->M_group_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_group'));
        }
    }

    public function update($id)
    {
        $row = $this->M_group_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_group/update_action'),
		'id_group' => set_value('id_group', $row->id_group),
		'nm_group' => set_value('nm_group', $row->nm_group),
	    );
            $this->template->load('template','m_group/m_group_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_group'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_group', TRUE));
        } else {
            $data = array(
		'nm_group' => $this->input->post('nm_group',TRUE),
	    );

            $this->M_group_model->update($this->input->post('id_group', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_group'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_group_model->get_by_id($id);

        if ($row) {
            $this->M_group_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_group'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_group'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_group', 'nm group', 'trim|required');

	$this->form_validation->set_rules('id_group', 'id_group', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_group.php */
/* Location: ./application/controllers/M_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-05 18:18:42 */
/* http://harviacode.com */