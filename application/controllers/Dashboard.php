<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dashboard_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Globalmodel', 'modeldb');
    }

    // public function index()
    // {
    //     // $data = $this->Dashboard_model->get_all_dash();
    //     // $dash = array(
    //     //     'k_dash' => $data,
    //     // );
    //     $this->template->load('template', 'dashboard');
    // }
    // public function master_rs($id)
    // {
    //     $row2 = $this->Dashboard_model->get_master_rs($id);
    //     $masterrs = array(
    //         'masterrs' => $row2,
    //     );
    //     $this->template->load('template', 'dash_detail', $masterrs);
    // }
    // public function detail($id)
    // {
    //     $row = $this->Dashboard_model->get_kunjungan_day_by($id);
    //     $kjngn_day = array(
    //         'kjngn_day' => $row,
    //     );
    //     $this->template->load('template', 'dash_detail', $kjngn_day);
    // }
    public function index()
    {
        $data_calendar = $this->modeldb->get_list('v_survei');
        $calendar = array();
        foreach ($data_calendar as $key => $val) {
            $calendar[] = array(
                'id_survei'  => intval($val->id_survei),
                'nama' => $val->nama,
                'email' => $val->email,
                'hp' => $val->hp,
                'alamat' => trim($val->alamat),
                'note' => trim($val->note),
                'start' => date_format(date_create($val->tgl_survei), "Y-m-d H:i:s"),
                'end'  => date_format(date_create($val->tgl_survei), "Y-m-d H:i:s"),
                'color' => $val->color,
                'nm_sales' => $val->nm_sales,
            );
        }

        $data = array();
        $data['get_data']   = json_encode($calendar);
        $this->template->load('template', 'dashboard', $data);
    }

    public function save()
    {
        $response = array();
        // $this->form_validation->set_rules();
        // if ($this->form_validation->run() == TRUE) {
        $param = $this->input->post();
        $id_survei = $param['id_survei'];
        unset($param['id_survei']);

        if ($id_survei == 0) {
            //$param['created_date']    = date('Y-m-d H:i:s');
            $insert = $this->modeldb->insert($this->table, $param);

            if ($insert > 0) {
                $response['status'] = TRUE;
                $response['notif'] = 'Success add calendar';
                $response['id']  = $insert;
            } else {
                $response['status'] = FALSE;
                $response['notif'] = 'Server wrong, please save again';
            }
        } else {
            $where   = ['id_survei'  => $id_survei];
            //$param['created_date']    = date('Y-m-d H:i:s');
            $update = $this->modeldb->update($this->table, $param, $where);

            if ($update > 0) {
                $response['status'] = TRUE;
                $response['notif'] = 'Success add calendar';
                $response['id_survei']  = $id_survei;
            } else {
                $response['status'] = FALSE;
                $response['notif'] = 'Server wrong, please save again';
            }
        }
        // } else {
        //     $response['status'] = FALSE;
        //     $response['notif'] = validation_errors();
        // }

        echo json_encode($response);
    }

    public function delete()
    {
        $response   = array();
        $id_survei  = $this->input->post('id_survei');
        if (!empty($id_survei)) {
            $where = ['id_survei' => $id_survei];
            $delete = $this->modeldb->delete($this->table, $where);

            if ($delete > 0) {
                $response['status'] = TRUE;
                $response['notif'] = 'Success delete calendar';
            } else {
                $response['status'] = FALSE;
                $response['notif'] = 'Server wrong, please save again';
            }
        } else {
            $response['status'] = FALSE;
            $response['notif'] = 'Data not found';
        }

        echo json_encode($response);
    }
}
