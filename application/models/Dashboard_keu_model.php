<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_keu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_ttl_bln()
    {
        $tahun = date('Y');
        $this->db->select('nm_bln,debit,kredit');
        $this->db->where('tahun', $tahun);
        //$this->db->group_by('YEAR(created_date)');
        //$this->db->group_by('MONTH(created_date)');
        $this->db->order_by('bln', 'ASC');
        $query = $this->db->get('v_laporan_laba');
        return $query->result();
    }
    function get_ttl_tahun()
    {
        $tahun = date('Y');
        $this->db->select('SUM(debit) as debit, SUM(kredit) as kredit');
        $this->db->where('tahun', $tahun);
        $query = $this->db->get('v_laporan_laba');
        return $query->result();
    }
    function get_laba_bln()
    {
        $tahun = date('Y');
        $this->db->select('nm_bln,SUM(kredit)-SUM(debit) as laba');
        $this->db->where('tahun', $tahun);
        $this->db->group_by('bln');
        $this->db->order_by('bln', 'ASC');
        $query = $this->db->get('v_laporan_laba');
        return $query->result();
    }
}
