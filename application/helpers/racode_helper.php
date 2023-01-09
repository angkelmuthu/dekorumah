<?php
function cmb_dinamis($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control'>";
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
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

function cmb_dinamis_concate($name, $table, $pk, $field1, $field2, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control'>";
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field1) . " - " . strtoupper($d->$field2) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function cmb_dinamis_read($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control' readonly>";
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
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

function cmb_option_dinamis($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control' required><option></option>";

    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
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

function select2_dinamisx($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" id="' . $name . '">';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $select2 .= '</select>';
    return $select2;
}

function select2_dinamis($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
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
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $select2 .= '</select>';
    return $select2;
}

function select2_dinamis_required($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" id="' . $name . '" class="select2 form-control w-100" required>';
    $select2 .= '<option value=""></option>';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }

    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $select2 .= '</select>';
    return $select2;
}

function select2_dinamis_custom($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" id="' . $name . '" class="select2 form-control w-100">';
    $select2 .= '<option value=""></option>';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }

    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $select2 .= '</select>';
    return $select2;
}

function select2_dinamis_lengkap($name, $table, $pk, $field, $selected = null, $where = null, $group_by = null, $order = null)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" id="' . $name . '" class="select2 form-control w-100">';
    $select2 .= '<option value=""></option>';
    if ($where) {
        $ci->db->where($where);
    }
    if ($group_by) {
        $ci->db->group_by($group_by);
    }
    if ($order) {
        $ci->db->order_by($order);
    }

    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $select2 .= '</select>';
    return $select2;
}

function select2_dinamis_custom_remun($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" id="' . $name . '" class="select2 form-control w-100">';
    $select2 .= '<option value=""></option>';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }

    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $select2 .= "<option value='" . $d->$pk . "'";
        $select2 .= $selected == $d->$pk ? " selected='selected'" : '';
        $select2 .= ">" .  strtoupper($d->$field) . "</option>";
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


function radiobtn_dinamis($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $radio = '';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }
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
    //$radio .= '</div>';
    return $radio;
}

