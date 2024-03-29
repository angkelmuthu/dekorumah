<?php
function cmb_dinamis($name, $table, $pk, $field, $selected = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}
function cmb_dinamis_filter($name, $table, $pk, $field, $where, $filter)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if ($where) {
        $ci->db->where($where, $filter);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        //$cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function radiobtn_dinamis($name, $table, $pk, $field, $selected = null)
{
    $ci = get_instance();
    $radio = '<div class="frame-wrap">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        if ($row->$pk == $selected) {
            $cek = 'checked';
        } else {
            $cek = '';
        }
        $radio .= '<div class="custom-control custom-radio custom-control-inline">
        <input type="radio" name="' . $name . '" class="custom-control-input" id="' . $name . '-' . $row->$pk . '" value="' . $row->$pk . '" ' . $cek . '>
        <label class="custom-control-label" for="' . $name . '-' . $row->$pk . '">' . $row->$field . '</label>
    </div>';
    }
    $radio .= '</div>';
    return $radio;
}
function isdelete($name, $table, $pk, $field)
{
    $ci = get_instance();
    $radio = '<div class="frame-wrap">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        if ($row->$pk == null) {
            $cek = 'checked';
        } else {
            $cek = '';
        }
        $radio .= '<div class="custom-control custom-radio custom-control-inline">
        <input type="radio" name="' . $name . '" class="custom-control-input" id="' . $row->$pk . '" value="' . $row->$pk . '" ' . $cek . '>
        <label class="custom-control-label" for="' . $row->$pk . '">' . $row->$field . '</label>
    </div>';
    }
    $radio .= '</div>';
    return $radio;
}
function select2_dinamis($name, $table, $pk, $field)
{
    $ci = get_instance();
    //$select2 = '<select name="' . $name . '" class="select2 form-control w-100" id="single-default" >';
    $select2 = '<select name="' . $name . '" class="select2 form-control w-100">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $select2 .= ' <option value="' . $row->$pk . '">' . $row->$field . '</option>';
    }
    $select2 .= '</select>';
    return $select2;
}
function select2_update($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" id="' . $name . '" class="select2 form-control w-100">';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }
    $data = $ci->db->get($table)->result();
    $select2 .= "<option></option>";
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $select2 .= '</select>';
    return $select2;
}
function select2_dinamis_satuan($name, $table, $pk, $field, $selected)
{
    $ci = get_instance();
    //$select2 = '<select name="' . $name . '" class="select2 form-control w-100" id="single-default" >';
    $select2 = '<select name="' . $name . '" class="select2 form-control w-100">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        if ($row->$pk == $selected) {
            $select2 .= ' <option value="' . $row->$pk . '" selected>' . $row->$field . '</option>';
        } else {
            $select2 .= ' <option value="' . $row->$pk . '">' . $row->$field . '</option>';
        }
    }
    $select2 .= '</select>';
    return $select2;
}
function select2_hambatan($name, $table, $pk, $field)
{
    $ci = get_instance();
    //$select2 = '<select name="' . $name . '" class="select2 form-control w-100" id="single-default" >';
    $select2 = '<select name="' . $name . '" class="select2 form-control w-100">';
    $select2 .= ' <option value="">Pilih Hambatan</option>';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {

        $select2 .= ' <option value="' . $row->$pk . '">' . $row->$field . '</option>';
    }
    $select2 .= '</select>';
    return $select2;
}

function datalist_dinamis($name, $table, $field, $value = null)
{
    $ci = get_instance();
    $string = '<input value="' . $value . '" name="' . $name . '" list="' . $name . '" class="form-control">
    <datalist id="' . $name . '">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $string .= '<option value="' . $row->$field . '">';
    }
    $string .= '</datalist>';
    return $string;
}

function rename_string_is_aktif($string)
{
    return $string == 'y' ? 'Aktif' : 'Tidak Aktif';
}
function ya($string)
{
    return $string == 'Y' ? 'Ya' : 'Tidak';
}
function aktif($string)
{
    return $string == 'Y' ? '<span class="badge badge-primary">Aktif</span>' : '<span class="badge badge-warning">Tidak Aktif</span>';
}
function radioBtn_check_y($string)
{
    return $string == 'YA' ? 'checked=""' : '';
}
function radioBtn_check_n($string)
{
    return $string == 'TIDAK' ? 'checked=""' : '';
}

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_users')) {
        redirect('auth');
    } else {
        $modul = $ci->uri->segment(1);

        $id_user_level = $ci->session->userdata('id_user_level');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('tbl_menu', array('url' => $modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('tbl_hak_akses', array('id_menu' => $id_menu, 'id_user_level' => $id_user_level));
        if ($hak_akses->num_rows() < 1) {
            redirect('blokir');
            exit;
        }
    }
}
function umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y . " tahun " . $m . " bulan " . $d . " hari";
}

function alert($class, $title, $description)
{
    return '<div class="alert ' . $class . ' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> ' . $title . '</h4>
                ' . $description . '
              </div>';
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level, $id_menu)
{
    $ci = get_instance();
    $ci->db->where('id_user_level', $id_user_level);
    $ci->db->where('id_menu', $id_menu);
    $data = $ci->db->get('tbl_hak_akses');
    if ($data->num_rows() > 0) {
        return "checked='checked'";
    }
}


function autocomplate_json($table, $field)
{
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}

function angka($string)
{
    $angka = number_format($string, 0, ',', '.');
    return $angka;
}
function tanggal($string)
{
    $tanggal = date("d/m/Y", strtotime($string));
    return $tanggal;
}

function tanggaljam($string)
{
    $tanggal = date("d/m/Y h:s:i", strtotime($string));
    return $tanggal;
}

function penyebut($string)
{
    $string = abs($string);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($string < 12) {
        $temp = " " . $huruf[$string];
    } else if ($string < 20) {
        $temp = penyebut($string - 10) . " belas";
    } else if ($string < 100) {
        $temp = penyebut($string / 10) . " puluh" . penyebut($string % 10);
    } else if ($string < 200) {
        $temp = " seratus" . penyebut($string - 100);
    } else if ($string < 1000) {
        $temp = penyebut($string / 100) . " ratus" . penyebut($string % 100);
    } else if ($string < 2000) {
        $temp = " seribu" . penyebut($string - 1000);
    } else if ($string < 1000000) {
        $temp = penyebut($string / 1000) . " ribu" . penyebut($string % 1000);
    } else if ($string < 1000000000) {
        $temp = penyebut($string / 1000000) . " juta" . penyebut($string % 1000000);
    } else if ($string < 1000000000000) {
        $temp = penyebut($string / 1000000000) . " milyar" . penyebut(fmod($string, 1000000000));
    } else if ($string < 1000000000000000) {
        $temp = penyebut($string / 1000000000000) . " trilyun" . penyebut(fmod($string, 1000000000000));
    }
    return $temp;
}

function terbilang($string)
{
    if ($string < 0) {
        $hasil = "minus " . trim(penyebut($string));
    } else {
        $hasil = trim(penyebut($string));
    }
    return $hasil;
}
