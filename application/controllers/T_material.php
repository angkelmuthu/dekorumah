<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_material extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_material_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_material/t_material_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_material_model->json();
    }

    public function read($id)
    {
        $row = $this->T_material_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_material' => $row->id_material,
                'id_invoice' => $row->id_invoice,
                'id_barang' => $row->id_barang,
                'qty' => $row->qty,
                'harga_satuan' => $row->harga_satuan,
                'total' => $row->total,
                'id_user' => $row->id_user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_material/t_material_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_material'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_material/create_action'),
            'id_material' => set_value('id_material'),
            'id_invoice' => set_value('id_invoice'),
            'id_barang' => set_value('id_barang'),
            'qty' => set_value('qty'),
            'harga_satuan' => set_value('harga_satuan'),
            'total' => set_value('total'),
            'id_user' => set_value('id_user'),
            'create_date' => set_value('create_date'),
            'barang_jenis' => $this->T_material_model->fetch_barang_jenis(),
        );
        $this->template->load('template', 't_material/t_material_form', $data);
    }

    public function create_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {
        $data = array(
            'id_invoice' => $this->input->post('id_invoice', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'qty' => $this->input->post('qty', TRUE),
            'harga_satuan' => str_replace('.', '', $this->input->post('harga_satuan', TRUE)),
            'total' => str_replace('.', '', $this->input->post('total', TRUE)),
            'id_user' => $this->input->post('id_user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_material_model->insert($data);

        $stok = $this->input->post('stok') - $this->input->post('qty');
        $data_stok = array(
            'stok' => $stok,
        );
        $this->T_material_model->update_stok($this->input->post('id_barang', TRUE), $data_stok);

        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_invoice/read/' . $this->input->post('id_invoice')));
        //}
    }

    public function update($id)
    {
        $row = $this->T_material_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_material/update_action'),
                'id_material' => set_value('id_material', $row->id_material),
                'id_invoice' => set_value('id_invoice', $row->id_invoice),
                'id_barang' => set_value('id_barang', $row->id_barang),
                'qty' => set_value('qty', $row->qty),
                'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
                'total' => set_value('total', $row->total),
                'id_user' => set_value('id_user', $row->id_user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_material/t_material_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_material'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_material', TRUE));
        } else {
            $data = array(
                'id_invoice' => $this->input->post('id_invoice', TRUE),
                'id_barang' => $this->input->post('id_barang', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'harga_satuan' => $this->input->post('harga_satuan', TRUE),
                'total' => $this->input->post('total', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
            );

            $this->T_material_model->update($this->input->post('id_material', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_material'));
        }
    }

    public function delete($id_invoice, $id)
    {
        $row = $this->T_material_model->get_by_id($id);

        if ($row) {
            $this->T_material_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_invoice/read/' . $id_invoice));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_invoice/read/' . $id_invoice));
        }
    }

    function fetch_barang()
    {
        if ($this->input->post('id_barang_jenis')) {
            echo $this->T_material_model->fetch_barang($this->input->post('id_barang_jenis'));
        }
    }
    function fetch_barang_harga()
    {
        $id_barang = $this->input->post('id_barang');
        $data = $this->T_material_model->fetch_barang_harga($id_barang);
        echo json_encode($data);
    }


    public function _rules()
    {
        $this->form_validation->set_rules('id_invoice', 'id invoice', 'trim|required');
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
        $namaFile = "t_material.xls";
        $judul = "t_material";
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

        foreach ($this->T_material_model->get_all() as $data) {
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

/* End of file T_material.php */
/* Location: ./application/controllers/T_material.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 16:43:57 */
/* http://harviacode.com */