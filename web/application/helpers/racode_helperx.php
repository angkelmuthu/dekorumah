<?php
function cmb_dinamis($name, $table, $field, $pk, $selected = null, $order = null)
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

function select2_dinamis($name, $table, $field, $placeholder)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" class="form-control select2 select2-hidden-accessible" multiple=""
               data-placeholder="' . $placeholder . '" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $select2 .= ' <option>' . $row->$field . '</option>';
    }
    $select2 .= '</select>';
    return $select2;
}

function radiobtn_dinamis($name, $table, $field, $placeholder)
{
    $ci = get_instance();
    $radiobtn = '<div class="frame-wrap">';
    $data = $ci->db->get($table)->result();
    $no = 1;
    foreach ($data as $row) {
        $radiobtn .= '<div class="custom-control custom-radio custom-control-inline">
        <input type="radio" name="' . $name . '" class="custom-control-input" id="' . $row->$field . '" value="' . $row->$field . '">
        <label class="custom-control-label" for="' . $row->$field . '">' . $row->$placeholder . '</label>
    </div>';
        $no++;
    }
    $radiobtn .= '</div>';
    return $radiobtn;
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
    return $string == 'Y' ? 'Aktif' : 'Tidak Aktif';
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
