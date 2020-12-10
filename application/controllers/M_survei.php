<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_survei extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_survei_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_survei/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_survei/index/';
            $config['first_url'] = base_url() . 'index.php/m_survei/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_survei_model->total_rows($q);
        $m_survei = $this->M_survei_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_survei_data' => $m_survei,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_survei/m_survei_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_survei_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_survei' => $row->id_survei,
                'tgl_survei' => $row->tgl_survei,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'email' => $row->email,
                'hp' => $row->hp,
                'note' => $row->note,
                'color' => $row->color,
                'created_date' => $row->created_date,
                'users' => $row->users,
                'pesanan' => $this->M_survei_model->get_pesanan($id),
            );
            $this->template->load('template', 'm_survei/m_survei_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_survei/create_action'),
            'id_survei' => set_value('id_survei'),
            'tgl_survei' => set_value('tgl_survei'),
            'nama' => set_value('nama'),
            'alamat' => set_value('alamat'),
            'email' => set_value('email'),
            'hp' => set_value('hp'),
            'note' => set_value('note'),
            'color' => set_value('color'),
            'created_date' => set_value('created_date'),
            'users' => set_value('users'),
        );
        $this->template->load('template', 'm_survei/m_survei_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tgl_survei' => $this->input->post('tgl_survei', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'note' => $this->input->post('note', TRUE),
                'color' => $this->input->post('color', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'users' => $this->input->post('users', TRUE),
            );

            $this->M_survei_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function update($id)
    {
        $row = $this->M_survei_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_survei/update_action'),
                'id_survei' => set_value('id_survei', $row->id_survei),
                'tgl_survei' => set_value('tgl_survei', $row->tgl_survei),
                'nama' => set_value('nama', $row->nama),
                'alamat' => set_value('alamat', $row->alamat),
                'email' => set_value('email', $row->email),
                'hp' => set_value('hp', $row->hp),
                'note' => set_value('note', $row->note),
                'color' => set_value('color', $row->color),
                'created_date' => set_value('created_date', $row->created_date),
                'users' => set_value('users', $row->users),
            );
            $this->template->load('template', 'm_survei/m_survei_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_survei'));
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
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'note' => $this->input->post('note', TRUE),
                'color' => $this->input->post('color', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'users' => $this->input->post('users', TRUE),
            );

            $this->M_survei_model->update($this->input->post('id_survei', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_survei_model->get_by_id($id);

        if ($row) {
            $this->M_survei_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_survei'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_survei'));
        }
    }
    ///////////////////////////////////pesanan////////////////////////////////////////////////
    public function create_pesanan()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pesanan/create_action'),
            'id_pesanan' => set_value('id_pesanan'),
            'no_pesanan' => set_value('no_pesanan'),
            'id_survei' => set_value('id_survei'),
            'id_tipe_pesanan' => set_value('id_tipe_pesanan'),
            'id_jenis_bahan' => set_value('id_jenis_bahan'),
            'p' => set_value('p'),
            'l' => set_value('l'),
            't' => set_value('t'),
            'note' => set_value('note'),
            'id_status' => set_value('id_status'),
            'created_date' => set_value('created_date'),
            'users' => set_value('users'),
            'is_deleted' => set_value('is_deleted'),
        );
        $this->template->load('template', 'm_survei/m_survei_pesanan', $data);
    }
    ///////////////////////////////////////
    public function _rules()
    {
        $this->form_validation->set_rules('tgl_survei', 'tgl survei', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('hp', 'hp', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        $this->form_validation->set_rules('color', 'color', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('users', 'users', 'trim|required');

        $this->form_validation->set_rules('id_survei', 'id_survei', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_survei.xls";
        $judul = "m_survei";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Hp");
        xlsWriteLabel($tablehead, $kolomhead++, "Note");
        xlsWriteLabel($tablehead, $kolomhead++, "Color");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Users");

        foreach ($this->M_survei_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_survei);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->hp);
            xlsWriteLabel($tablebody, $kolombody++, $data->note);
            xlsWriteLabel($tablebody, $kolombody++, $data->color);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->users);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_survei.php */
/* Location: ./application/controllers/M_survei.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 09:28:39 */
/* http://harviacode.com */
