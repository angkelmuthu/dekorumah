<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_pesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_pesanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_pesanan/index/';
            $config['first_url'] = base_url() . 'index.php/t_pesanan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_pesanan_model->total_rows($q);
        $t_pesanan = $this->T_pesanan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_pesanan_data' => $t_pesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','t_pesanan/t_pesanan_list', $data);
    }

    public function read($id)
    {
        $row = $this->T_pesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pesanan' => $row->id_pesanan,
		'no_pesanan' => $row->no_pesanan,
		'id_survei' => $row->id_survei,
		'id_tipe_pesanan' => $row->id_tipe_pesanan,
		'id_jenis_bahan' => $row->id_jenis_bahan,
		'p' => $row->p,
		'l' => $row->l,
		't' => $row->t,
		'note' => $row->note,
		'id_status' => $row->id_status,
		'created_date' => $row->created_date,
		'users' => $row->users,
		'is_deleted' => $row->is_deleted,
	    );
            $this->template->load('template','t_pesanan/t_pesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pesanan'));
        }
    }

    public function create()
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
        $this->template->load('template','t_pesanan/t_pesanan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_pesanan' => $this->input->post('no_pesanan',TRUE),
		'id_survei' => $this->input->post('id_survei',TRUE),
		'id_tipe_pesanan' => $this->input->post('id_tipe_pesanan',TRUE),
		'id_jenis_bahan' => $this->input->post('id_jenis_bahan',TRUE),
		'p' => $this->input->post('p',TRUE),
		'l' => $this->input->post('l',TRUE),
		't' => $this->input->post('t',TRUE),
		'note' => $this->input->post('note',TRUE),
		'id_status' => $this->input->post('id_status',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'users' => $this->input->post('users',TRUE),
		'is_deleted' => $this->input->post('is_deleted',TRUE),
	    );

            $this->T_pesanan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_pesanan'));
        }
    }

    public function update($id)
    {
        $row = $this->T_pesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pesanan/update_action'),
		'id_pesanan' => set_value('id_pesanan', $row->id_pesanan),
		'no_pesanan' => set_value('no_pesanan', $row->no_pesanan),
		'id_survei' => set_value('id_survei', $row->id_survei),
		'id_tipe_pesanan' => set_value('id_tipe_pesanan', $row->id_tipe_pesanan),
		'id_jenis_bahan' => set_value('id_jenis_bahan', $row->id_jenis_bahan),
		'p' => set_value('p', $row->p),
		'l' => set_value('l', $row->l),
		't' => set_value('t', $row->t),
		'note' => set_value('note', $row->note),
		'id_status' => set_value('id_status', $row->id_status),
		'created_date' => set_value('created_date', $row->created_date),
		'users' => set_value('users', $row->users),
		'is_deleted' => set_value('is_deleted', $row->is_deleted),
	    );
            $this->template->load('template','t_pesanan/t_pesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pesanan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pesanan', TRUE));
        } else {
            $data = array(
		'no_pesanan' => $this->input->post('no_pesanan',TRUE),
		'id_survei' => $this->input->post('id_survei',TRUE),
		'id_tipe_pesanan' => $this->input->post('id_tipe_pesanan',TRUE),
		'id_jenis_bahan' => $this->input->post('id_jenis_bahan',TRUE),
		'p' => $this->input->post('p',TRUE),
		'l' => $this->input->post('l',TRUE),
		't' => $this->input->post('t',TRUE),
		'note' => $this->input->post('note',TRUE),
		'id_status' => $this->input->post('id_status',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'users' => $this->input->post('users',TRUE),
		'is_deleted' => $this->input->post('is_deleted',TRUE),
	    );

            $this->T_pesanan_model->update($this->input->post('id_pesanan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_pesanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_pesanan_model->get_by_id($id);

        if ($row) {
            $this->T_pesanan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_pesanan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pesanan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('no_pesanan', 'no pesanan', 'trim|required');
	$this->form_validation->set_rules('id_survei', 'id survei', 'trim|required');
	$this->form_validation->set_rules('id_tipe_pesanan', 'id tipe pesanan', 'trim|required');
	$this->form_validation->set_rules('id_jenis_bahan', 'id jenis bahan', 'trim|required');
	$this->form_validation->set_rules('p', 'p', 'trim|required|numeric');
	$this->form_validation->set_rules('l', 'l', 'trim|required|numeric');
	$this->form_validation->set_rules('t', 't', 'trim|required|numeric');
	$this->form_validation->set_rules('note', 'note', 'trim|required');
	$this->form_validation->set_rules('id_status', 'id status', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('users', 'users', 'trim|required');
	$this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

	$this->form_validation->set_rules('id_pesanan', 'id_pesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_pesanan.xls";
        $judul = "t_pesanan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Pesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Survei");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tipe Pesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Bahan");
	xlsWriteLabel($tablehead, $kolomhead++, "P");
	xlsWriteLabel($tablehead, $kolomhead++, "L");
	xlsWriteLabel($tablehead, $kolomhead++, "T");
	xlsWriteLabel($tablehead, $kolomhead++, "Note");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Users");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Deleted");

	foreach ($this->T_pesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_pesanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_survei);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tipe_pesanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_bahan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->p);
	    xlsWriteNumber($tablebody, $kolombody++, $data->l);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t);
	    xlsWriteLabel($tablebody, $kolombody++, $data->note);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->users);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_deleted);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_pesanan.php */
/* Location: ./application/controllers/T_pesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 06:31:26 */
/* http://harviacode.com */