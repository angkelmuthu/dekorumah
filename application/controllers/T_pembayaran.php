<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_pembayaran_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 't_pembayaran/t_pembayaran_list');
    }

    public function ajax_list()
    {
        $list = $this->T_pembayaran_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = tanggaljam($res->create_date);
            $row[] = $res->nama_dana . ' - ' . $res->norek;
            $row[] = $res->no_bayar;
            $row[] = $res->nama_projek;
            $row[] = $res->title;
            $row[] = '<div class="text-right">' . angka($res->total) . '</div>';
            $row[] = $res->keterangan;
            $row[] = '
            <a href="' . site_url('t_pembayaran/kwitansi/' . $res->id_bayar) . '" target="_blank" class="btn btn-success btn-xs"><i class="fal fa-file-pdf" aria-hidden="true"></i></a>
            <button type="button" class="view_bayar btn btn-info btn-xs" id_bayar="' . $res->id_bayar . '"><i class="fal fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#default' . $res->id_bayar . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
            <div class="modal fade" id="default' . $res->id_bayar . '" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xs" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Pembayaran
                            <small class="m-0 text-muted">
                                Hapus Pembayaran
                            </small>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                        <div class="modal-body">
<p>Apa anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="' . site_url('t_pembayaran/delete/' . $res->id_bayar) . '" class="btn btn-primary">Ya, Hapus</a>
                        </div>
                </div>
            </div>
        </div>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->T_pembayaran_model->count_all(),
            "recordsFiltered" => $this->T_pembayaran_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function create_action()
    {
        if (isset($_FILES["gambar"]["name"])) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                // $config['maintain_ratio'] = TRUE;
                // $config['quality'] = '60%';
                // $config['width'] = 800;
                // $config['height'] = 800;
                $config['new_image'] = './assets/gambar/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image = $data['file_name'];
            }

            $no_bayar = 'INV.' . date('ymdHis');
            $data = array(
                'no_bayar' => $no_bayar,
                'id_dana' => $this->input->post('id_dana', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'title' => $this->input->post('title', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'total' => str_replace('.', '', $this->input->post('total')),
                'file' => $image,
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        } else {
            $no_bayar = 'INV.' . date('ymdHis');
            $data = array(
                'no_bayar' => $no_bayar,
                'id_dana' => $this->input->post('id_dana', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'title' => $this->input->post('title', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'total' => str_replace('.', '', $this->input->post('total')),
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        }

        $this->T_pembayaran_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_pembayaran'));
    }

    public function update_action()
    {
        if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
            if (isset($_FILES["gambar"]["name"])) {
                $config['upload_path'] = './assets/gambar/';
                $config['allowed_types'] = 'jpg|jpeg|pdf';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->upload->display_errors();
                    return FALSE;
                } else {
                    $data = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/gambar/' . $data['file_name'];
                    $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = TRUE;
                    // $config['quality'] = '60%';
                    // $config['width'] = 800;
                    // $config['height'] = 800;
                    $config['new_image'] = './assets/gambar/' . $data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $data['file_name'];
                }
            }

            $no_bayar = 'INV.' . date('ymdHis');
            $data = array(
                // 'no_bayar' => $no_bayar,
                // 'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'id_dana' => $this->input->post('id_dana', TRUE),
                'title' => $this->input->post('title', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'total' => str_replace('.', '', $this->input->post('total')),
                'file' => $image,
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        } else {
            $no_bayar = 'INV.' . date('ymdHis');
            $data = array(
                // 'no_bayar' => $no_bayar,
                // 'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'id_dana' => $this->input->post('id_dana', TRUE),
                'title' => $this->input->post('title', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'total' => str_replace('.', '', $this->input->post('total')),
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        }
        $this->T_pembayaran_model->update($this->input->post('id_bayar', TRUE), $data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_pembayaran'));
    }

    public function delete($id)
    {
        $this->db->where('id_bayar', $id);
        $this->db->delete('t_pembayaran');
        redirect(site_url('t_pembayaran'));
    }

    function vbayar()
    {
        $data = array(
            'id_bayar' => $this->input->post('id_bayar'),
            'bayar' => $this->T_pembayaran_model->get_pembayaran($this->input->post('id_bayar')),
        );
        $this->load->view('t_pembayaran/modal_vbayar', $data);
    }

    function kwitansi($id_bayar)
    {
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "tes.pdf";
        $this->pdf->load_view('t_pembayaran/kwitansi_pdf');
        //$this->load->view('t_pembayaran/kwitansi_pdf');
    }
}
