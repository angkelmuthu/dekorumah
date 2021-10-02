<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_invoice_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_invoice/t_invoice_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_invoice_model->json();
    }

    public function read($id)
    {
        $row = $this->T_invoice_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'no_invoice' => $row->no_invoice,
                'tgl_invoice' => $row->tgl_invoice,
                'nama' => $row->nama,
                'email' => $row->email,
                'hp' => $row->hp,
                'alamat' => $row->alamat,
                'users' => $row->users,
                'create_date' => $row->create_date,
                'id_status' => $row->id_status,
                'status' => $row->status,
                'nm_sales' => $row->nm_sales,
            );
            $this->template->load('template', 't_invoice/t_invoice_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_invoice'));
        }
    }

    public function kwitansi()
    {
        $this->template->load('template', 't_invoice/pdf_pembayaran');
        //$this->load->view('t_invoice/pdf_pembayaran');
    }
    public function print_invoice()
    {
        $this->template->load('template', 't_invoice/print_invoice');
        //$this->load->view('t_invoice/pdf_pembayaran');
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_invoice/create_action'),
            'id' => set_value('id'),
            'no_invoice' => set_value('no_invoice'),
            'tgl_invoice' => set_value('tgl_invoice'),
            'id_pelanggan' => set_value('id_pelanggan'),
            'users' => set_value('users'),
            'create_date' => set_value('create_date'),
            'id_status' => set_value('id_status'),
            'id_sales' => set_value('id_sales'),
        );
        $this->template->load('template', 't_invoice/t_invoice_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_invoice' => $this->input->post('no_invoice', TRUE),
                'tgl_invoice' => $this->input->post('tgl_invoice', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'users' => $this->input->post('users', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
                //'id_status' => $this->input->post('id_status', TRUE),
                'id_status' => '0',
                'id_sales' => $this->input->post('id_sales', TRUE),
            );

            $this->T_invoice_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_invoice'));
        }
    }

    public function update($id)
    {
        $row = $this->T_invoice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_invoice/update_action'),
                'id' => set_value('id', $row->id),
                'no_invoice' => set_value('no_invoice', $row->no_invoice),
                'tgl_invoice' => set_value('tgl_invoice', $row->tgl_invoice),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
                'users' => set_value('users', $row->users),
                'create_date' => set_value('create_date', $row->create_date),
                //'id_status' => set_value('id_status', $row->id_status),
                'id_sales' => set_value('id_sales', $row->id_sales),
            );
            $this->template->load('template', 't_invoice/t_invoice_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_invoice'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'no_invoice' => $this->input->post('no_invoice', TRUE),
                'tgl_invoice' => $this->input->post('tgl_invoice', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'users' => $this->input->post('users', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
                'id_status' => $this->input->post('id_status', TRUE),
                'id_sales' => $this->input->post('id_sales', TRUE),
            );

            $this->T_invoice_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_invoice'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_invoice_model->get_by_id($id);

        if ($row) {
            $this->T_invoice_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_invoice'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_invoice'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_invoice', 'no invoice', 'trim|required');
        $this->form_validation->set_rules('tgl_invoice', 'tgl invoice', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
        $this->form_validation->set_rules('users', 'users', 'trim|required');
        $this->form_validation->set_rules('create_date', 'create date', 'trim|required');
        //$this->form_validation->set_rules('id_status', 'id_status', 'trim|required');
        $this->form_validation->set_rules('id_sales', 'id sales', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_invoice.xls";
        $judul = "t_invoice";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "No Invoice");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Invoice");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Pelanggan");
        xlsWriteLabel($tablehead, $kolomhead++, "Users");
        xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
        xlsWriteLabel($tablehead, $kolomhead++, "id_Status");

        foreach ($this->T_invoice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_invoice);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_invoice);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_pelanggan);
            xlsWriteLabel($tablebody, $kolombody++, $data->users);
            xlsWriteLabel($tablebody, $kolombody++, $data->create_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_status);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file T_invoice.php */
/* Location: ./application/controllers/T_invoice.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 08:54:39 */
/* http://harviacode.com */