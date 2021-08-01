<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang_model extends CI_Model
{

    public $table = 'm_barang';
    public $id = 'id_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_barang,barang,deskripsi,id_barang_jenis,barang_jenis,harga_satuan,stok,id_user,full_name,update_date');
        $this->datatables->from('v_barang');
        //add this line for join
        //$this->datatables->join('m_barang_jenis', 'm_barang.id_barang_jenis = m_barang_jenis.id_barang_jenis');
        $this->datatables->add_column('action', anchor(site_url('m_barang/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs waves-effect waves-themed')) . "
            " . anchor(site_url('m_barang/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-xs waves-effect waves-themed')) . "
                " . anchor(site_url('m_barang/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-xs waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_barang');
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
        $this->db->like('id_barang', $q);
        $this->db->or_like('barang', $q);
        $this->db->or_like('deskripsi', $q);
        $this->db->or_like('id_barang_jenis', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('stok', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('update_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_barang', $q);
        $this->db->or_like('barang', $q);
        $this->db->or_like('deskripsi', $q);
        $this->db->or_like('id_barang_jenis', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('stok', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('update_date', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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
}

/* End of file M_barang_model.php */
/* Location: ./application/models/M_barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 15:32:03 */
/* http://harviacode.com */