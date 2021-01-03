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
        $this->db->select('MONTHNAME( created_date ) as bln,
        SUM(CASE
            WHEN id_group = 1
            THEN total
            ELSE 0
        END) AS debit,
        SUM(CASE
            WHEN id_group = 2
            THEN total
            ELSE 0
        END) AS kredit');
        $this->db->where('YEAR(created_date)', $tahun);
        $this->db->group_by('YEAR(created_date)');
        $this->db->group_by('MONTH(created_date)');
        $this->db->order_by('MONTH(created_date)', 'ASC');
        $query = $this->db->get('t_pembukuan');
        return $query->result();
    }
    function get_ttl_tahun()
    {
        $tahun = date('Y');
        $this->db->select('SUM(CASE
            WHEN id_group = 1
            THEN total
            ELSE 0
        END) AS debit,
        SUM(CASE
            WHEN id_group = 2
            THEN total
            ELSE 0
        END) AS kredit');
        $this->db->where('YEAR(created_date)', $tahun);
        $this->db->group_by('YEAR(created_date)');
        $query = $this->db->get('t_pembukuan');
        return $query->result();
    }
}
