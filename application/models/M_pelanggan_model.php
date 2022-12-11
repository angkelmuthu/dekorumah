<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pelanggan_model extends CI_Model
{

    public $table = 'm_pelanggan';
    public $id = 'id_pelanggan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $column_order = array(null, 'id_pelanggan', 'nama', 'alamat', 'email', 'hp', 'nama_projek', 'id_sales');
    var $column_search = array('id_pelanggan', 'nama', 'alamat', 'email', 'hp', 'nama_projek', 'id_sales');
    var $order_by = array('id_pelanggan' => 'DESC');

    // datatables
    function json()
    {
        $this->datatables->select('id_pelanggan,nama,alamat,email,hp,created_date,users');
        $this->datatables->from('m_pelanggan');
        //add this line for join
        //$this->datatables->join('table2', 'm_pelanggan.field = table2.field');
        if ($this->session->userdata('id_user_level') == 1) {
            $this->datatables->add_column('action', anchor(site_url('m_pelanggan/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('m_pelanggan/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('m_pelanggan/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pelanggan');
        } else {
            $this->datatables->add_column('action', anchor(site_url('m_pelanggan/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')), 'id_pelanggan');
        }
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
        $this->db->like('id_pelanggan', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('hp', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('users', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pelanggan', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('hp', $q);
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

    ///////////////////////////////////////////////////////////////////////////
    private function _get()
    {
        $this->db->from("v_pelanggan");

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
        $this->db->from("v_pelanggan");
        return $this->db->count_all_results();
    }
}

/* End of file M_pelanggan_model.php */
/* Location: ./application/models/M_pelanggan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-31 06:09:53 */
/* http://harviacode.com */