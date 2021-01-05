<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_keu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dashboard_keu_model');
    }
    public function index()
    {
        $data = array();
        $data['ttl_bln']   = $this->Dashboard_keu_model->get_ttl_bln();
        $data['ttl_tahun']   = $this->Dashboard_keu_model->get_ttl_tahun();
        $data['laba_bln']   = $this->Dashboard_keu_model->get_laba_bln();
        $this->template->load('template', 'dashboard_keu', $data);
    }
}
