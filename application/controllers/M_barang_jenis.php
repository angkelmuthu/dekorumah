<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang_jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_barang_jenis_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_barang_jenis/m_barang_jenis_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_barang_jenis_model->json();
    }

    public function read($id)
    {
        $row = $this->M_barang_jenis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang_jenis' => $row->id_barang_jenis,
		'barang_jenis' => $row->barang_jenis,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_barang_jenis/m_barang_jenis_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang_jenis'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_barang_jenis/create_action'),
	    'id_barang_jenis' => set_value('id_barang_jenis'),
	    'barang_jenis' => set_value('barang_jenis'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_barang_jenis/m_barang_jenis_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'barang_jenis' => $this->input->post('barang_jenis',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_barang_jenis_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_barang_jenis'));
        }
    }

    public function update($id)
    {
        $row = $this->M_barang_jenis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_barang_jenis/update_action'),
		'id_barang_jenis' => set_value('id_barang_jenis', $row->id_barang_jenis),
		'barang_jenis' => set_value('barang_jenis', $row->barang_jenis),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_barang_jenis/m_barang_jenis_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang_jenis'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang_jenis', TRUE));
        } else {
            $data = array(
		'barang_jenis' => $this->input->post('barang_jenis',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_barang_jenis_model->update($this->input->post('id_barang_jenis', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_barang_jenis'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_barang_jenis_model->get_by_id($id);

        if ($row) {
            $this->M_barang_jenis_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_barang_jenis'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang_jenis'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('barang_jenis', 'barang jenis', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_barang_jenis', 'id_barang_jenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_barang_jenis.xls";
        $judul = "m_barang_jenis";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Barang Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

	foreach ($this->M_barang_jenis_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->barang_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_barang_jenis.php */
/* Location: ./application/controllers/M_barang_jenis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 15:20:44 */
/* http://harviacode.com */