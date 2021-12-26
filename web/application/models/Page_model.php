<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // get data by id
    function get_info()
    {
        $this->db->where('id', '1');
        return $this->db->get('web_info')->row();
    }

    function get_banner()
    {
        $this->db->where('aktif', 'y');
        return $this->db->get('web_home_banner')->result();
    }

    function get_benefit()
    {
        return $this->db->get('web_benefit')->row();
    }

    function get_service()
    {
        return $this->db->get('web_service')->row();
    }

    function get_services()
    {
        $this->db->where('aktif', 'y');
        return $this->db->get('web_services')->result();
    }

    function get_video()
    {
        return $this->db->get('web_video')->row();
    }

    function get_testi()
    {
        $this->db->where('aktif', 'y');
        return $this->db->get('web_testimoni')->result();
    }

    function get_produks()
    {
        $this->db->where('aktif', 'Y');
        return $this->db->get('m_produk')->result();
    }

    function get_projeks()
    {
        $this->db->where('aktif', 'Y');
        return $this->db->get('web_projek')->result();
    }
}

/* End of file M_bahan_model.php */
/* Location: ./application/models/M_bahan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-18 13:09:36 */
/* http://harviacode.com */