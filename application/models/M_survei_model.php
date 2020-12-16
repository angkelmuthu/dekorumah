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
        return $this->db->get('t_pesanan')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('v_survei')->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_survei', $q);
        $this->db->or_like('tgl_survei', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('hp', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('nm_sales', $q);
        $this->db->from('v_survei');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_survei', $q);
        $this->db->or_like('tgl_survei', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('nm_sales', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('v_survei')->result();
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

/* End of file M_survei_model.php */
/* Location: ./application/models/M_survei_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 09:28:39 */
/* http://harviacode.com */
