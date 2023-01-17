<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_penjualan_model extends CI_Model
{

    public $table = 't_penjualan';
    public $id = 'id_order';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $column_order = array(null, 'id_pelanggan', 'nama', 'alamat', 'nama_projek', 'nm_sales', 'total');
    var $column_search = array('nama', 'nama_projek', 'nm_sales');
    var $order_by = array('id_pelanggan' => 'DESC');

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->get('v_pelanggan')->row();
    }

    function get_penjualan($id)
    {
        $this->db->select('a.*,b.nm_produk,c.satuan');
        $this->db->from('t_penjualan a');
        $this->db->join('m_produk b', 'a.id_produk=b.id_produk', 'left');
        $this->db->join('m_satuan c', 'a.id_satuan=c.id_satuan', 'left');
        $this->db->order_by('a.id_order', 'ASC');
        $this->db->where('a.id_pelanggan', $id);
        return $this->db->get()->result();
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

    function delete_rab($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete('t_rab');
    }

    ///////////////////////////////////////////////////////////////////////////
    private function _get()
    {
        $this->db->from("v_penjualan");

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
        $this->db->from("v_penjualan");
        return $this->db->count_all_results();
    }
}

/* End of file T_penjualan_model.php */
/* Location: ./application/models/T_penjualan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-11 11:40:30 */
/* http://harviacode.com */