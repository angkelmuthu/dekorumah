<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_keuangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_keuangan_model');
        $this->load->library('form_validation');
    }

    // public function index()
    // {
    //     $q = urldecode($this->input->get('q', TRUE));
    //     $start = intval($this->uri->segment(3));

    //     if ($q <> '') {
    //         $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
    //         $config['first_url'] = base_url() . 'index.php/t_keuangan/index.html?q=' . urlencode($q);
    //     } else {
    //         $config['base_url'] = base_url() . 'index.php/t_keuangan/index/';
    //         $config['first_url'] = base_url() . 'index.php/t_keuangan/index/';
    //     }

    //     $config['per_page'] = 10;
    //     $config['page_query_string'] = FALSE;
    //     $config['total_rows'] = $this->T_keuangan_model->total_rows($q);
    //     $t_keuangan = $this->T_keuangan_model->get_limit_data($config['per_page'], $start, $q);
    //     $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
    //     $config['full_tag_close'] = '</ul>';
    //     $this->load->library('pagination');
    //     $this->pagination->initialize($config);

    //     $data = array(
    //         't_keuangan_data' => $t_keuangan,
    //         'q' => $q,
    //         'pagination' => $this->pagination->create_links(),
    //         'total_rows' => $config['total_rows'],
    //         'start' => $start,
    //     );
    //     $this->template->load('template', 't_keuangan/t_keuangan_list', $data);
    // }
    public function index()
    {
        $data['list'] = $this->T_keuangan_model->get_all();
        $this->template->load('template', 't_keuangan/t_keuangan_list', $data);
    }

    public function laporan_projek()
    {
        $data['laporan'] = $this->T_keuangan_model->get_lapprojek();
        $this->template->load('template', 't_keuangan/laporan_project', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_keuangan_model->json();
    }
    public function read($id)
    {
        $row = $this->T_keuangan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_buku' => $row->id_buku,
                'id_group' => $row->id_group,
                'deskripsi' => $row->deskripsi,
                'total' => $row->total,
                'note' => $row->note,
                'created_date' => $row->created_date,
                'created_by' => $row->created_by,
            );
            $this->template->load('template', 't_keuangan/t_keuangan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_keuangan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_keuangan/create_action'),
            'id_buku' => set_value('id_buku'),
            'id_group' => set_value('id_group'),
            'deskripsi' => set_value('deskripsi'),
            'total' => set_value('total'),
            'note' => set_value('note'),
            'created_date' => set_value('created_date'),
            'created_by' => set_value('created_by'),
        );
        $this->template->load('template', 't_keuangan/t_keuangan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_group' => $this->input->post('id_group', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                //'total' => $this->input->post('total', TRUE),
                'total' => str_replace('.', '', $this->input->post('total', TRUE)),
                'note' => $this->input->post('note', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
            );

            $this->T_keuangan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_keuangan'));
        }
    }

    public function update($id)
    {
        $row = $this->T_keuangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_keuangan/update_action'),
                'id_buku' => set_value('id_buku', $row->id_buku),
                'id_group' => set_value('id_group', $row->id_group),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'total' => set_value('total', $row->total),
                'note' => set_value('note', $row->note),
                'created_date' => set_value('created_date', $row->created_date),
                'created_by' => set_value('created_by', $row->created_by),
            );
            $this->template->load('template', 't_keuangan/t_keuangan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_keuangan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buku', TRUE));
        } else {
            $data = array(
                'id_group' => $this->input->post('id_group', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                //'total' => $this->input->post('total', TRUE),
                'total' => str_replace('.', '', $this->input->post('total', TRUE)),
                'note' => $this->input->post('note', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
            );

            $this->T_keuangan_model->update($this->input->post('id_buku', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_keuangan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_keuangan_model->get_by_id($id);

        if ($row) {
            $this->T_keuangan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_keuangan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_keuangan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_group', 'id group', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('created_by', 'created by', 'trim|required');

        $this->form_validation->set_rules('id_buku', 'id_buku', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_keuangan.xls";
        $judul = "t_keuangan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Group");
        xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
        xlsWriteLabel($tablehead, $kolomhead++, "Total");
        xlsWriteLabel($tablehead, $kolomhead++, "Note");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");

        foreach ($this->T_keuangan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_group);
            xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
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

/* End of file T_keuangan.php */
/* Location: ./application/controllers/T_keuangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-01 13:41:36 */
/* http://harviacode.com */