function radiobtn_dinamis_required($name, $table, $pk, $field, $selected = null, $where = null, $order = null)
{
    $ci = get_instance();
    $radio = '';
    if ($where) {
        $ci->db->where($where);
    }
    if ($order) {
        $ci->db->order_by($order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        if ($row->$pk == $selected) {
            $cek = 'checked';
        } else {
            $cek = '';
        }
        $radio .= '<div class="custom-control custom-radio custom-control-inline">
        <input type="radio" name="' . $name . '" class="custom-control-input" id="' . $name . '-' . $row->$pk . '" value="' . $row->$pk . '" ' . $cek . ' required>
        <label class="custom-control-label" for="' . $name . '-' . $row->$pk . '">' . $row->$field . '</label>
    </div>';
    }
    //$radio .= '</div>';
    return $radio;
}

function checkbox_dinamis_custom($name, $field)
{
    $ci = get_instance();
    $checkbox = '';
    // if ($where) {
    //     $ci->db->where($where);
    // }
    // if ($order) {
    //     $ci->db->order_by($order);
    // }
    // $data = $ci->db->get($table)->result();
    // foreach ($data as $row) {
    //     if ($row->$pk == $selected) {
    //         $cek = 'checked';
    //     } else {
    //         $cek = '';
    //     }
    $checkbox .= '<div custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name="' . $name . '" class="custom-control-input" id="' . $name . '" value="ya">
        <label class="custom-control-label" for="' . $name . '">' . $field . '</label>
    </div>';
    // }
    return $checkbox;
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
function y_or_n($string)
{
    return $string == 'Y' ? 'Aktif' : 'Tidak Aktif';
}
function flag_aktif($string)
{
    return $string == '0' ? '<span class="badge badge-info">Aktif</span>' : '<span class="badge badge-warning">Tidak Aktif</span>';
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

function formatRP($angka)
{
    $angka = intval($angka);
    $angka = "Rp. " . number_format($angka, 2, ',', '.');
    return $angka;
}

function formatRP0($angka)
{
    $angka = intval($angka);
    $angka = "" . number_format($angka, 0, ',', '.');
    return $angka;
}

function umur($tanggal_lahir)
{
    list($year, $month, $day) = explode("-", $tanggal_lahir);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
    elseif (($month_diff == 0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}

function tgl_indo2($timestamp = '', $date_format = 'l, j F Y ')
{
    if (trim($timestamp) == '') {
        $timestamp = time();
    } elseif (!ctype_digit($timestamp)) {
        $timestamp = strtotime($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace("/S/", "", $date_format);
    $pattern = array(
        '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
        '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
        '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
        '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
        '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
        '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
        '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
        '/November/', '/December/',
    );
    $replace = array(
        'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
        'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'Sepember',
        'Oktober', 'November', 'Desember',
    );
    $date = date($date_format, $timestamp);
    $date = preg_replace($pattern, $replace, $date);
    $date = "{$date}";
    return $date;
}
function tgl_indo($timestamp = '', $date_format = 'j F Y ')
{
    if (trim($timestamp) == '') {
        $timestamp = time();
    } elseif (!ctype_digit($timestamp)) {
        $timestamp = strtotime($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace("/S/", "", $date_format);
    $pattern = array(
        '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
        '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
        '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
        '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
        '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
        '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
        '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
        '/November/', '/December/',
    );
    $replace = array(
        'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
        'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'Sepember',
        'Oktober', 'November', 'Desember',
    );
    $date = date($date_format, $timestamp);
    //$date = preg_replace($pattern, $replace, $date);
    $date = "{$date}";
    return $date;
}
function konversiwaktuLalu($waktuPosting = null)
{
    // Jika parameter $waktuPosting kosong
    // $waktuPosting menggunakan waktu sekarang.
    if (empty($waktuPosting)) {
        $waktuPosting = date("Y-m-d h:i:s");
    }
    //  waktuLalu adalah waktu estimasi kira-kira berapa lama jeda antara hari ini dengan waktu posting
    //  waktuLalu = tanggal sekarang - waktu posting
    $waktuLalu = time() - strtotime($waktuPosting);

    //  jika waktuLalu kurang dari 1 detik, maka munculkan pesan 'beberapa saat yang lalu'
    if ($waktuLalu < 1) {
        return 'beberapa saat yang lalu.';
    }

    //  kondisi dimana tahun, bulan, hari, jam, menit, dan detik dalam satuan detik
    //  dimasukkan ke dalam sebuah array untuk pembanding
    $condition = array(
        31104000    =>  'tahun',
        2592000     =>  'bulan',
        86400       =>  'hari',
        3600        =>  'jam',
        60          =>  'menit',
        1           =>  'detik'
    );

    //  melakukan perulangan untuk mengecek kondisi mana yang paling sesuai dengan waktuLalu
    foreach ($condition as $secs => $str) {
        //  $d adalah nilai satuan yg digunakan seperti '1 tahun' atau '2 jam'
        //  $d didapat dari waktuLalu dibagi dengan kondisi
        $d = $waktuLalu / $secs;

        // jika $d lebih dari atau sama dengan 1 maka cetak hasil kondisi dan sudahi perulangan
        if ($d >= 1) {
            //  waktu di bulatkan
            $r = round($d);
            return $r . ' ' . $str . ' yang lalu.';
        }
    }
}
function LoremIpsum($type = '', $num = '')
{
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac lacus lectus. Duis ultrices bibendum tristique. Etiam vel est porta turpis hendrerit placerat at non mauris. Maecenas augue odio, dapibus eget auctor sit amet, rutrum nec nisl. Praesent tincidunt adipiscing auctor. Sed sollicitudin lobortis arcu, sit amet malesuada mi auctor varius. Duis eleifend pretium felis quis lobortis. Nam posuere arcu quis magna vestibulum nec pellentesque enim imperdiet. Aenean nunc augue, sodales varius molestie faucibus, tincidunt a odio. Curabitur cursus ante metus. Fusce tristique ante id magna rhoncus lobortis a sit amet risus.';
    if ($type == 'sentence') {
        return 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.';
    } elseif ($type == 'paragraphs') {
        $return = '';
        if ($num == '') {
            $return .= "<p>$lorem</p>";
        } else {
            for ($i = 0; $i < $num; $i++) {
                if ($num == $i) {
                    $return .= $lorem;
                } else {
                    $return .= $lorem . ' <br />';
                }
            }
        }
        return $return;
    } else {
        // return just a sentence if the type was undifined
        return 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.';
    }
}
function date_to_mysql($value)
{
    if ($value) {
        $d = explode('/', $value);
        $value = "$d[2]-$d[1]-$d[0]";
    }
    return $value;
}
function date_from_mysql($value)
{
    if ($value && substr($value, 0, 4) != '0000') {
        $d = explode('-', substr($value, 0, 10));
        $value = "$d[2]/$d[1]/$d[0]";
    } else {
        $value = '';
    }
    return $value;
}
if (!function_exists('numeric_to_mysql')) {
    function numeric_to_mysql($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}

// function umur($tanggal_lahir)
// {
//     $birthDate = new DateTime($tanggal_lahir);
//     $today = new DateTime("today");
//     if ($birthDate > $today) {
//         exit("0 tahun 0 bulan 0 hari");
//     }
//     $y = $today->diff($birthDate)->y;
//     $m = $today->diff($birthDate)->m;
//     $d = $today->diff($birthDate)->d;
//     return $y . " tahun " . $m . " bulan " . $d . " hari";
// }

function tooltips($link, $class, $show, $hide)
{
    return '<a href="' . $link . '" class="text-' . $class . ' fw-500" data-toggle="tooltip" title="' . $hide . '">' . $show . '</a>';
}

function alert_basic($class, $title, $description)
{
    return '<div class="alert alert-' . $class . ' mb-0" role="alert"><strong>' . $title . '</strong>  ' . $description . '</div>';
}
function alert_outline($class, $title, $description)
{
    return '<div class="alert border border-' . $class . ' bg-transparent text-' . $class . ' mb-0" role="alert"><strong>' . $title . '</strong> ' . $description . '</div>';
}
function alert_alt($class, $title, $description)
{
    return '<div class="alert ' . $class . ' mb-0" role="alert"><strong>' . $title . '</strong> ' . $description . '</div>';
}
function alert_dismissable($class, $title, $description)
{
    return '<div class="alert alert-' . $class . ' alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>' . $title . '</strong> ' . $description . '</div>';
}
function alert_js($msn)
{
    echo "<script>alert('$msn')</script>";
}

function clean_string($string)
{

    if ($string) {
        $string = str_replace(array('á', 'à', 'â', 'ã'), "a", $string);
        $string = str_replace(array('Á', 'À', 'Â', 'Ã'), "A", $string);
        $string = str_replace(array('é', 'è', 'ê'), "e", $string);
        $string = str_replace(array('É', 'È', 'Ê'), "E", $string);
        $string = str_replace(array('í', 'ì'), "i", $string);
        $string = str_replace(array('Í', 'Ì'), "I", $string);
        $string = str_replace(array('ó', 'ò', 'ô', 'õ', 'º'), "o", $string);
        $string = str_replace(array('Ó', 'Ò', 'Ô', 'Õ'), "O", $string);
        $string = str_replace(array('ú', 'ù', 'û'), "u", $string);
        $string = str_replace(array('Ú', 'Ù', 'Û'), "U", $string);
        $string = str_replace("ç", "c", $string);
        $string = str_replace("Ç", "C", $string);
        $string = str_replace(array(
            '[', ']', '[', '}', '{', ')', '(', ',', ':', ',', ';', '!', '?', '*', '%', '~', '^', '-', "'", '`', '&',
            '#', ']', '"', ','
        ), "", $string);
        // $string = str_replace(" ","",$string);
        //  $string = str_replace(" ","_",$string);

        return $string;
    }
}
function how_days($inicio, $fim)
{
    $data1 = $inicio;
    $data2 = $fim;
    $days = round((strtotime($data2) - strtotime($data1)) / (24 * 60 * 60), 0);

    return $days;
}
function kapital($string)
{

    $str = strtoupper($string);

    return $str;
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
    $tanggal = date("d/m/Y h:i:s", strtotime($string));
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

// function kelamin($JENISKELAMIN)
// {
//     if($data->JENISKELAMIN=="l" || $data->JENISKELAMIN=="L")  {
//         echo"Laki-Laki";
//     }elseif($data->JENISKELAMIN=="p" || $data->JENISKELAMIN=="P") {
//         echo"Perempuan";
//     }
//     return $data;
// }
