<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_keuangan_new extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_keuangan_new_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 'T_keuangan_new/T_keuangan_new_list');
    }

    public function ajax_list()
    {
        $list = $this->T_keuangan_new_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = tanggaljam($res->create_date);
            $row[] = $res->rek;
            $row[] = $res->noref;
            $row[] = $res->perihal;
            if (!empty($res->debit)) {
                $row[] = '<div class="text-right">' . formatRP0($res->debit) . '</div>';
            } else {
                $row[] = '<div class="text-right"></div>';
            }
            if (!empty($res->kredit)) {
                $row[] = '<div class="text-right">' . formatRP0($res->kredit) . '</div>';
            } else {
                $row[] = '<div class="text-right"></div>';
            }
            if ($res->tipe == '0') {
                $row[] = '
            <button type="button" class="view_bayar btn btn-info btn-xs" idx="' . $res->id . '"  tipe="' . $res->tipe . '"><i class="fal fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#default' . $res->id . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
            <div class="modal fade" id="default' . $res->id . '" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xs" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            KEUANGAN
                            <small class="m-0 text-muted">
                                Hapus Transaksi
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
                            <a href="' . site_url('t_keuangan_new/delete/' . $res->id) . '" class="btn btn-primary">Ya, Hapus</a>
                        </div>
                </div>
            </div>
        </div>
            ';
            } else {
                $row[] = '<button type="button" class="view_bayar btn btn-info btn-xs" idx="' . $res->id . '"  tipe="' . $res->tipe . '"><i class="fal fa-eye" aria-hidden="true"></i></button>';
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->T_keuangan_new_model->count_all(),
            "recordsFiltered" => $this->T_keuangan_new_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function create_action()
    {
        if ($this->input->post('jenis') == 'debit') {
            $debit = str_replace('.', '', $this->input->post('total'));
            $kredit = '';
        } else {
            $kredit = str_replace('.', '', $this->input->post('total'));
            $debit = '';
        }
        if (isset($_FILES["gambar"]["name"])) {
            //if (isset($_FILES["gambar"]["name"])) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'jpg|pdf';
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
            //}

            $data = array(
                'noref' => $this->input->post('noref', TRUE),
                'id_dana' => $this->input->post('id_dana', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'debit' => $debit,
                'kredit' => $kredit,
                'file' => $image,
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'noref' => $this->input->post('noref', TRUE),
                'id_dana' => $this->input->post('id_dana', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'debit' => $debit,
                'kredit' => $kredit,
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        }

        $this->T_keuangan_new_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('T_keuangan_new'));
    }

    public function update_action()
    {
        if ($this->input->post('jenis') == 'debit') {
            $debit = str_replace('.', '', $this->input->post('total'));
            $kredit = '';
        } else {
            $kredit = str_replace('.', '', $this->input->post('total'));
            $debit = '';
        }
        if (isset($_FILES["gambar"]["name"])) {
            //if (isset($_FILES["gambar"]["name"])) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'jpg|pdf';
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
            //}

            $data = array(
                'noref' => $this->input->post('noref', TRUE),
                'id_dana' => $this->input->post('id_dana', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'debit' => $debit,
                'kredit' => $kredit,
                'file' => $image,
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'noref' => $this->input->post('noref', TRUE),
                'id_dana' => $this->input->post('id_dana', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'debit' => $debit,
                'kredit' => $kredit,
                'id_users' => $this->session->userdata('id_users'),
                'create_by' => $this->session->userdata('full_name'),
                'create_date' => date('Y-m-d H:i:s'),
            );
        }

        $this->T_keuangan_new_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('T_keuangan_new'));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('t_keuangan_new');
        redirect(site_url('T_keuangan_new'));
    }

    function vbayar()
    {
        if ($this->input->post('tipe') == '0') {
            $data = array(
                'idx' => $this->input->post('idx'),
                'bayar' => $this->T_keuangan_new_model->get_keuangan_new($this->input->post('idx')),
            );
            $this->load->view('T_keuangan_new/modal_keuangan', $data);
        } else {
            $data = array(
                'idx' => $this->input->post('idx'),
                'bayar' => $this->T_keuangan_new_model->get_vkeuangan_new($this->input->post('idx')),
            );
            $this->load->view('T_keuangan_new/modal_vkeuangan', $data);
        }
    }
}
