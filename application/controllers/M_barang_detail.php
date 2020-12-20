<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang_detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_barang_detail_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_barang_detail/m_barang_detail_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_barang_detail_model->json();
    }

    public function read($id)
    {
        $row = $this->M_barang_detail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_barang_detail' => $row->id_barang_detail,
                'nm_barang_detail' => $row->nm_barang_detail,
                'id_barang' => $row->id_barang,
                'id_barang_sub' => $row->id_barang_sub,
                'harga' => $row->harga,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'm_barang_detail/m_barang_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang_detail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_barang_detail/create_action'),
            'id_barang_detail' => set_value('id_barang_detail'),
            'nm_barang_detail' => set_value('nm_barang_detail'),
            'id_barang' => set_value('id_barang'),
            'id_barang_sub' => set_value('id_barang_sub'),
            'harga' => set_value('harga'),
            'aktif' => set_value('aktif'),
            'barang' => $this->M_barang_detail_model->fetch_barang(),
        );
        $this->template->load('template', 'm_barang_detail/m_barang_detail_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nm_barang_detail' => $this->input->post('nm_barang_detail', TRUE),
                'id_barang' => $this->input->post('id_barang', TRUE),
                'id_barang_sub' => $this->input->post('id_barang_sub', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_barang_detail_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_barang_detail'));
        }
    }

    public function update($id)
    {
        $row = $this->M_barang_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_barang_detail/update_action'),
                'id_barang_detail' => set_value('id_barang_detail', $row->id_barang_detail),
                'nm_barang_detail' => set_value('nm_barang_detail', $row->nm_barang_detail),
                'id_barang' => set_value('id_barang', $row->id_barang),
                'id_barang_sub' => set_value('id_barang_sub', $row->id_barang_sub),
                'harga' => set_value('harga', $row->harga),
                'aktif' => set_value('aktif', $row->aktif),
                'barang' => $this->M_barang_detail_model->fetch_barang(),
            );
            $this->template->load('template', 'm_barang_detail/m_barang_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang_detail'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang_detail', TRUE));
        } else {
            $data = array(
                'nm_barang_detail' => $this->input->post('nm_barang_detail', TRUE),
                'id_barang' => $this->input->post('id_barang', TRUE),
                'id_barang_sub' => $this->input->post('id_barang_sub', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_barang_detail_model->update($this->input->post('id_barang_detail', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_barang_detail'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_barang_detail_model->get_by_id($id);

        if ($row) {
            $this->M_barang_detail_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_barang_detail'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang_detail'));
        }
    }

    function fetch_barang_sub()
    {
        if ($this->input->post('id_barang')) {
            echo $this->M_barang_detail_model->fetch_barang_sub($this->input->post('id_barang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_barang_detail', 'nm barang detail', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
        $this->form_validation->set_rules('id_barang_sub', 'id barang sub', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('id_barang_detail', 'id_barang_detail', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_barang_detail.xls";
        $judul = "m_barang_detail";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nm Barang Detail");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Barang Sub");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

        foreach ($this->M_barang_detail_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_barang_detail);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_barang_sub);
            xlsWriteLabel($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->aktif);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_barang_detail.php */
/* Location: ./application/controllers/M_barang_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-20 09:32:44 */
/* http://harviacode.com */