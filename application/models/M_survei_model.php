<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_survei_model extends CI_Model
{

    public $table = 'm_survei';
    public $id = 'id_survei';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get('v_survei')->result();
    }

    // get pesanan
    function get_pesanan($id_survei)
    {
        $this->db->where('id_survei', $id_survei);
        return $this->db->get('v_pesanan')->result();
    }

    // get pesanan
    function get_pesanan_group($id_survei)
    {
        $this->db->select('*,count(id_pesanan) as qty, sum(total) as ttl');
        $this->db->where('id_invoice', $id_survei);
        $this->db->group_by('id_kategori');
        return $this->db->get('v_pesanan')->result();
    }

    function get_bayar($id_invoice, $id_group_sub, $total)
    {
        //$this->db->select('*,count(id_pesanan) as qty, sum(total) as ttl');
        //$this->db->where('id_buku', $id_buku);
        $this->db->where('id_group_sub', $id_group_sub);
        $this->db->where('id_survei', $id_invoice);
        $this->db->where('total', $total);
        return $this->db->get('v_pembukuan_new')->row();
    }

    function get_note()
    {
        return $this->db->get('m_desk')->row();
    }


    function get_bayar_ttl($id_invoice, $id_group_sub)
    {
        $this->db->select('*,sum(total) as ttl');
        if ($id_group_sub == 3) {
            $this->db->where_in('id_group_sub', ['1', '2', '3']);
        } elseif ($id_group_sub == 2) {
            $this->db->where_in('id_group_sub', ['1', '2']);
        } else {
            $this->db->where('id_group_sub', $id_group_sub);
        }
        $this->db->group_by('id_survei');
        $this->db->where('id_survei', $id_invoice);
        return $this->db->get('v_pembukuan_new')->row();
    }


    function get_pesanan_group_ttl($id_survei)
    {
        $this->db->select('sum(total) as ttl');
        $this->db->where('id_invoice', $id_survei);
        return $this->db->get('v_pesanan')->row();
    }
    // get pesanan
    function get_invoice($id_survei)
    {
        $this->db->where('id', $id_survei);
        return $this->db->get('v_invoice')->row();
    }

    function get_gambar($id)
    {
        $this->db->where('id_file', $id);
        return $this->db->get('t_file')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('v_survei')->row();
    }

    function get_by_id_pesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        return $this->db->get('t_pesanan')->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->where('no_pesanan IS NULL');
        $this->db->group_start();
        $this->db->like('id_survei', $q);
        $this->db->or_like('tgl_survei', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('hp', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('nm_sales', $q);
        $this->db->group_end();
        $this->db->from('v_survei');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->where('no_pesanan IS NULL');
        $this->db->group_start();
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_survei', $q);
        $this->db->or_like('tgl_survei', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('nm_sales', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get('v_survei')->result();
    }

    /////pesanan///////////
    // get total rows
    function total_rows2($q = NULL)
    {
        $this->db->where('no_pesanan IS NOT NULL');
        $this->db->group_start();
        $this->db->like('id_survei', $q);
        $this->db->or_like('tgl_survei', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('hp', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('nm_sales', $q);
        $this->db->group_end();
        $this->db->from('v_survei');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data2($limit, $start = 0, $q = NULL)
    {
        $this->db->where('no_pesanan IS NOT NULL');
        $this->db->group_start();
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_survei', $q);
        $this->db->or_like('tgl_survei', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('nm_sales', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get('v_survei')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function insert_pesanan($data)
    {
        $this->db->insert('t_pesanan', $data);
    }
    function insert_debit($data)
    {
        $this->db->insert('t_pembukuan', $data);
    }
    function insert_kredit($data)
    {
        $this->db->insert('t_pembukuan', $data);
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

    function delete_pesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->delete('t_pesanan');
    }
    function delete_gambar($id)
    {
        $this->db->where('id_file', $id);
        $this->db->delete('t_file');
    }

    function fetch_produk()
    {
        $this->db->where('aktif', 'Y');
        $this->db->order_by('nm_produk', 'ASC');
        $query = $this->db->get("m_produk");
        return $query->result();
    }
    function fetch_produk_sub($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->group_by('id_produk_sub');
        $this->db->order_by('nm_produk_sub', 'ASC');
        $query = $this->db->get('m_produk_sub');
        $output = '<option value="">Select Sub produk</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_produk_sub . '">' . $row->nm_produk_sub . '</option>';
        }
        return $output;
    }
    function fetch_produk_detail($id_produk, $id_produk_sub)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->where('id_produk_sub', $id_produk_sub);
        $this->db->group_by('id_produk_detail');
        $this->db->order_by('nm_produk_detail', 'ASC');
        $query = $this->db->get('v_produk');
        $output = '<option value="">Select produk_detail</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_produk_detail . '">' . $row->nm_produk_detail . '</option>';
        }
        return $output;
    }
    function fetch_produk_harga($id_produk_detail)
    {
        $this->db->where('id_produk_detail', $id_produk_detail);
        $query = $this->db->get('v_produk');
        foreach ($query->result() as $row) {
            $hasil = array(
                'harga' => $row->harga,
            );
        }
        return $hasil;
    }
    function upload_gambar($data)
    {
        $this->db->insert('t_file', $data);
    }
}

/* End of file M_survei_model.php */
/* Location: ./application/models/M_survei_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 09:28:39 */
/* http://harviacode.com */
