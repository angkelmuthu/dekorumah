<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public $table = 't_kunjungan';
    public $id = 'kdrs';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get status Pesanan
    function get_status()
    {
        $tahun = date('Y');
        $this->db->where('YEAR(tgl_survei)', $tahun);
        $this->db->where('id_status <', '5');
        $query = $this->db->get('v_survei');
        return $query->result();
    }
    function get_status_ttl()
    {
        $tahun = date('Y');
        $this->db->select('SUM(IF(id_status = 1, 1,0)) AS prospek, SUM(IF(id_status = 2, 1,0)) AS design, SUM(IF(id_status = 3, 1,0)) AS produksi, SUM(IF(id_status = 4, 1,0)) AS kirim, SUM(IF(id_status = 5, 1,0)) AS selesai');
        $this->db->where('YEAR(tgl_survei)', $tahun);
        $query = $this->db->get('v_survei');
        return $query->result();
    }
}
