<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
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

    public function projeks()
    {
        $jumlah_data = $this->Page_model->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'Page/projeks/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 8;
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $data['lists'] = $this->Page_model->data($config['per_page'], $from);
        $this->load->view('projeks', $data);
    }

    function projek($id_projek)
    {
        $data['projek'] = $this->Page_model->get_id_projek($id_projek);
        $data['projeks'] = $this->Page_model->get_id_projeks($id_projek);
        $this->load->view('projek', $data);
    }

    function about()
    {
        $info = $this->Page_model->get_info();
        $benefit = $this->Page_model->get_benefit();
        $service = $this->Page_model->get_service();
        $video = $this->Page_model->get_video();
        $about = $this->Page_model->get_about();
        $team = $this->Page_model->get_team();
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
            'about_title' => $about->about_title,
            'about_desk' => $about->about_desk,
            'about_client' => $about->about_client,
            'about_cabang' => $about->about_cabang,
            'about_award' => $about->about_award,
            'team' => $this->Page_model->get_team(),
        );
        $this->load->view('aboutus', $data);
    }

    function services()
    {
        $info = $this->Page_model->get_info();
        $service = $this->Page_model->get_service();
        $data = array(
            'id' => $info->id,
            'title' => $info->title,
            'tlpn' => $info->tlpn,
            'email' => $info->email,
            'fb' => $info->fb,
            'ig' => $info->ig,
            'service_title' => $service->service_title,
            'service_desk' => $service->service_desk,
            'services' => $this->Page_model->get_services(),
        );
        $this->load->view('services', $data);
    }

    function contact()
    {
        $data['contact'] = $this->Page_model->get_contact();
        $this->load->view('contact', $data);
    }
}
