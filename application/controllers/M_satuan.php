<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_satuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_satuan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_satuan/m_satuan_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_satuan_model->json();
    }

    public function read($id)
    {
        $row = $this->M_satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_satuan' => $row->id_satuan,
		'satuan' => $row->satuan,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_satuan/m_satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satuan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_satuan/create_action'),
	    'id_satuan' => set_value('id_satuan'),
	    'satuan' => set_value('satuan'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_satuan/m_satuan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'satuan' => $this->input->post('satuan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_satuan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_satuan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_satuan/update_action'),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'satuan' => set_value('satuan', $row->satuan),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_satuan/m_satuan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satuan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satuan', TRUE));
        } else {
            $data = array(
		'satuan' => $this->input->post('satuan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_satuan_model->update($this->input->post('id_satuan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_satuan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_satuan_model->get_by_id($id);

        if ($row) {
            $this->M_satuan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_satuan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satuan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_satuan', 'id_satuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_satuan.php */
/* Location: ./application/controllers/M_satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-07 09:15:15 */
/* http://harviacode.com */