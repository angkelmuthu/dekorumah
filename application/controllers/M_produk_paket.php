<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_produk_paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_produk_paket_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_produk_paket/m_produk_paket_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_produk_paket_model->json();
    }

    public function read($id)
    {
        $row = $this->M_produk_paket_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_paket' => $row->id_paket,
                'id_kategori' => $row->id_kategori,
                'nm_paket' => $row->nm_paket,
                'deskripsi' => $row->deskripsi,
                'harga' => $row->harga,
                'aktif' => $row->aktif,
                'create_by' => $row->create_by,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 'm_produk_paket/m_produk_paket_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_paket'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_produk_paket/create_action'),
            'id_paket' => set_value('id_paket'),
            'id_kategori' => set_value('id_kategori'),
            'nm_paket' => set_value('nm_paket'),
            'deskripsi' => set_value('deskripsi'),
            'harga' => set_value('harga'),
            'aktif' => set_value('aktif'),
            'create_by' => set_value('create_by'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 'm_produk_paket/m_produk_paket_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kategori' => $this->input->post('id_kategori', TRUE),
                'nm_paket' => $this->input->post('nm_paket', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
                'create_by' => $this->input->post('create_by', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
            );

            $this->M_produk_paket_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_produk_paket'));
        }
    }

    public function update($id)
    {
        $row = $this->M_produk_paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_produk_paket/update_action'),
                'id_paket' => set_value('id_paket', $row->id_paket),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'nm_paket' => set_value('nm_paket', $row->nm_paket),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'harga' => set_value('harga', $row->harga),
                'aktif' => set_value('aktif', $row->aktif),
                'create_by' => set_value('create_by', $row->create_by),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 'm_produk_paket/m_produk_paket_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_paket'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paket', TRUE));
        } else {
            $data = array(
                'id_kategori' => $this->input->post('id_kategori', TRUE),
                'nm_paket' => $this->input->post('nm_paket', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
                'create_by' => $this->input->post('create_by', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
            );

            $this->M_produk_paket_model->update($this->input->post('id_paket', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_produk_paket'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_produk_paket_model->get_by_id($id);

        if ($row) {
            $this->M_produk_paket_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_produk_paket'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_produk_paket'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
        $this->form_validation->set_rules('nm_paket', 'nm paket', 'trim|required');
        //$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
        $this->form_validation->set_rules('create_by', 'create by', 'trim|required');
        $this->form_validation->set_rules('create_date', 'create date', 'trim|required');

        $this->form_validation->set_rules('id_paket', 'id_paket', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_produk_paket.php */
/* Location: ./application/controllers/M_produk_paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-30 08:02:56 */
/* http://harviacode.com */