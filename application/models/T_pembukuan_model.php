<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pembukuan_model extends CI_Model
{

    public $table = 't_pembukuan';
    public $id = 'id_buku';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->like('id_buku', $q);
        $this->db->or_like('id_survei', $q);
        $this->db->or_like('id_group', $q);
        $this->db->or_like('id_group_sub', $q);
        $this->db->or_like('deskripsi', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('harga', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('created_by', $q);
        $this->db->from('v_laporan_buku');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by('created_date', $this->order);
        $this->db->like('id_buku', $q);
        $this->db->or_like('id_survei', $q);
        $this->db->or_like('id_group', $q);
        $this->db->or_like('id_group_sub', $q);
        $this->db->or_like('deskripsi', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('harga', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('created_by', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('v_laporan_buku')->result();
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
    function get_saldo()
    {
        $this->db->select('SUM(kredit)-SUM(debit) as laba');
        $query = $this->db->get('v_laporan_laba');
        return $query->result();
    }
}

/* End of file T_pembukuan_model.php */
/* Location: ./application/models/T_pembukuan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-03 13:03:18 */
/* http://harviacode.com */
