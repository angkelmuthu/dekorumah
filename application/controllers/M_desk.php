<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_desk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_desk_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_desk/m_desk_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_desk_model->json();
    }

    public function read($id)
    {
        $row = $this->M_desk_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tlp' => $row->tlp,
                'wa' => $row->wa,
                'facebook' => $row->facebook,
                'instagram' => $row->instagram,
                'alamat' => $row->alamat,
                'note_bayar' => $row->note_bayar,
                'note_final' => $row->note_final,
            );
            $this->template->load('template', 'm_desk/m_desk_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_desk'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_desk/create_action'),
            'id' => set_value('id'),
            'tlp' => set_value('tlp'),
            'wa' => set_value('wa'),
            'facebook' => set_value('facebook'),
            'instagram' => set_value('instagram'),
            'alamat' => set_value('alamat'),
            'note_bayar' => set_value('note_bayar'),
            'note_final' => set_value('note_final'),
        );
        $this->template->load('template', 'm_desk/m_desk_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tlp' => $this->input->post('tlp', TRUE),
                'wa' => $this->input->post('wa', TRUE),
                'facebook' => $this->input->post('facebook', TRUE),
                'instagram' => $this->input->post('instagram', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'note_bayar' => $this->input->post('note_bayar', TRUE),
                'note_final' => $this->input->post('note_final', TRUE),
            );

            $this->M_desk_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_desk'));
        }
    }

    public function update($id)
    {
        $row = $this->M_desk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_desk/update_action'),
                'id' => set_value('id', $row->id),
                'tlp' => set_value('tlp', $row->tlp),
                'wa' => set_value('wa', $row->wa),
                'facebook' => set_value('facebook', $row->facebook),
                'instagram' => set_value('instagram', $row->instagram),
                'alamat' => set_value('alamat', $row->alamat),
                'note_bayar' => set_value('note_bayar', $row->note_bayar),
                'note_final' => set_value('note_final', $row->note_final),
            );
            $this->template->load('template', 'm_desk/m_desk_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_desk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tlp' => $this->input->post('tlp', TRUE),
                'wa' => $this->input->post('wa', TRUE),
                'facebook' => $this->input->post('facebook', TRUE),
                'instagram' => $this->input->post('instagram', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'note_bayar' => $this->input->post('note_bayar', TRUE),
                'note_final' => $this->input->post('note_final', TRUE),
            );

            $this->M_desk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_desk'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_desk_model->get_by_id($id);

        if ($row) {
            $this->M_desk_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_desk'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_desk'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tlp', 'tlp', 'trim');
        $this->form_validation->set_rules('wa', 'wa', 'trim');
        $this->form_validation->set_rules('facebook', 'facebook', 'trim');
        $this->form_validation->set_rules('instagram', 'instagram', 'trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_desk.php */
/* Location: ./application/controllers/M_desk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-11 09:41:02 */
/* http://harviacode.com */