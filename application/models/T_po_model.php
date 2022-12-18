<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_po_model extends CI_Model
{

    public $table = 't_po';
    public $id = 'id_po';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $column_order = array(null, 'id_pelanggan', 'nama', 'alamat', 'nama_projek', 'nm_sales', 'total');
    var $column_search = array('nama', 'nama_projek', 'nm_sales');
    var $order_by = array('id_pelanggan' => 'DESC');

    // datatables
    function json()
    {
        $this->datatables->select('id_po,no_po,id_distributor,id_permintaan,total,diskon,ppn,biaya_lain,grand_total,id_users,create_by,create_date');
        $this->datatables->from('t_po');
        //add this line for join
        //$this->datatables->join('table2', 't_po.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t_po/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_po/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_po/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_po');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->get('v_pelanggan')->row();
    }

    function get_permintaan($id)
    {
        $this->db->select('a.*,b.barang');
        $this->db->from('t_permintaan a');
        $this->db->join('m_barang b', 'a.id_barang=b.id_barang', 'left');
        $this->db->order_by('a.create_date', 'ASC');
        $this->db->where('a.id_pelanggan', $id);
        return $this->db->get()->result();
    }

    function get_po($id)
    {
        $this->db->select('a.*,b.nm_distributor');
        $this->db->from('t_po a');
        $this->db->join('m_distributor b', 'a.id_distributor=b.id_distributor', 'left');
        $this->db->order_by('a.create_date', 'ASC');
        $this->db->where('a.id_pelanggan', $id);
        return $this->db->get()->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_po', $q);
        $this->db->or_like('no_po', $q);
        $this->db->or_like('id_distributor', $q);
        $this->db->or_like('id_permintaan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('diskon', $q);
        $this->db->or_like('ppn', $q);
        $this->db->or_like('biaya_lain', $q);
        $this->db->or_like('grand_total', $q);
        $this->db->or_like('id_users', $q);
        $this->db->or_like('create_by', $q);
        $this->db->or_like('create_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_po', $q);
        $this->db->or_like('no_po', $q);
        $this->db->or_like('id_distributor', $q);
        $this->db->or_like('id_permintaan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('diskon', $q);
        $this->db->or_like('ppn', $q);
        $this->db->or_like('biaya_lain', $q);
        $this->db->or_like('grand_total', $q);
        $this->db->or_like('id_users', $q);
        $this->db->or_like('create_by', $q);
        $this->db->or_like('create_date', $q);
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
        $this->db->from("v_po");

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
        $this->db->from("v_po");
        return $this->db->count_all_results();
    }
}

/* End of file T_po_model.php */
/* Location: ./application/models/T_po_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-17 17:06:44 */
/* http://harviacode.com */