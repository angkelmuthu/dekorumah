<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_penjualan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 't_penjualan/t_penjualan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_penjualan_model->json();
    }

    public function read($id)
    {
        $row = $this->T_penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pelanggan' => $row->id_pelanggan,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'email' => $row->email,
                'hp' => $row->hp,
                'nama_projek' => $row->nama_projek,
                'nm_sales' => $row->nm_sales,
                'list' => $this->T_penjualan_model->get_penjualan($id),
            );
            $this->template->load('template', 't_penjualan/t_penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_penjualan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_penjualan/create_action'),
            'id_order' => set_value('id_order'),
            'no_order' => set_value('no_order'),
            'id_pelanggan' => set_value('id_pelanggan'),
            'id_produk' => set_value('id_produk'),
            'id_satuan' => set_value('id_satuan'),
            'qty' => set_value('qty'),
            'harga_satuan' => set_value('harga_satuan'),
            'harga_total' => set_value('harga_total'),
            'deskripsi' => set_value('deskripsi'),
            'create_by' => set_value('create_by'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_penjualan/t_penjualan_form', $data);
    }

    public function create_action()
    {
        $this->db->where('YEAR(create_date)', date('Y'));
        $this->db->where('MONTH(create_date)', date('m'));
        $this->db->order_by('no_order', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('t_penjualan');
        $last = $query->row();
        $num = $query->num_rows();
        if ($num > 0) {
            $gen1 = substr($last->no_order, -4) + 1;
        } else {
            $gen1 = 1;
        }
        $gen2 = str_pad($gen1, 4, "0", STR_PAD_LEFT);
        $no_order = date('y') . '.' . date('m') . '.' . $gen2;
        $data = array(
            'id_order' => $this->input->post('id_order', TRUE),
            'no_order' => $no_order,
            'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
            'id_produk' => $this->input->post('id_produk', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'qty' => $this->input->post('qty', TRUE),
            'harga_satuan' => str_replace('.', '', $this->input->post('harga_satuan', TRUE)),
            'harga_total' => str_replace('.', '', $this->input->post('harga_total', TRUE)),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );
        $this->T_penjualan_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_penjualan/read/' . $this->input->post('id_pelanggan')));
    }

    public function update($id)
    {
        $row = $this->T_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_penjualan/update_action'),
                'id_order' => set_value('id_order', $row->id_order),
                'no_order' => set_value('no_order', $row->no_order),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'id_satuan' => set_value('id_satuan', $row->id_satuan),
                'qty' => set_value('qty', $row->qty),
                'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
                'harga_total' => set_value('harga_total', $row->harga_total),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'create_by' => set_value('create_by', $row->create_by),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_penjualan/t_penjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_penjualan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'id_order' => $this->input->post('id_order', TRUE),
                'no_order' => $this->input->post('no_order', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'id_satuan' => $this->input->post('id_satuan', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'harga_satuan' => $this->input->post('harga_satuan', TRUE),
                'harga_total' => $this->input->post('harga_total', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'create_by' => $this->input->post('create_by', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
            );

            $this->T_penjualan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_penjualan'));
        }
    }

    public function delete($id, $id_pelanggan)
    {
        $this->T_penjualan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
        redirect(site_url('T_penjualan/read/' . $id_pelanggan));
    }

    public function create_rab()
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
            'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'file' => $image,
            'id_users' => $this->session->userdata('id_users'),
            'create_by' => $this->session->userdata('full_name'),
            'create_date' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('t_rab', $data);
        redirect(site_url('t_penjualan/read/' . $this->input->post('id_pelanggan')));
    }

    public function delete_rab($id, $id_pelanggan)
    {
        $this->T_penjualan_model->delete_rab($id);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
        redirect(site_url('T_penjualan/read/' . $id_pelanggan));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_order', 'id order', 'trim|required');
        $this->form_validation->set_rules('no_order', 'no order', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
        $this->form_validation->set_rules('qty', 'qty', 'trim|required');
        $this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
        $this->form_validation->set_rules('harga_total', 'harga total', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('create_by', 'create by', 'trim|required');
        $this->form_validation->set_rules('create_date', 'create date', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function ajax_list()
    {
        $list = $this->T_penjualan_model->get_datatables();
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
            $row[] = angka($res->total);
            $row[] = '<a href="' . site_url('T_penjualan/read/' . $res->id_pelanggan) . '" class="btn btn-primary btn-xs"><i class="fal fa-eye" aria-hidden="true"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->T_penjualan_model->count_all(),
            "recordsFiltered" => $this->T_penjualan_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}

/* End of file T_penjualan.php */
/* Location: ./application/controllers/T_penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-11 11:40:30 */
/* http://harviacode.com */