<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_barang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_barang/m_barang_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_barang_model->json();
    }

    public function read($id)
    {
        $row = $this->M_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'barang' => $row->barang,
		'deskripsi' => $row->deskripsi,
		'id_barang_jenis' => $row->id_barang_jenis,
		'harga_satuan' => $row->harga_satuan,
		'stok' => $row->stok,
		'id_user' => $row->id_user,
		'update_date' => $row->update_date,
	    );
            $this->template->load('template','m_barang/m_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'barang' => set_value('barang'),
	    'deskripsi' => set_value('deskripsi'),
	    'id_barang_jenis' => set_value('id_barang_jenis'),
	    'harga_satuan' => set_value('harga_satuan'),
	    'stok' => set_value('stok'),
	    'id_user' => set_value('id_user'),
	    'update_date' => set_value('update_date'),
	);
        $this->template->load('template','m_barang/m_barang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'barang' => $this->input->post('barang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'id_barang_jenis' => $this->input->post('id_barang_jenis',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->M_barang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function update($id)
    {
        $row = $this->M_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'barang' => set_value('barang', $row->barang),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'id_barang_jenis' => set_value('id_barang_jenis', $row->id_barang_jenis),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
		'stok' => set_value('stok', $row->stok),
		'id_user' => set_value('id_user', $row->id_user),
		'update_date' => set_value('update_date', $row->update_date),
	    );
            $this->template->load('template','m_barang/m_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'barang' => $this->input->post('barang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'id_barang_jenis' => $this->input->post('id_barang_jenis',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->M_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_barang_model->get_by_id($id);

        if ($row) {
            $this->M_barang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_barang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_barang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('barang', 'barang', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('id_barang_jenis', 'id barang jenis', 'trim|required');
	$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('update_date', 'update date', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_barang.xls";
        $judul = "m_barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Date");

	foreach ($this->M_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang_jenis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_satuan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_barang.php */
/* Location: ./application/controllers/M_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 15:32:03 */
/* http://harviacode.com */