<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_distributor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_distributor_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_distributor/m_distributor_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_distributor_model->json();
    }

    public function read($id)
    {
        $row = $this->M_distributor_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_distributor' => $row->id_distributor,
                'nm_distributor' => $row->nm_distributor,
                'alamat' => $row->alamat,
                'tlp1' => $row->tlp1,
                'tlp2' => $row->tlp2,
                'keterangan' => $row->keterangan,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'm_distributor/m_distributor_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_distributor'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_distributor/create_action'),
            'id_distributor' => set_value('id_distributor'),
            'nm_distributor' => set_value('nm_distributor'),
            'alamat' => set_value('alamat'),
            'tlp1' => set_value('tlp1'),
            'tlp2' => set_value('tlp2'),
            'keterangan' => set_value('keterangan'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'm_distributor/m_distributor_form', $data);
    }

    public function create_action()
    {
        $data = array(
            'nm_distributor' => $this->input->post('nm_distributor', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'tlp1' => $this->input->post('tlp1', TRUE),
            'tlp2' => $this->input->post('tlp2', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'aktif' => $this->input->post('aktif', TRUE),
        );

        $this->M_distributor_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('m_distributor'));
    }

    public function update($id)
    {
        $row = $this->M_distributor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_distributor/update_action'),
                'id_distributor' => set_value('id_distributor', $row->id_distributor),
                'nm_distributor' => set_value('nm_distributor', $row->nm_distributor),
                'alamat' => set_value('alamat', $row->alamat),
                'tlp1' => set_value('tlp1', $row->tlp1),
                'tlp2' => set_value('tlp2', $row->tlp2),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'm_distributor/m_distributor_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_distributor'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_distributor', TRUE));
        } else {
            $data = array(
                'nm_distributor' => $this->input->post('nm_distributor', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tlp1' => $this->input->post('tlp1', TRUE),
                'tlp2' => $this->input->post('tlp2', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_distributor_model->update($this->input->post('id_distributor', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_distributor'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_distributor_model->get_by_id($id);

        if ($row) {
            $this->M_distributor_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_distributor'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_distributor'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_distributor', 'nm distributor', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('tlp1', 'tlp1', 'trim|required');
        $this->form_validation->set_rules('tlp2', 'tlp2', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('id_distributor', 'id_distributor', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_distributor.php */
/* Location: ./application/controllers/M_distributor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-17 08:30:32 */
/* http://harviacode.com */