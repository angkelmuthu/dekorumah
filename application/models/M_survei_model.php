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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('v_survei')->row();
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

    function fetch_barang()
    {
        $this->db->where('aktif', 'Y');
        $this->db->order_by('nm_barang', 'ASC');
        $query = $this->db->get("m_barang");
        return $query->result();
    }
    function fetch_barang_sub($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->group_by('id_barang_sub');
        $this->db->order_by('nm_barang_sub', 'ASC');
        $query = $this->db->get('m_barang_sub');
        $output = '<option value="">Select Sub Barang</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_barang_sub . '">' . $row->nm_barang_sub . '</option>';
        }
        return $output;
    }
    function fetch_barang_detail($id_barang, $id_barang_sub)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->where('id_barang_sub', $id_barang_sub);
        $this->db->group_by('id_barang_detail');
        $this->db->order_by('nm_barang_detail', 'ASC');
        $query = $this->db->get('v_barang');
        $output = '<option value="">Select barang_detail</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_barang_detail . '">' . $row->nm_barang_detail . '</option>';
        }
        return $output;
    }
    function fetch_barang_harga($id_barang_detail)
    {
        $this->db->where('id_barang_detail', $id_barang_detail);
        $query = $this->db->get('v_barang');
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
