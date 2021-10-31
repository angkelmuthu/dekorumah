<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pesanan_model extends CI_Model
{

    public $table = 't_pesanan';
    public $id = 'id_pesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_pesanan,id_invoice,id_produk,id_produk_sub,qty,panjang,lebar,tinggi,id_satuan,harga,total,note,created_date,users');
        $this->datatables->from('t_pesanan');
        //add this line for join
        //$this->datatables->join('table2', 't_pesanan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t_pesanan/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_pesanan/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_pesanan/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pesanan');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_pesanan', $q);
        $this->db->or_like('id_invoice', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('id_produk_sub', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('panjang', $q);
        $this->db->or_like('lebar', $q);
        $this->db->or_like('tinggi', $q);
        $this->db->or_like('id_satuan', $q);
        $this->db->or_like('harga', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('users', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pesanan', $q);
        $this->db->or_like('id_invoice', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('id_produk_sub', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('panjang', $q);
        $this->db->or_like('lebar', $q);
        $this->db->or_like('tinggi', $q);
        $this->db->or_like('id_satuan', $q);
        $this->db->or_like('harga', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('users', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function insert_detail($datax)
    {
        $this->db->insert('t_pesanan_detail', $datax);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function fetch_paket($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('m_produk_paket');
        foreach ($query->result() as $row) {
            $hasil[] = array(
                'id_paket' => $row->id_paket,
                'nm_paket' => $row->nm_paket,
                'deskripsi' => $row->deskripsi,
                'harga' => $row->harga,
            );
        }
        return $hasil;
    }

    function fetch_paket_harga($id_paket)
    {
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get('m_produk_paket');
        foreach ($query->result() as $row) {
            $hasil = array(
                'id_kategori' => $row->id_kategori,
                'id_paket' => $row->id_paket,
                'harga' => $row->harga,
            );
        }
        return $hasil;
    }

    // function fetch_produk()
    // {
    //     $this->db->where('aktif', 'Y');
    //     $this->db->order_by('nm_produk', 'ASC');
    //     $query = $this->db->get("m_produk");
    //     return $query->result();
    // }
    // function fetch_produk_sub($id_produk)
    // {
    //     $this->db->where('id_produk', $id_produk);
    //     $this->db->group_by('id_produk_sub');
    //     $this->db->order_by('nm_produk_sub', 'ASC');
    //     $query = $this->db->get('m_produk_sub');
    //     $output = '<option value="">Select Sub produk</option>';
    //     foreach ($query->result() as $row) {
    //         $output .= '<option value="' . $row->id_produk_sub . '">' . $row->nm_produk_sub . '</option>';
    //     }
    //     return $output;
    // }
    // function fetch_produk_detail($id_produk, $id_produk_sub)
    // {
    //     $this->db->where('id_produk', $id_produk);
    //     $this->db->where('id_produk_sub', $id_produk_sub);
    //     $this->db->group_by('id_produk_detail');
    //     $this->db->order_by('nm_produk_detail', 'ASC');
    //     $query = $this->db->get('v_produk');
    //     $output = '<option value="">Select produk_detail</option>';
    //     foreach ($query->result() as $row) {
    //         $output .= '<option value="' . $row->id_produk_detail . '">' . $row->nm_produk_detail . '</option>';
    //     }
    //     return $output;
    // }
    // function fetch_produk_harga($id_produk_sub)
    // {
    //     $this->db->where('id_produk_sub', $id_produk_sub);
    //     $query = $this->db->get('m_produk_sub');
    //     foreach ($query->result() as $row) {
    //         $hasil = array(
    //             'harga' => $row->harga,
    //         );
    //     }
    //     return $hasil;
    // }
}

/* End of file T_pesanan_model.php */
/* Location: ./application/models/T_pesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-07 16:19:36 */
/* http://harviacode.com */