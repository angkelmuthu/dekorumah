<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_team extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_team_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 'web_team/web_team_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Web_team_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_team_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'foto' => $row->foto,
                'job' => $row->job,
                'fb' => $row->fb,
                'ig' => $row->ig,
                'twitter' => $row->twitter,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'web_team/web_team_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_team'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_team/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'foto' => set_value('foto'),
            'job' => set_value('job'),
            'fb' => set_value('fb'),
            'ig' => set_value('ig'),
            'twitter' => set_value('twitter'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'web_team/web_team_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (isset($_FILES["foto"]["name"])) {
                $config['upload_path'] = './web/assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
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
                'nama' => $this->input->post('nama', TRUE),
                'foto' => $image,
                'job' => $this->input->post('job', TRUE),
                'fb' => $this->input->post('fb', TRUE),
                'ig' => $this->input->post('ig', TRUE),
                'twitter' => $this->input->post('twitter', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->Web_team_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_team'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_team_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_team/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'foto' => set_value('foto', $row->foto),
                'job' => set_value('job', $row->job),
                'fb' => set_value('fb', $row->fb),
                'ig' => set_value('ig', $row->ig),
                'twitter' => set_value('twitter', $row->twitter),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'web_team/web_team_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_team'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (isset($_FILES["foto"]["name"])) {
                $config['upload_path'] = './web/assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
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
                'nama' => $this->input->post('nama', TRUE),
                'foto' => $image,
                'job' => $this->input->post('job', TRUE),
                'fb' => $this->input->post('fb', TRUE),
                'ig' => $this->input->post('ig', TRUE),
                'twitter' => $this->input->post('twitter', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->Web_team_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_team'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_team_model->get_by_id($id);

        if ($row) {
            $this->Web_team_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_team'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_team'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        //$this->form_validation->set_rules('foto', 'foto', 'trim|required');
        $this->form_validation->set_rules('job', 'job', 'trim|required');
        $this->form_validation->set_rules('fb', 'fb', 'trim|required');
        $this->form_validation->set_rules('ig', 'ig', 'trim|required');
        $this->form_validation->set_rules('twitter', 'twitter', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Web_team.php */
/* Location: ./application/controllers/Web_team.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:47:35 */
/* http://harviacode.com */