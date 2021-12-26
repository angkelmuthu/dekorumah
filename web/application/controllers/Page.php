<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Page_model');
    }

    function index()
    {
        $info = $this->Page_model->get_info();
        $benefit = $this->Page_model->get_benefit();
        $service = $this->Page_model->get_service();
        $video = $this->Page_model->get_video();
        $data = array(
            'id' => $info->id,
            'title' => $info->title,
            'tlpn' => $info->tlpn,
            'email' => $info->email,
            'fb' => $info->fb,
            'ig' => $info->ig,
            'banner' => $this->Page_model->get_banner(),
            'benefit_title' => $benefit->benefit_title,
            'benefit_deskripsi' => $benefit->benefit_deskripsi,
            'benefit_file' => $benefit->benefit_file,
            'benefit_icon_1' => $benefit->benefit_icon_1,
            'benefit_title_1' => $benefit->benefit_title_1,
            'benefit_desk_1' => $benefit->benefit_desk_1,
            'benefit_icon_2' => $benefit->benefit_icon_2,
            'benefit_title_2' => $benefit->benefit_title_2,
            'benefit_desk_2' => $benefit->benefit_desk_2,
            'benefit_icon_3' => $benefit->benefit_icon_3,
            'benefit_title_3' => $benefit->benefit_title_3,
            'benefit_desk_3' => $benefit->benefit_desk_3,
            'service_title' => $service->service_title,
            'service_desk' => $service->service_desk,
            'services' => $this->Page_model->get_services(),
            'testi' => $this->Page_model->get_testi(),
            'testix' => $this->Page_model->get_testi(),
            'video_cover' => $video->video_cover,
            'video_url' => $video->video_url,
            'produks' => $this->Page_model->get_produks(),
        );
        $this->load->view('home', $data);
    }
    function home()
    {
        $info = $this->Page_model->get_info();
        $benefit = $this->Page_model->get_benefit();
        $service = $this->Page_model->get_service();
        $video = $this->Page_model->get_video();
        $data = array(
            'id' => $info->id,
            'title' => $info->title,
            'tlpn' => $info->tlpn,
            'email' => $info->email,
            'fb' => $info->fb,
            'ig' => $info->ig,
            'banner' => $this->Page_model->get_banner(),
            'benefit_title' => $benefit->benefit_title,
            'benefit_deskripsi' => $benefit->benefit_deskripsi,
            'benefit_file' => $benefit->benefit_file,
            'benefit_icon_1' => $benefit->benefit_icon_1,
            'benefit_title_1' => $benefit->benefit_title_1,
            'benefit_desk_1' => $benefit->benefit_desk_1,
            'benefit_icon_2' => $benefit->benefit_icon_2,
            'benefit_title_2' => $benefit->benefit_title_2,
            'benefit_desk_2' => $benefit->benefit_desk_2,
            'benefit_icon_3' => $benefit->benefit_icon_3,
            'benefit_title_3' => $benefit->benefit_title_3,
            'benefit_desk_3' => $benefit->benefit_desk_3,
            'service_title' => $service->service_title,
            'service_desk' => $service->service_desk,
            'services' => $this->Page_model->get_services(),
            'testi' => $this->Page_model->get_testi(),
            'testix' => $this->Page_model->get_testi(),
            'video_cover' => $video->video_cover,
            'video_url' => $video->video_url,
            'produks' => $this->Page_model->get_produks(),
        );
        $this->load->view('home', $data);
    }
}
