<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_services extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_services_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'web_services/web_services_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Web_services_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_services_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'services_icon' => $row->services_icon,
                'services_title' => $row->services_title,
                'services_desk' => $row->services_desk,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'web_services/web_services_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_services'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_services/create_action'),
            'id' => set_value('id'),
            'services_icon' => set_value('services_icon'),
            'services_title' => set_value('services_title'),
            'services_desk' => set_value('services_desk'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'web_services/web_services_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'services_icon' => $this->input->post('services_icon', TRUE),
                'services_title' => $this->input->post('services_title', TRUE),
                'services_desk' => $this->input->post('services_desk', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->Web_services_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_service/read/1'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_services_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_services/update_action'),
                'id' => set_value('id', $row->id),
                'services_icon' => set_value('services_icon', $row->services_icon),
                'services_title' => set_value('services_title', $row->services_title),
                'services_desk' => set_value('services_desk', $row->services_desk),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'web_services/web_services_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_service/read/1'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'services_icon' => $this->input->post('services_icon', TRUE),
                'services_title' => $this->input->post('services_title', TRUE),
                'services_desk' => $this->input->post('services_desk', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->Web_services_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_service/read/1'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_services_model->get_by_id($id);

        if ($row) {
            $this->Web_services_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_services'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_service/read/1'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('services_icon', 'services icon', 'trim|required');
        $this->form_validation->set_rules('services_title', 'services title', 'trim|required');
        $this->form_validation->set_rules('services_desk', 'services desk', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Web_services.php */
/* Location: ./application/controllers/Web_services.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:47:12 */
/* http://harviacode.com */