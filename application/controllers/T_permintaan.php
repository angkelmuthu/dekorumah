<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_permintaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_permintaan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_permintaan/t_permintaan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_permintaan_model->json();
    }

    public function read($id)
    {
        $row = $this->T_permintaan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pelanggan' => $row->id_pelanggan,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'email' => $row->email,
                'hp' => $row->hp,
                'nama_projek' => $row->nama_projek,
                'nm_sales' => $row->nm_sales,
                'list' => $this->T_permintaan_model->get_permintaan($id),
            );
            $this->template->load('template', 't_permintaan/t_permintaan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_permintaan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_permintaan/create_action'),
            'id_permintaan' => set_value('id_permintaan'),
            'jenis_permintaan' => set_value('jenis_permintaan'),
            'id_pelanggan' => set_value('id_pelanggan'),
            'id_barang' => set_value('id_barang'),
            'qty' => set_value('qty'),
            'deskripsi' => set_value('deskripsi'),
            'id_users' => set_value('id_users'),
            'create_by' => set_value('create_by'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_permintaan/t_permintaan_form', $data);
    }

    public function create_action()
    {
        $no_ro = 'RO' . date('ymdHis');
        $data = array(
            'jenis_permintaan' => $this->input->post('jenis_permintaan', TRUE),
            'no_ro' => $no_ro,
            'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'qty' => $this->input->post('qty', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );

        $this->T_permintaan_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_permintaan/read/' . $this->input->post('id_pelanggan')));
    }

    public function update($id)
    {
        $row = $this->T_permintaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_permintaan/update_action'),
                'id_permintaan' => set_value('id_permintaan', $row->id_permintaan),
                'jenis_permintaan' => set_value('jenis_permintaan', $row->jenis_permintaan),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
                'id_barang' => set_value('id_barang', $row->id_barang),
                'qty' => set_value('qty', $row->qty),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'id_users' => set_value('id_users', $row->id_users),
                'create_by' => set_value('create_by', $row->create_by),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_permintaan/t_permintaan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_permintaan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_permintaan', TRUE));
        } else {
            $data = array(
                'jenis_permintaan' => $this->input->post('jenis_permintaan', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'id_barang' => $this->input->post('id_barang', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
                'create_by' => $this->input->post('create_by', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
            );

            $this->T_permintaan_model->update($this->input->post('id_permintaan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_permintaan'));
        }
    }

    public function delete($id, $id_pelanggan)
    {
        $this->T_permintaan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
        redirect(site_url('T_permintaan/read/' . $id_pelanggan));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('jenis_permintaan', 'jenis permintaan', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
        $this->form_validation->set_rules('qty', 'qty', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');
        $this->form_validation->set_rules('create_by', 'create by', 'trim|required');
        $this->form_validation->set_rules('create_date', 'create date', 'trim|required');

        $this->form_validation->set_rules('id_permintaan', 'id_permintaan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function ajax_list()
    {
        $list = $this->T_permintaan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $res->nama;
            $row[] = $res->alamat;
            $row[] = $res->nama_projek;
            $row[] = $res->nm_sales;
            $row[] = $res->total;
            $row[] = '<a href="' . site_url('T_permintaan/read/' . $res->id_pelanggan) . '" class="btn btn-primary btn-xs"><i class="fal fa-eye" aria-hidden="true"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->T_permintaan_model->count_all(),
            "recordsFiltered" => $this->T_permintaan_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}

/* End of file T_permintaan.php */
/* Location: ./application/controllers/T_permintaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-13 05:39:17 */
/* http://harviacode.com */