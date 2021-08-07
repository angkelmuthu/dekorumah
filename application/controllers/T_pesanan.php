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
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_pesanan/t_pesanan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_pesanan_model->json();
    }

    public function read($id)
    {
        $row = $this->T_pesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pesanan' => $row->id_pesanan,
                'id_invoice' => $row->id_invoice,
                'id_produk' => $row->id_produk,
                'id_produk_sub' => $row->id_produk_sub,
                'qty' => $row->qty,
                'panjang' => $row->panjang,
                'lebar' => $row->lebar,
                'tinggi' => $row->tinggi,
                'id_satuan' => $row->id_satuan,
                'harga' => $row->harga,
                'total' => $row->total,
                'note' => $row->note,
                'created_date' => $row->created_date,
                'users' => $row->users,
            );
            $this->template->load('template', 't_pesanan/t_pesanan_read', $data);
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
            'id_invoice' => set_value('id_invoice'),
            'id_produk' => set_value('id_produk'),
            'id_produk_sub' => set_value('id_produk_sub'),
            'qty' => set_value('qty'),
            'panjang' => set_value('panjang'),
            'lebar' => set_value('lebar'),
            'tinggi' => set_value('tinggi'),
            'id_satuan' => set_value('id_satuan'),
            'harga' => set_value('harga'),
            'total' => set_value('total'),
            'note' => set_value('note'),
            'created_date' => set_value('created_date'),
            'users' => set_value('users'),
            'produk' => $this->T_pesanan_model->fetch_produk(),
        );
        $this->template->load('template', 't_pesanan/t_pesanan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_pesanan' => $this->input->post('id_pesanan', TRUE),
                'id_invoice' => $this->input->post('id_invoice', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'id_produk_sub' => $this->input->post('id_produk_sub', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'panjang' => $this->input->post('panjang', TRUE),
                'lebar' => $this->input->post('lebar', TRUE),
                'tinggi' => $this->input->post('tinggi', TRUE),
                'id_satuan' => $this->input->post('id_satuan', TRUE),
                'harga' => str_replace('.', '', $this->input->post('harga', TRUE)),
                'total' => str_replace('.', '', $this->input->post('total', TRUE)),
                'note' => $this->input->post('note', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'users' => $this->input->post('users', TRUE),
            );
            $produk_detail = $this->input->post('produk_detail');
            foreach ($produk_detail as $pr) {
                $datax = array(
                    'id_pesanan' => $this->input->post('id_pesanan'),
                    'id_produk_detail' => $pr
                );
                $this->db->insert('t_pesanan_detail', $datax);
            }
            $this->T_pesanan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_invoice/read/' . $this->input->post('id_invoice', TRUE)));
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
                'id_invoice' => set_value('id_invoice', $row->id_invoice),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'id_produk_sub' => set_value('id_produk_sub', $row->id_produk_sub),
                'qty' => set_value('qty', $row->qty),
                'panjang' => set_value('panjang', $row->panjang),
                'lebar' => set_value('lebar', $row->lebar),
                'tinggi' => set_value('tinggi', $row->tinggi),
                'id_satuan' => set_value('id_satuan', $row->id_satuan),
                'harga' => set_value('harga', $row->harga),
                'total' => set_value('total', $row->total),
                'note' => set_value('note', $row->note),
                'created_date' => set_value('created_date', $row->created_date),
                'users' => set_value('users', $row->users),
            );
            $this->template->load('template', 't_pesanan/t_pesanan_form', $data);
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
                'id_invoice' => $this->input->post('id_invoice', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'id_produk_sub' => $this->input->post('id_produk_sub', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'panjang' => $this->input->post('panjang', TRUE),
                'lebar' => $this->input->post('lebar', TRUE),
                'tinggi' => $this->input->post('tinggi', TRUE),
                'id_satuan' => $this->input->post('id_satuan', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'total' => $this->input->post('total', TRUE),
                'note' => $this->input->post('note', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'users' => $this->input->post('users', TRUE),
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

    function fetch_produk_sub()
    {
        if ($this->input->post('id_produk')) {
            echo $this->T_pesanan_model->fetch_produk_sub($this->input->post('id_produk'));
        }
    }
    function fetch_produk_detail()
    {
        if ($this->input->post('id_produk_sub')) {
            echo $this->T_pesanan_model->fetch_produk_detail($this->input->post('id_produk'), $this->input->post('id_produk_sub'));
        }
    }
    function fetch_produk_harga()
    {
        $id_produk_sub = $this->input->post('id_produk_sub');
        $data = $this->T_pesanan_model->fetch_produk_harga($id_produk_sub);
        echo json_encode($data);
    }


    public function _rules()
    {
        $this->form_validation->set_rules('id_invoice', 'id invoice', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('id_produk_sub', 'id produk sub', 'trim|required');
        //$this->form_validation->set_rules('qty', 'qty', 'trim|required');
        $this->form_validation->set_rules('panjang', 'panjang', 'trim|required');
        $this->form_validation->set_rules('lebar', 'lebar', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'tinggi', 'trim|required');
        $this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('users', 'users', 'trim|required');

        $this->form_validation->set_rules('id_pesanan', 'id_pesanan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_pesanan.php */
/* Location: ./application/controllers/T_pesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-07 16:19:36 */
/* http://harviacode.com */