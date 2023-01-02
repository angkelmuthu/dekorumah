<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_sumber_dana extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_sumber_dana_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','t_sumber_dana/t_sumber_dana_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T_sumber_dana_model->json();
    }

    public function read($id)
    {
        $row = $this->T_sumber_dana_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dana' => $row->id_dana,
		'nama_dana' => $row->nama_dana,
		'norek' => $row->norek,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','t_sumber_dana/t_sumber_dana_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_sumber_dana'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_sumber_dana/create_action'),
	    'id_dana' => set_value('id_dana'),
	    'nama_dana' => set_value('nama_dana'),
	    'norek' => set_value('norek'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','t_sumber_dana/t_sumber_dana_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dana' => $this->input->post('nama_dana',TRUE),
		'norek' => $this->input->post('norek',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->T_sumber_dana_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_sumber_dana'));
        }
    }

    public function update($id)
    {
        $row = $this->T_sumber_dana_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_sumber_dana/update_action'),
		'id_dana' => set_value('id_dana', $row->id_dana),
		'nama_dana' => set_value('nama_dana', $row->nama_dana),
		'norek' => set_value('norek', $row->norek),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','t_sumber_dana/t_sumber_dana_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_sumber_dana'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dana', TRUE));
        } else {
            $data = array(
		'nama_dana' => $this->input->post('nama_dana',TRUE),
		'norek' => $this->input->post('norek',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->T_sumber_dana_model->update($this->input->post('id_dana', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_sumber_dana'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_sumber_dana_model->get_by_id($id);

        if ($row) {
            $this->T_sumber_dana_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_sumber_dana'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_sumber_dana'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_dana', 'nama dana', 'trim|required');
	$this->form_validation->set_rules('norek', 'norek', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_dana', 'id_dana', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_sumber_dana.php */
/* Location: ./application/controllers/T_sumber_dana.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-02 07:23:07 */
/* http://harviacode.com */