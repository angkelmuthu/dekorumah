<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_pembayaran_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'T_pembayaran/t_pembayaran_list');
    }

    public function ajax_list()
    {
        $list = $this->T_pembayaran_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $res->create_date;
            $row[] = $res->no_bayar;
            $row[] = $res->nama_projek;
            //$row[] = $res->nm_sales;
            $row[] = $res->total;
            $row[] = '<a href="' . site_url('t_pembayaran/read/') . '" class="btn btn-primary btn-xs"><i class="fal fa-eye" aria-hidden="true"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->T_pembayaran_model->count_all(),
            "recordsFiltered" => $this->T_pembayaran_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
