<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_survei extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_survei_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_survei/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_survei/index/';
            $config['first_url'] = base_url() . 'index.php/t_survei/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_survei_model->total_rows($q);
        $t_survei = $this->T_survei_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_survei_data' => $t_survei,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 't_survei/t_survei_list', $data);
    }

    public function read($id)
    {
        $row = $this->T_survei_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_survei' => $row->id_survei,
                'tgl_survei' => $row->tgl_survei,
                'id_pelanggan' => $row->id_pelanggan,
            );
            $this->template->load('template', 't_survei/t_survei_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_survei'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_survei/create_action'),
            'id_survei' => set_value('id_survei'),
            'tgl_survei' => set_value('tgl_survei'),
            'id_pelanggan' => set_value('id_pelanggan'),
        );
        $this->template->load('template', 't_survei/t_survei_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tgl_survei' => $this->input->post('tgl_survei', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
            );

            $this->T_survei_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_survei'));
        }
    }

    public function update($id)
    {
        $row = $this->T_survei_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_survei/update_action'),
                'id_survei' => set_value('id_survei', $row->id_survei),
                'tgl_survei' => set_value('tgl_survei', $row->tgl_survei),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
            );
            $this->template->load('template', 't_survei/t_survei_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_survei'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_survei', TRUE));
        } else {
            $data = array(
                'tgl_survei' => $this->input->post('tgl_survei', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
            );

            $this->T_survei_model->update($this->input->post('id_survei', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_survei'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_survei_model->get_by_id($id);

        if ($row) {
            $this->T_survei_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_survei'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_survei'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tgl_survei', 'tgl survei', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');

        $this->form_validation->set_rules('id_survei', 'id_survei', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_survei.xls";
        $judul = "t_survei";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Survei");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Pelanggan");

        foreach ($this->T_survei_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_survei);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_pelanggan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file T_survei.php */
/* Location: ./application/controllers/T_survei.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-06 13:01:29 */
/* http://harviacode.com */