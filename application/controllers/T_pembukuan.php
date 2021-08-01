<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pembukuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_pembukuan_model');
        $this->load->library('form_validation');
    }

    // public function index()
    // {
    //     $q = urldecode($this->input->get('q', TRUE));
    //     $start = intval($this->uri->segment(3));

    //     if ($q <> '') {
    //         $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
    //         $config['first_url'] = base_url() . 'index.php/t_pembukuan/index.html?q=' . urlencode($q);
    //     } else {
    //         $config['base_url'] = base_url() . 'index.php/t_pembukuan/index/';
    //         $config['first_url'] = base_url() . 'index.php/t_pembukuan/index/';
    //     }

    //     $config['per_page'] = 10;
    //     $config['page_query_string'] = FALSE;
    //     $config['total_rows'] = $this->T_pembukuan_model->total_rows($q);
    //     $t_pembukuan = $this->T_pembukuan_model->get_limit_data($config['per_page'], $start, $q);
    //     $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
    //     $config['full_tag_close'] = '</ul>';
    //     $this->load->library('pagination');
    //     $this->pagination->initialize($config);

    //     $data = array(
    //         't_pembukuan_data' => $t_pembukuan,
    //         'q' => $q,
    //         'pagination' => $this->pagination->create_links(),
    //         'total_rows' => $config['total_rows'],
    //         'start' => $start,
    //     );
    //     $data['saldo']   = $this->T_pembukuan_model->get_saldo();
    //     $this->template->load('template', 't_pembukuan/t_pembukuan_list', $data);
    // }

    public function index()
    {
        $data['buku']   = $this->T_pembukuan_model->get_all();
        $data['saldo']   = $this->T_pembukuan_model->get_saldo();
        $this->template->load('template', 't_pembukuan/t_pembukuan_list', $data);
    }


    public function read($id)
    {
        $row = $this->T_pembukuan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_buku' => $row->id_buku,
                'id_survei' => $row->id_survei,
                'id_group' => $row->id_group,
                'id_group_sub' => $row->id_group_sub,
                'deskripsi' => $row->deskripsi,
                'qty' => $row->qty,
                'satuan' => $row->satuan,
                'harga' => $row->harga,
                'total' => $row->total,
                'note' => $row->note,
                'created_date' => $row->created_date,
                'created_by' => $row->created_by,
            );
            $this->template->load('template', 't_pembukuan/t_pembukuan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pembukuan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pembukuan/create_action'),
            'id_buku' => set_value('id_buku'),
            'id_survei' => set_value('id_survei'),
            'id_group' => set_value('id_group'),
            'id_group_sub' => set_value('id_group_sub'),
            'deskripsi' => set_value('deskripsi'),
            'qty' => set_value('qty'),
            'satuan' => set_value('satuan'),
            'harga' => set_value('harga'),
            'total' => set_value('total'),
            'note' => set_value('note'),
            'created_date' => set_value('created_date'),
            'created_by' => set_value('created_by'),
        );
        $this->template->load('template', 't_pembukuan/t_pembukuan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                //'id_survei' => $this->input->post('id_survei', TRUE),
                'id_group' => $this->input->post('id_group', TRUE),
                //'id_group_sub' => $this->input->post('id_group_sub', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                // 'qty' => $this->input->post('qty', TRUE),
                // 'satuan' => $this->input->post('satuan', TRUE),
                // 'harga' => $this->input->post('harga', TRUE),
                'total' => $this->input->post('total', TRUE),
                'note' => $this->input->post('note', TRUE),
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('full_name'),
            );

            $this->T_pembukuan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_pembukuan'));
        }
    }

    public function update($id)
    {
        $row = $this->T_pembukuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pembukuan/update_action'),
                'id_buku' => set_value('id_buku', $row->id_buku),
                'id_survei' => set_value('id_survei', $row->id_survei),
                'id_group' => set_value('id_group', $row->id_group),
                'id_group_sub' => set_value('id_group_sub', $row->id_group_sub),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'qty' => set_value('qty', $row->qty),
                'satuan' => set_value('satuan', $row->satuan),
                'harga' => set_value('harga', $row->harga),
                'total' => set_value('total', $row->total),
                'note' => set_value('note', $row->note),
                'created_date' => set_value('created_date', $row->created_date),
                'created_by' => set_value('created_by', $row->created_by),
            );
            $this->template->load('template', 't_pembukuan/t_pembukuan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pembukuan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buku', TRUE));
        } else {
            $data = array(
                //'id_survei' => $this->input->post('id_survei', TRUE),
                'id_group' => $this->input->post('id_group', TRUE),
                //'id_group_sub' => $this->input->post('id_group_sub', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                // 'qty' => $this->input->post('qty', TRUE),
                // 'satuan' => $this->input->post('satuan', TRUE),
                // 'harga' => $this->input->post('harga', TRUE),
                'total' => $this->input->post('total', TRUE),
                'note' => $this->input->post('note', TRUE),
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('full_name'),
            );

            $this->T_pembukuan_model->update($this->input->post('id_buku', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_pembukuan'));
        }
    }

    public function delete($id_invoice, $id)
    {
        $row = $this->T_pembukuan_model->get_by_id($id);

        if ($row) {
            $this->T_pembukuan_model->delete($id);
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

    public function _rules()
    {
        //$this->form_validation->set_rules('id_survei', 'id survei', 'trim|required');
        $this->form_validation->set_rules('id_group', 'id group', 'trim|required');
        //$this->form_validation->set_rules('id_group_sub', 'id group sub', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        // $this->form_validation->set_rules('qty', 'qty', 'trim|required');
        // $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        // $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        // $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        // $this->form_validation->set_rules('created_by', 'created by', 'trim|required');

        $this->form_validation->set_rules('id_buku', 'id_buku', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_pembukuan.xls";
        $judul = "t_pembukuan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Survei");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Group");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Group Sub");
        xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
        xlsWriteLabel($tablehead, $kolomhead++, "Qty");
        xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Total");
        xlsWriteLabel($tablehead, $kolomhead++, "Note");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");

        foreach ($this->T_pembukuan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_survei);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_group);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_group_sub);
            xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
            xlsWriteNumber($tablebody, $kolombody++, $data->qty);
            xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga);
            xlsWriteNumber($tablebody, $kolombody++, $data->total);
            xlsWriteLabel($tablebody, $kolombody++, $data->note);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_by);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file T_pembukuan.php */
/* Location: ./application/controllers/T_pembukuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-03 13:03:18 */
/* http://harviacode.com */
