<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calendar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->table   = 'm_survei';
        $this->load->model('Globalmodel', 'modeldb');
    }

    public function index()
    {
        $data_calendar = $this->modeldb->get_list($this->table);
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
            );
        }

        $data = array();
        $data['get_data']   = json_encode($calendar);
        $this->template->load('template', 'calendar', $data);
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
