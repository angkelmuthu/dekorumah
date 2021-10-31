<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_survei extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_survei_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_survei/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_survei/index/';
            $config['first_url'] = base_url() . 'index.php/m_survei/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_survei_model->total_rows($q);
        $m_survei = $this->M_survei_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_survei_data' => $m_survei,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_survei/m_survei_list', $data);
    }

    public function pesanan()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_survei/pesanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_survei/pesanan/index/';
            $config['first_url'] = base_url() . 'index.php/m_survei/pesanan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_survei_model->total_rows2($q);
        $m_survei = $this->M_survei_model->get_limit_data2($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_survei_data' => $m_survei,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_survei/m_survei_deal', $data);
    }

    public function read($id)
    {
        $row = $this->M_survei_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_survei' => $row->id_survei,
                'tgl_survei' => $row->tgl_survei,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'email' => $row->email,
                'hp' => $row->hp,
                'note' => $row->note,
                'color' => $row->color,
                'created_date' => $row->created_date,
                'users' => $row->users,
                'id_status' => $row->id_status,
                'status' => $row->status,
                'nm_sales' => $row->nm_sales,
                'pesanan' => $this->M_survei_model->get_pesanan($id),
            );
            $this->template->load('template', 'm_survei/m_survei_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function create()
    {

        $data = array(
            'button' => 'Create',
            'action' => site_url('m_survei/create_action'),
            'id_survei' => set_value('id_survei'),
            'tgl_survei' => set_value('tgl_survei'),
            'nama' => set_value('nama'),
            'alamat' => set_value('alamat'),
            'email' => set_value('email'),
            'hp' => set_value('hp'),
            'note' => set_value('note'),
            'color' => set_value('color'),
            'created_date' => set_value('created_date'),
            'users' => set_value('users'),
            'id_status' => set_value('id_status'),
            'id_sales' => set_value('id_sales'),
        );
        $this->template->load('template', 'm_survei/m_survei_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tgl_survei' => $this->input->post('tgl_survei', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'note' => $this->input->post('note', TRUE),
                'color' => $this->input->post('color', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'users' => $this->input->post('users', TRUE),
                'id_sales' => $this->input->post('id_sales', TRUE),
                'id_status' => $this->input->post('id_status', TRUE),
            );

            $this->M_survei_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function update($id)
    {
        $row = $this->M_survei_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_survei/update_action'),
                'id_survei' => set_value('id_survei', $row->id_survei),
                'tgl_survei' => set_value('tgl_survei', $row->tgl_survei),
                'nama' => set_value('nama', $row->nama),
                'alamat' => set_value('alamat', $row->alamat),
                'email' => set_value('email', $row->email),
                'hp' => set_value('hp', $row->hp),
                'note' => set_value('note', $row->note),
                'color' => set_value('color', $row->color),
                'created_date' => set_value('created_date', $row->created_date),
                'users' => set_value('users', $row->users),
                'id_status' => set_value('id_status', $row->id_status),
                'id_sales' => set_value('id_sales', $row->id_sales),
            );
            $this->template->load('template', 'm_survei/m_survei_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_survei', TRUE));
        } else {
            $data = array(
                'tgl_survei' => $this->input->post('tgl_survei', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'note' => $this->input->post('note', TRUE),
                'color' => $this->input->post('color', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'users' => $this->input->post('users', TRUE),
                'id_sales' => $this->input->post('id_sales', TRUE),
                'id_status' => $this->input->post('id_status', TRUE),
            );

            $this->M_survei_model->update($this->input->post('id_survei', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_survei_model->get_by_id($id);

        if ($row) {
            $this->M_survei_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_survei'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_survei'));
        }
    }

    public function delete_pesanan($id_invoice, $id)
    {
        $row = $this->M_survei_model->get_by_id_pesanan($id);

        if ($row) {
            $this->M_survei_model->delete_pesanan($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_invoice/read/' . $id_invoice));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_invoice/read/' . $id_invoice));
        }
    }

    public function update_status($id, $status)
    {
        $data = array(
            'id_status' => $status,
        );

        $this->M_survei_model->update($id, $data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
        redirect(site_url('m_survei/read/' . $id));
    }
    ///////////////////////////////////pesanan////////////////////////////////////////////////
    public function create_pesanan()
    {
        //$data['unit'] = $this->M_survei_model->fetch_unit();
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_survei/create_pesanan_action'),
            'id_pesanan' => set_value('id_pesanan'),
            'no_pesanan' => set_value('no_pesanan'),
            'id_survei' => set_value('id_survei'),
            'id_unit' => set_value('id_unit'),
            'id_bahan' => set_value('id_bahan'),
            'id_produk' => set_value('id_produk'),
            'panjang' => set_value('panjang'),
            'lebar' => set_value('lebar'),
            'tinggi' => set_value('tinggi'),
            'qty' => set_value('qty'),
            'id_satuan' => set_value('id_satuan'),
            'harga' => set_value('harga'),
            'total' => set_value('total'),
            'note' => set_value('note'),
            'created_date' => set_value('created_date'),
            'users' => set_value('users'),
            'is_deleted' => set_value('is_deleted'),
            'produk' => $this->M_survei_model->fetch_produk(),
        );
        $this->template->load('template', 'm_survei/m_survei_pesanan', $data);
    }
    public function create_pesanan_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('id_survei', TRUE));
        // } else {
        $data = array(
            //'no_pesanan' => $this->input->post('no_pesanan', TRUE),
            'id_survei' => $this->input->post('id_survei', TRUE),
            'id_produk' => $this->input->post('id_produk', TRUE),
            'id_produk_sub' => $this->input->post('id_produk_sub', TRUE),
            'id_produk_detail' => $this->input->post('id_produk_detail', TRUE),
            'panjang' => $this->input->post('panjang', TRUE),
            'lebar' => $this->input->post('lebar', TRUE),
            'tinggi' => $this->input->post('tinggi', TRUE),
            'qty' => $this->input->post('qty', TRUE),
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'harga' => str_replace('.', '', $this->input->post('harga', TRUE)),
            'total' => str_replace('.', '', $this->input->post('total', TRUE)),
            'note' => $this->input->post('note', TRUE),
            'created_date' => $this->input->post('created_date', TRUE),
            'users' => $this->input->post('users', TRUE),
            'is_deleted' => $this->input->post('is_deleted', TRUE),
        );

        $this->M_survei_model->insert_pesanan($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Insert Record Success</strong></div>');
        redirect(site_url('t_invoice/read/' . $this->input->post('id_survei')));
        //}
    }
    function fetch_produk_sub()
    {
        if ($this->input->post('id_produk')) {
            echo $this->M_survei_model->fetch_produk_sub($this->input->post('id_produk'));
        }
    }
    function fetch_produk_detail()
    {
        if ($this->input->post('id_produk_sub')) {
            echo $this->M_survei_model->fetch_produk_detail($this->input->post('id_produk'), $this->input->post('id_produk_sub'));
        }
    }
    function fetch_produk_harga()
    {
        $id_produk_detail = $this->input->post('id_produk_detail');
        $data = $this->M_survei_model->fetch_produk_harga($id_produk_detail);
        echo json_encode($data);
    }
    function print_spk()
    {
        $this->template->load('template', 'm_survei/print_spk');
    }
    public function upload_gambar()
    {

        if (isset($_FILES["gambar"]["name"])) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'pdf';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                // $config['maintain_ratio'] = TRUE;
                // $config['quality'] = '60%';
                // $config['width'] = 800;
                // $config['height'] = 800;
                $config['new_image'] = './assets/gambar/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image = $data['file_name'];
            }
        }
        $data = array(
            'id_survei' => $this->input->post('id_survei', TRUE),
            'file' => $image,
            'note' => $this->input->post('note', TRUE),
            'created_by' => $this->session->userdata('full_name'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $this->M_survei_model->upload_gambar($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success</strong></div>');
        redirect(site_url('t_invoice/read/' . $this->input->post('id_survei')));
    }

    public function delete_gambar($id_invoice, $id)
    {
        $row = $this->M_survei_model->get_gambar($id);

        if ($row) {
            $this->M_survei_model->delete_gambar($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_invoice/read/' . $id_invoice));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_invoice/read/' . $id_invoice));
        }
    }

    public function create_debit()
    {
        $data = array(
            'id_survei' => $this->input->post('id_survei', TRUE),
            'id_group' => $this->input->post('id_group', TRUE),
            'id_group_sub' => $this->input->post('id_group_sub', TRUE),
            'total' => str_replace('.', '', $this->input->post('total', TRUE)),
            'note' => $this->input->post('note', TRUE),
            'created_by' => $this->session->userdata('full_name'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $this->M_survei_model->insert_debit($data);



        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Insert Record Success</strong></div>');
        redirect(site_url('t_invoice/read/' . $this->input->post('id_survei')));
        //}
    }

    public function sendMail($id_invoice, $id_buku)
    {
        $isi = "<html>
<body style='background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;'>
  <table style='max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;'>
    <thead>
      <tr>
        <th style='text-align:left;'><img style='max-width: 150px;' src='https://www.bachanatours.in/book/img/logo.png' alt='bachana tours'></th>
        <th style='text-align:right;font-weight:400;'>05th Apr, 2017</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style='height:35px;'></td>
      </tr>
      <tr>
        <td colspan='2' style='border: solid 1px #ddd; padding:10px 20px;'>
          <p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order status</span><b style='color:green;font-weight:normal;margin:0'>Success</b></p>
          <p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Transaction ID</span> abcd1234567890</p>
          <p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> Rs. 6000.00</p>
        </td>
      </tr>
      <tr>
        <td style='height:35px;'></td>
      </tr>
      <tr>
        <td style='width:50%;padding:20px;vertical-align:top'>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px'>Name</span> Palash Basak</p>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Email</span> palash@gmail.com</p>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Phone</span> +91-1234567890</p>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>ID No.</span> 2556-1259-9842</p>
        </td>
        <td style='width:50%;padding:20px;vertical-align:top'>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Address</span> Khudiram Pally, Malbazar, West Bengal, India, 735221</p>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Number of gusets</span> 2</p>
          <p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Duration of your vacation</span> 25/04/2017 to 28/04/2017 (3 Days)</p>
        </td>
      </tr>
      <tr>
        <td colspan='2' style='font-size:20px;padding:30px 15px 0 15px;'>Items</td>
      </tr>
      <tr>
        <td colspan='2' style='padding:15px;'>
          <p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'>
            <span style='display:block;font-size:13px;font-weight:normal;'>Homestay with fooding & lodging</span> Rs. 3500 <b style='font-size:12px;font-weight:300;'> /person/day</b>
          </p>
          <p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'><span style='display:block;font-size:13px;font-weight:normal;'>Pickup & Drop</span> Rs. 2000 <b style='font-size:12px;font-weight:300;'> /person/day</b></p>
          <p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'><span style='display:block;font-size:13px;font-weight:normal;'>Local site seeing with guide</span> Rs. 800 <b style='font-size:12px;font-weight:300;'> /person/day</b></p>
          <p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'><span style='display:block;font-size:13px;font-weight:normal;'>Tea tourism with guide</span> Rs. 500 <b style='font-size:12px;font-weight:300;'> /person/day</b></p>
          <p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'><span style='display:block;font-size:13px;font-weight:normal;'>River side camping with guide</span> Rs. 1500 <b style='font-size:12px;font-weight:300;'> /person/day</b></p>
          <p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'><span style='display:block;font-size:13px;font-weight:normal;'>Trackking and hiking with guide</span> Rs. 1000 <b style='font-size:12px;font-weight:300;'> /person/day</b></p>
        </td>
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan='2' style='font-size:14px;padding:50px 15px 0 15px;'>
          <strong style='display:block;margin:0 0 10px 0;'>Regards</strong> Bachana Tours<br> Gorubathan, Pin/Zip - 735221, Darjeeling, West bengal, India<br><br>
          <b>Phone:</b> 03552-222011<br>
          <b>Email:</b> contact@bachanatours.in
        </td>
      </tr>
    </tfooter>
  </table>
</body>
</html>";

        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.gallerydekoruma.com',
            'smtp_user' => 'admin@gallerydekoruma.com',  // Email gmail
            'smtp_pass'   => 'dekoruma071',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('admin@gallerydekoruma.com', 'gallerydekoruma');

        // Email penerima
        $this->email->to('om.rifaiachmad@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Invoice');

        // Isi email
        $this->email->message($isi);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            //echo 'Error! email tidak dapat dikirim.';
            echo $this->email->print_debugger();
        }
    }
    public function create_kredit()
    {
        $data = array(
            'id_survei' => $this->input->post('id_survei', TRUE),
            'id_group' => $this->input->post('id_group', TRUE),
            'id_group_sub' => $this->input->post('id_group_sub', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            //'qty' => $this->input->post('qty', TRUE),
            //'satuan' => $this->input->post('satuan', TRUE),
            //'harga' => str_replace('.', '', $this->input->post('harga', TRUE)),
            'total' => str_replace('.', '', $this->input->post('total', TRUE)),
            'nm_tukang' => $this->input->post('nm_tukang', TRUE),
            'note' => $this->input->post('note', TRUE),
            'created_by' => $this->session->userdata('full_name'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $this->M_survei_model->insert_debit($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Insert Record Success</strong></div>');
        redirect(site_url('t_invoice/read/' . $this->input->post('id_survei')));
        //}
    }
    ///////////////////////////////////////
    public function _rules()
    {
        $this->form_validation->set_rules('tgl_survei', 'tgl survei', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('hp', 'hp', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        $this->form_validation->set_rules('color', 'color', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('users', 'users', 'trim|required');

        $this->form_validation->set_rules('id_survei', 'id_survei', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_survei.xls";
        $judul = "m_survei";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Survei");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Hp");
        xlsWriteLabel($tablehead, $kolomhead++, "Note");
        xlsWriteLabel($tablehead, $kolomhead++, "Color");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Users");

        foreach ($this->M_survei_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_survei);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->hp);
            xlsWriteLabel($tablebody, $kolombody++, $data->note);
            xlsWriteLabel($tablebody, $kolombody++, $data->color);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->users);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_survei.php */
/* Location: ./application/controllers/M_survei.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-08 09:28:39 */
/* http://harviacode.com */
