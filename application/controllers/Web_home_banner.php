<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_home_banner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_home_banner_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 'web_home_banner/web_home_banner_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Web_home_banner_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_home_banner_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'title' => $row->title,
                'deskription' => $row->deskription,
                'file' => $row->file,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'web_home_banner/web_home_banner_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_home_banner'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_home_banner/create_action'),
            'id' => set_value('id'),
            'title' => set_value('title'),
            'deskription' => set_value('deskription'),
            'file' => set_value('file'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'web_home_banner/web_home_banner_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (isset($_FILES["file"]["name"])) {
                $config['upload_path'] = './web/assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file')) {
                    $this->upload->display_errors();
                    return FALSE;
                } else {
                    $data = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './web/assets/images/' . $data['file_name'];
                    $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = TRUE;
                    // $config['quality'] = '60%';
                    // $config['width'] = 800;
                    // $config['height'] = 800;
                    $config['new_image'] = './web/assets/images/' . $data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $data['file_name'];
                }
            }
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'deskription' => $this->input->post('deskription', TRUE),
                'file' => $image,
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->Web_home_banner_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_home_banner'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_home_banner_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_home_banner/update_action'),
                'id' => set_value('id', $row->id),
                'title' => set_value('title', $row->title),
                'deskription' => set_value('deskription', $row->deskription),
                'file' => set_value('file', $row->file),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'web_home_banner/web_home_banner_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_home_banner'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (isset($_FILES["file"]["name"])) {
                $config['upload_path'] = './web/assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file')) {
                    $this->upload->display_errors();
                    return FALSE;
                } else {
                    $data = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './web/assets/images/' . $data['file_name'];
                    $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = TRUE;
                    // $config['quality'] = '60%';
                    // $config['width'] = 800;
                    // $config['height'] = 800;
                    $config['new_image'] = './web/assets/images/' . $data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $data['file_name'];
                }
            }
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'deskription' => $this->input->post('deskription', TRUE),
                'file' => $image,
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->Web_home_banner_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_home_banner'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_home_banner_model->get_by_id($id);

        if ($row) {
            $this->Web_home_banner_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_home_banner'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_home_banner'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('deskription', 'deskription', 'trim|required');
        //$this->form_validation->set_rules('file', 'file', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Web_home_banner.php */
/* Location: ./application/controllers/Web_home_banner.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:40:39 */
/* http://harviacode.com */