<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_po extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_po_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 't_po/t_po_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_po_model->json();
    }

    public function read($id)
    {
        $row = $this->T_po_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pelanggan' => $row->id_pelanggan,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'email' => $row->email,
                'hp' => $row->hp,
                'nama_projek' => $row->nama_projek,
                'nm_sales' => $row->nm_sales,
                'list' => $this->T_po_model->get_po($id),
            );
            $this->template->load('template', 't_po/t_po_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_po'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_po/create_action'),
            'id_po' => set_value('id_po'),
            'no_po' => set_value('no_po'),
            'id_distributor' => set_value('id_distributor'),
            'id_permintaan' => set_value('id_permintaan'),
            'total' => set_value('total'),
            'diskon' => set_value('diskon'),
            'ppn' => set_value('ppn'),
            'biaya_lain' => set_value('biaya_lain'),
            'grand_total' => set_value('grand_total'),
            'id_users' => set_value('id_users'),
            'create_by' => set_value('create_by'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_po/t_po_form', $data);
    }

    public function create_action()
    {
        $no_po = 'PO.' . date('ymdHis');
        $data = array(
            'no_po' => $no_po,
            'id_distributor' => $this->input->post('id_distributor', TRUE),
            'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
            'tgl_po' => $this->input->post('tgl_po', TRUE),
            // 'total' => $this->input->post('total', TRUE),
            // 'diskon' => $this->input->post('diskon', TRUE),
            // 'ppn' => $this->input->post('ppn', TRUE),
            // 'biaya_lain' => $this->input->post('biaya_lain', TRUE),
            // 'grand_total' => $this->input->post('grand_total', TRUE),
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );

        $this->T_po_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_po/read/' . $this->input->post('id_pelanggan')));
    }

    public function update($id)
    {
        $row = $this->T_po_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_po/update_action'),
                'id_po' => set_value('id_po', $row->id_po),
                'no_po' => set_value('no_po', $row->no_po),
                'id_distributor' => set_value('id_distributor', $row->id_distributor),
                'id_permintaan' => set_value('id_permintaan', $row->id_permintaan),
                'total' => set_value('total', $row->total),
                'diskon' => set_value('diskon', $row->diskon),
                'ppn' => set_value('ppn', $row->ppn),
                'biaya_lain' => set_value('biaya_lain', $row->biaya_lain),
                'grand_total' => set_value('grand_total', $row->grand_total),
                'id_users' => set_value('id_users', $row->id_users),
                'create_by' => set_value('create_by', $row->create_by),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_po/t_po_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_po'));
        }
    }

    public function update_action()
    {
        $data = array(
            'id_distributor' => $this->input->post('id_distributor', TRUE),
            'tgl_po' => $this->input->post('tgl_po', TRUE),
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );

        $this->T_po_model->update($this->input->post('id_po', TRUE), $data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
        redirect(site_url('t_po/read/' . $this->input->post('id_pelanggan')));
    }

    public function delete($id, $id_pelanggan)
    {
        $this->db->where('id_po', $id);
        $this->db->delete('t_po_detail');

        $this->db->where('id_po', $id);
        $this->db->delete('t_po');

        redirect(site_url('t_po/read/' . $id_pelanggan));
    }

    function tambah_barang()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_po' => $this->input->post('id_po'),
            'ro' => $this->T_po_model->get_permintaan($this->input->post('id_pelanggan')),
        );
        $this->load->view('t_po/modal_tambah', $data);
    }

    function fetch_barang()
    {
        $row = $this->T_po_model->get_barang($this->input->post('id_permintaan'));
        $data = array(
            'id_po' => $row->id_permintaan,
            'no_ro' => $row->no_ro,
            'id_barang' => $row->id_barang,
            'barang' => $row->barang,
            'qty' => $row->qty,
        );
        echo json_encode($data);
    }

    function input_barang()
    {
        $data = array(
            'id_po' => $this->input->post('id_po'),
            'id_permintaan' => $this->input->post('id_permintaan'),
            'id_barang' => $this->input->post('id_barang'),
            'nm_barang' => $this->input->post('nm_barang'),
            'qty' => $this->input->post('qty'),
            'harga_satuan' => str_replace('.', '', $this->input->post('harga_satuan')),
            'harga_total' => str_replace('.', '', $this->input->post('harga_total')),
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('t_po_detail', $data);
        redirect(site_url('t_po/read/' . $this->input->post('id_pelanggan')));
    }

    function bayar_po()
    {
        $row = $this->T_po_model->get_po_total($this->input->post('id_po'));
        $row2 = $this->T_po_model->get_po_id($this->input->post('id_po'));
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_po' => $this->input->post('id_po'),
            'id_dana' => $row2->id_dana,
            'jumlah' => $row->total,
            'diskon' => $row2->diskon,
            'ppn' => $row2->ppn,
            'grand_total' => $row2->grand_total,
        );
        $this->load->view('t_po/modal_bayar', $data);
    }

    function bayar()
    {
        $data = array(
            'id_dana' => $this->input->post('id_dana'),
            'total' => str_replace('.', '', $this->input->post('total')),
            'diskon' => str_replace('.', '', $this->input->post('diskon')),
            'ppn' => str_replace('.', '', $this->input->post('ppn')),
            'grand_total' => str_replace('.', '', $this->input->post('grand_total')),
            'status' => '2',
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_po', $this->input->post('id_po'));
        $this->db->update('t_po', $data);
        redirect(site_url('t_po/read/' . $this->input->post('id_pelanggan')));
    }


    function verif($id_pelanggan, $id_po, $status)
    {
        $data = array(
            'status' => $status,
        );
        $this->db->where('id_po', $id_po);
        $this->db->update('t_po', $data);
        redirect(site_url('t_po/read/' . $id_pelanggan));
    }

    function get_file()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_po' => $this->input->post('id_po'),
            'list' => $this->T_po_model->get_file($this->input->post('id_po')),
        );
        $this->load->view('t_po/modal_file', $data);
    }

    public function create_file()
    {
        if (isset($_FILES["gambar"]["name"])) {
            $config['upload_path'] = './assets/rab/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/rab/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                // $config['maintain_ratio'] = TRUE;
                // $config['quality'] = '60%';
                // $config['width'] = 800;
                // $config['height'] = 800;
                $config['new_image'] = './assets/rab/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image = $data['file_name'];
            }
        }
        $data = array(
            'id_po' => $this->input->post('id_po', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'file' => $image,
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('t_po_file', $data);
        redirect(site_url('t_po/read/' . $this->input->post('id_pelanggan')));
    }

    public function delete_file($id, $id_pelanggan)
    {
        $this->T_po_model->delete_file($id);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
        redirect(site_url('T_po/read/' . $id_pelanggan));
    }

    public function ajax_list()
    {
        $list = $this->T_po_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $res->nama;
            $row[] = $res->alamat;
            $row[] = $res->nama_projek;
            $row[] = $res->nm_sales;
            $row[] = $res->total;
            $row[] = '<a href="' . site_url('T_po/read/' . $res->id_pelanggan) . '" class="btn btn-primary btn-xs"><i class="fal fa-eye" aria-hidden="true"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->T_po_model->count_all(),
            "recordsFiltered" => $this->T_po_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}

/* End of file T_po.php */
/* Location: ./application/controllers/T_po.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-17 17:06:44 */
/* http://harviacode.com */