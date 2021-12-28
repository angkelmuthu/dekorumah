<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_benefit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Web_benefit_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->template->load('template', 'web_benefit/web_benefit_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Web_benefit_model->json();
    }

    public function read($id)
    {
        $row = $this->Web_benefit_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'benefit_title' => $row->benefit_title,
                'benefit_deskripsi' => $row->benefit_deskripsi,
                'benefit_file' => $row->benefit_file,
                'benefit_icon_1' => $row->benefit_icon_1,
                'benefit_title_1' => $row->benefit_title_1,
                'benefit_desk_1' => $row->benefit_desk_1,
                'benefit_icon_2' => $row->benefit_icon_2,
                'benefit_title_2' => $row->benefit_title_2,
                'benefit_desk_2' => $row->benefit_desk_2,
                'benefit_icon_3' => $row->benefit_icon_3,
                'benefit_title_3' => $row->benefit_title_3,
                'benefit_desk_3' => $row->benefit_desk_3,
            );
            $this->template->load('template', 'web_benefit/web_benefit_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_benefit'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('web_benefit/create_action'),
            'id' => set_value('id'),
            'benefit_title' => set_value('benefit_title'),
            'benefit_deskripsi' => set_value('benefit_deskripsi'),
            'benefit_file' => set_value('benefit_file'),
            'benefit_icon_1' => set_value('benefit_icon_1'),
            'benefit_title_1' => set_value('benefit_title_1'),
            'benefit_desk_1' => set_value('benefit_desk_1'),
            'benefit_icon_2' => set_value('benefit_icon_2'),
            'benefit_title_2' => set_value('benefit_title_2'),
            'benefit_desk_2' => set_value('benefit_desk_2'),
            'benefit_icon_3' => set_value('benefit_icon_3'),
            'benefit_title_3' => set_value('benefit_title_3'),
            'benefit_desk_3' => set_value('benefit_desk_3'),
        );
        $this->template->load('template', 'web_benefit/web_benefit_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (isset($_FILES["benefit_file"]["name"])) {
                $config['upload_path'] = './web/assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('benefit_file')) {
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
                'benefit_title' => $this->input->post('benefit_title', TRUE),
                'benefit_deskripsi' => $this->input->post('benefit_deskripsi', TRUE),
                'benefit_file' => $image,
                'benefit_icon_1' => $this->input->post('benefit_icon_1', TRUE),
                'benefit_title_1' => $this->input->post('benefit_title_1', TRUE),
                'benefit_desk_1' => $this->input->post('benefit_desk_1', TRUE),
                'benefit_icon_2' => $this->input->post('benefit_icon_2', TRUE),
                'benefit_title_2' => $this->input->post('benefit_title_2', TRUE),
                'benefit_desk_2' => $this->input->post('benefit_desk_2', TRUE),
                'benefit_icon_3' => $this->input->post('benefit_icon_3', TRUE),
                'benefit_title_3' => $this->input->post('benefit_title_3', TRUE),
                'benefit_desk_3' => $this->input->post('benefit_desk_3', TRUE),
            );

            $this->Web_benefit_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('web_benefit'));
        }
    }

    public function update($id)
    {
        $row = $this->Web_benefit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('web_benefit/update_action'),
                'id' => set_value('id', $row->id),
                'benefit_title' => set_value('benefit_title', $row->benefit_title),
                'benefit_deskripsi' => set_value('benefit_deskripsi', $row->benefit_deskripsi),
                'benefit_file' => set_value('benefit_file', $row->benefit_file),
                'benefit_icon_1' => set_value('benefit_icon_1', $row->benefit_icon_1),
                'benefit_title_1' => set_value('benefit_title_1', $row->benefit_title_1),
                'benefit_desk_1' => set_value('benefit_desk_1', $row->benefit_desk_1),
                'benefit_icon_2' => set_value('benefit_icon_2', $row->benefit_icon_2),
                'benefit_title_2' => set_value('benefit_title_2', $row->benefit_title_2),
                'benefit_desk_2' => set_value('benefit_desk_2', $row->benefit_desk_2),
                'benefit_icon_3' => set_value('benefit_icon_3', $row->benefit_icon_3),
                'benefit_title_3' => set_value('benefit_title_3', $row->benefit_title_3),
                'benefit_desk_3' => set_value('benefit_desk_3', $row->benefit_desk_3),
            );
            $this->template->load('template', 'web_benefit/web_benefit_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_benefit'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (isset($_FILES["benefit_file"]["name"])) {
                $config['upload_path'] = './web/assets/images/';
                $config['allowed_types'] = 'jpg|png';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('benefit_file')) {
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
                'benefit_title' => $this->input->post('benefit_title', TRUE),
                'benefit_deskripsi' => $this->input->post('benefit_deskripsi', TRUE),
                'benefit_file' => $image,
                'benefit_icon_1' => $this->input->post('benefit_icon_1', TRUE),
                'benefit_title_1' => $this->input->post('benefit_title_1', TRUE),
                'benefit_desk_1' => $this->input->post('benefit_desk_1', TRUE),
                'benefit_icon_2' => $this->input->post('benefit_icon_2', TRUE),
                'benefit_title_2' => $this->input->post('benefit_title_2', TRUE),
                'benefit_desk_2' => $this->input->post('benefit_desk_2', TRUE),
                'benefit_icon_3' => $this->input->post('benefit_icon_3', TRUE),
                'benefit_title_3' => $this->input->post('benefit_title_3', TRUE),
                'benefit_desk_3' => $this->input->post('benefit_desk_3', TRUE),
            );

            $this->Web_benefit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('web_benefit'));
        }
    }

    public function delete($id)
    {
        $row = $this->Web_benefit_model->get_by_id($id);

        if ($row) {
            $this->Web_benefit_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('web_benefit'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('web_benefit'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('benefit_title', 'benefit title', 'trim|required');
        $this->form_validation->set_rules('benefit_deskripsi', 'benefit deskripsi', 'trim|required');
        //$this->form_validation->set_rules('benefit_file', 'benefit file', 'trim|required');
        $this->form_validation->set_rules('benefit_icon_1', 'benefit icon 1', 'trim|required');
        $this->form_validation->set_rules('benefit_title_1', 'benefit title 1', 'trim|required');
        $this->form_validation->set_rules('benefit_desk_1', 'benefit desk 1', 'trim|required');
        $this->form_validation->set_rules('benefit_icon_2', 'benefit icon 2', 'trim|required');
        $this->form_validation->set_rules('benefit_title_2', 'benefit title 2', 'trim|required');
        $this->form_validation->set_rules('benefit_desk_2', 'benefit desk 2', 'trim|required');
        $this->form_validation->set_rules('benefit_icon_3', 'benefit icon 3', 'trim|required');
        $this->form_validation->set_rules('benefit_title_3', 'benefit title 3', 'trim|required');
        $this->form_validation->set_rules('benefit_desk_3', 'benefit desk 3', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Web_benefit.php */
/* Location: ./application/controllers/Web_benefit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-28 08:35:30 */
/* http://harviacode.com */