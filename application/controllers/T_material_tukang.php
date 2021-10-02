<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_material_tukang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_material_tukang_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_material_tukang/t_material_tukang_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_material_tukang_model->json();
    }

    public function read($id)
    {
        $row = $this->T_material_tukang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_material' => $row->id_material,
                'id_barang' => $row->id_barang,
                'qty' => $row->qty,
                'harga_satuan' => $row->harga_satuan,
                'total' => $row->total,
                'id_sales' => $row->id_sales,
                'note' => $row->note,
                'id_user' => $row->id_user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_material_tukang/t_material_tukang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_material_tukang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_material_tukang/create_action'),
            'id_material' => set_value('id_material'),
            'note' => set_value('note'),
            'id_barang' => set_value('id_barang'),
            'qty' => set_value('qty'),
            'harga_satuan' => set_value('harga_satuan'),
            'total' => set_value('total'),
            'id_sales' => set_value('id_sales'),
            'id_user' => set_value('id_user'),
            'create_date' => set_value('create_date'),
            'barang_jenis' => $this->T_material_tukang_model->fetch_barang_jenis(),
        );
        $this->template->load('template', 't_material_tukang/t_material_tukang_form', $data);
    }

    public function create_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {
        $data = array(
            'note' => $this->input->post('note', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'qty' => $this->input->post('qty', TRUE),
            'harga_satuan' => str_replace('.', '', $this->input->post('harga_satuan', TRUE)),
            'total' => str_replace('.', '', $this->input->post('total', TRUE)),
            'id_sales' => $this->input->post('id_sales', TRUE),
            'id_user' => $this->input->post('id_user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_material_tukang_model->insert($data);
        if ($this->input->post('gudang') == 'IN') {
            $stok = $this->input->post('stok') - $this->input->post('qty');
            $data_stok = array(
                'stok' => $stok,
            );
            $this->T_material_tukang_model->update_stok($this->input->post('id_barang', TRUE), $data_stok);
        }

        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_material_tukang'));
        //}
    }

    public function update($id)
    {
        $row = $this->T_material_tukang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_material_tukang/update_action'),
                'id_material' => set_value('id_material', $row->id_material),
                'note' => set_value('note', $row->note),
                'id_barang' => set_value('id_barang', $row->id_barang),
                'qty' => set_value('qty', $row->qty),
                'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
                'total' => set_value('total', $row->total),
                'id_sales' => set_value('id_sales', $row->id_sales),
                'id_user' => set_value('id_user', $row->id_user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_material_tukang/t_material_tukang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_material_tukang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_material', TRUE));
        } else {
            $data = array(
                'note' => $this->input->post('note', TRUE),
                'id_barang' => $this->input->post('id_barang', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'harga_satuan' => $this->input->post('harga_satuan', TRUE),
                'total' => $this->input->post('total', TRUE),
                'id_sales' => $this->input->post('id_sales', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
            );

            $this->T_material_tukang_model->update($this->input->post('id_material', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_material_tukang'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_material_tukang_model->get_by_id($id);
        $row2 = $this->T_material_tukang_model->get_stok($row->id_barang);
        if ($row2->id_gudang == 1) {
            $stok = $row2->stok + $row->qty;
            $data_stok = array(
                'stok' => $stok,
            );
            $this->T_material_tukang_model->update_stok($row->id_barang, $data_stok);
        }
        if ($row) {
            $this->T_material_tukang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_material_tukang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_material_tukang'));
        }
    }

    function fetch_barang()
    {
        if ($this->input->post('id_barang_jenis')) {
            echo $this->T_material_tukang_model->fetch_barang($this->input->post('id_barang_jenis'));
        }
    }
    function fetch_barang_harga()
    {
        $id_barang = $this->input->post('id_barang');
        $data = $this->T_material_tukang_model->fetch_barang_harga($id_barang);
        echo json_encode($data);
    }


    public function _rules()
    {
        //$this->form_validation->set_rules('id_invoice', 'id invoice', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
        // $this->form_validation->set_rules('qty', 'qty', 'trim|required');
        // $this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
        // $this->form_validation->set_rules('total', 'total', 'trim|required');
        // $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        //$this->form_validation->set_rules('create_date', 'create date', 'trim|required');

        $this->form_validation->set_rules('id_material', 'id_material', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_material_tukang.xls";
        $judul = "t_material_tukang";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Invoice");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
        xlsWriteLabel($tablehead, $kolomhead++, "Qty");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga Satuan");
        xlsWriteLabel($tablehead, $kolomhead++, "Total");
        xlsWriteLabel($tablehead, $kolomhead++, "Id User");
        xlsWriteLabel($tablehead, $kolomhead++, "Create Date");

        foreach ($this->T_material_tukang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_invoice);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
            xlsWriteNumber($tablebody, $kolombody++, $data->qty);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga_satuan);
            xlsWriteNumber($tablebody, $kolombody++, $data->total);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
            xlsWriteLabel($tablebody, $kolombody++, $data->create_date);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file T_material_tukang.php */
/* Location: ./application/controllers/T_material_tukang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 16:43:57 */
/* http://harviacode.com */