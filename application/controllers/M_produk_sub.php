<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_produk_sub extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_produk_sub_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_produk_sub/m_produk_sub_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_produk_sub_model->json();
    }

    public function read($id)
    {
        $row = $this->M_produk_sub_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_produk_sub' => $row->id_produk_sub,
                'nm_produk_sub' => $row->nm_produk_sub,
                'id_produk' => $row->id_produk,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'm_produk_sub/m_produk_sub_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_sub'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_produk_sub/create_action'),
            'id_produk_sub' => set_value('id_produk_sub'),
            'nm_produk_sub' => set_value('nm_produk_sub'),
            'id_produk' => set_value('id_produk'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'm_produk_sub/m_produk_sub_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nm_produk_sub' => $this->input->post('nm_produk_sub', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_produk_sub_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_produk_sub'));
        }
    }

    public function update($id)
    {
        $row = $this->M_produk_sub_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_produk_sub/update_action'),
                'id_produk_sub' => set_value('id_produk_sub', $row->id_produk_sub),
                'nm_produk_sub' => set_value('nm_produk_sub', $row->nm_produk_sub),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'm_produk_sub/m_produk_sub_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_sub'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk_sub', TRUE));
        } else {
            $data = array(
                'nm_produk_sub' => $this->input->post('nm_produk_sub', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_produk_sub_model->update($this->input->post('id_produk_sub', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_produk_sub'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_produk_sub_model->get_by_id($id);

        if ($row) {
            $this->M_produk_sub_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_produk_sub'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_sub'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_produk_sub', 'nm produk sub', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('id_produk_sub', 'id_produk_sub', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_produk_sub.php */
/* Location: ./application/controllers/M_produk_sub.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-20 09:23:57 */
/* http://harviacode.com */