<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pembayaran_model extends CI_Model
{

    public $table = 't_pembayaran';
    public $id = 'id_pembayaran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $column_order = array(null, 'a.create_date', 'a.no_bayar', 'b.nama_projek', 'a.title', 'a.total', 'a.keterangan');
    var $column_search = array('a.create_date', 'a.no_bayar', 'b.nama_projek', 'a.title', 'a.total', 'a.keterangan');
    var $order_by = array('a.create_date' => 'DESC');

    function get_pembayaran($id)
    {
        $this->db->select("a.*,b.nama_projek");
        $this->db->from("t_pembayaran a");
        $this->db->join("m_pelanggan b", "a.id_pelanggan=b.id_pelanggan", "LEFT");
        $this->db->where('a.id_bayar', $id);
        return $this->db->get($this->table)->row();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id_bayar', $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    ///////////////////////////////////////////////////////////////////////////
    private function _get()
    {
        $this->db->select("a.*,b.nama_projek");
        $this->db->from("t_pembayaran a");
        $this->db->join("m_pelanggan b", "a.id_pelanggan=b.id_pelanggan", "LEFT");

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    //$this->db->where('noreg', $noreg);
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_by = $this->order_by;
            $this->db->order_by(key($order_by), $order_by[key($order_by)]);
        }
    }

    function get_datatables()
    {
        $this->_get();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select("a.*,b.nama_projek");
        $this->db->from("t_pembayaran a");
        $this->db->join("m_pelanggan b", "a.id_pelanggan=b.id_pelanggan", "LEFT");
        return $this->db->count_all_results();
    }
}

/* End of file T_po_model.php */
/* Location: ./application/models/T_po_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-17 17:06:44 */
/* http://harviacode.com */