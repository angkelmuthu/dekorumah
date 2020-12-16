<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/fullcalendar/fullcalendar.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        JADWAL SURVEI</span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="alert notification" style="display: none;">
                            <button class="close" data-close="alert"></button>
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?php echo site_url('M_survei/create') ?>" class="btn btn-block btn-primary"> Buat Jadwal Survei
                                                                <i class="fal fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- place -->
                                        <div id="calendarIO"></div>
                                        <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header mb-0">
                                                        <h5 class="modal-title">Jadwal Survei</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                        </button>
                                                    </div>

                                                    <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width="30%">Nama</td>
                                                                    <td width="5%">:</td>
                                                                    <td width="65%">
                                                                        <span id="nama"></span>
                                                                        <!-- <input type="text" name="nama" class="form-control" required> -->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Email</td>
                                                                    <td width="5%">:</td>
                                                                    <td width="65%"><span id="email"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Handphone</td>
                                                                    <td width="5%">:</td>
                                                                    <td width="65%"><span id="hp"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Alamat</td>
                                                                    <td width="5%">:</td>
                                                                    <td width="65%"><span id="alamat"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Note</td>
                                                                    <td width="5%">:</td>
                                                                    <td width="65%"><span id="note"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Sales</td>
                                                                    <td width="5%">:</td>
                                                                    <td width="65%"><span id="nm_sales"></span></td>
                                                                </tr>
                                                            </table>
                                                            <input type="hidden" name="id_survei">
                                                            <!-- <div class="form-group">
                                                                <label class="form-label">Tanggal Survei</label>
                                                                <input class="form-control" name="tgl_survei" id="example-date" type="date" name="date">
                                                            </div> -->
                                                            <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                            <input type="hidden" name="users" value="<?php echo $this->session->userdata('full_name'); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript::void" class="btn btn-default" data-dismiss="modal">Close</a>
                                                            <a class="btn btn-warning delete_calendar" style="display: none;">Delete</a>
                                                            <a class="btn btn-success input_pesanan" style="display: none;">View</a>
                                                            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end place -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/dependency/moment/moment.js"></script>
<script src="<?php echo base_url() ?>assets/fullcalendar/fullcalendar.js"></script>
<script type="text/javascript">
    var get_data = '<?php echo $get_data; ?>';
    var backend_url = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            events: JSON.parse(get_data),
            eventRender: function(event, element, view) {
                return $('<button class="btn btn-xs btn-block btn-' + event.color + '">' + event.nama + ' - ' + event.hp + '</button>');
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                //$('#create_modal input[name=nama]').val(event.tgl_mulai);
                $('#create_modal input[name=tgl_survei]').val(moment(start).format('YYYY-MM-DD'));
                $('#create_modal input[name=tgl_survei]').val(moment(end).format('YYYY-MM-DD'));
                $('#create_modal').modal('show');
                save();
                $('#calendarIO').fullCalendar('unselect');
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                editDropResize(event);
            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                editDropResize(event);
            },
            eventClick: function(event, element) {
                deteil(event);
                editData(event);
                deleteData(event);
                linkData(event);
            }
        });
    });

    $(document).on('click', '.add_calendar', function() {
        $('#create_modal input[name=id_survei]').val(0);
        $('#create_modal').modal('show');
    })

    $(document).on('submit', '#form_create', function() {

        var element = $(this);
        var eventData;
        $.ajax({
            url: backend_url + 'calendar/save',
            type: element.attr('method'),
            data: element.serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(data) {
                if (data.status) {
                    eventData = {
                        id_survei: data.id_survei,
                        nama: $('#create_modal input[name=nama]').val(),
                        email: $('#create_modal input[name=email]').val(),
                        hp: $('#create_modal input[name=hp]').val(),
                        alamat: $('#create_modal textarea[name=alamat]').val(),
                        note: $('#create_modal textarea[name=note]').val(),
                        start: moment($('#create_modal input[name=tgl_survei]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end: moment($('#create_modal input[name=tgl_survei]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        color: $('#create_modal select[name=color]').val()
                    };
                    $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                    $('#create_modal').modal('hide');
                    element[0].reset();
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                } else {
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html(data.notif);
                }
                element.find('button[type=submit]').html('Submit');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                element.find('button[type=submit]').html('Submit');
                element.find('.alert').css('display', 'block');
                element.find('.alert').html('Wrong server, please save again');
            }
        });
        return false;
    })

    function editDropResize(event) {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if (event.end) {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        } else {
            end = start;
        }

        $.ajax({
            url: backend_url + 'calendar/save',
            type: 'POST',
            data: 'id_survei=' + event.id_survei + '&nama=' + event.nama + '&email=' + event.email + '&hp=' + event.hp + '&alamat=' + event.alamat + '&note=' + event.note + '&tgl_survei=' + start,
            dataType: 'JSON',
            beforeSend: function() {},
            success: function(data) {
                if (data.status) {
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                } else {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
            }
        });
    }

    function save() {
        $('#form_create').submit(function() {
            var element = $(this);
            var eventData;
            $.ajax({
                url: backend_url + 'calendar/save',
                type: element.attr('method'),
                data: element.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data) {
                    if (data.status) {
                        eventData = {
                            id_survei: data.id_survei,
                            nama: $('#create_modal input[name=nama]').val(),
                            email: $('#create_modal input[name=email]').val(),
                            hp: $('#create_modal input[name=hp]').val(),
                            alamat: $('#create_modal textarea[name=alamat]').val(),
                            note: $('#create_modal textarea[name=note]').val(),
                            start: moment($('#create_modal input[name=tgl_survei]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end: moment($('#create_modal input[name=tgl_survei]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color: $('#create_modal select[name=color]').val()
                        };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    } else {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }
            });
            return false;
        })
    }

    function deteil(event) {
        $('#create_modal input[name=id_survei]').val(event.id);
        $('#create_modal input[name=tgl_survei]').val(moment(event.start).format('YYYY-MM-DD'));
        $('#create_modal input[name=tgl_survei]').val(moment(event.end).format('YYYY-MM-DD'));
        //$('#create_modal #nama').data(event.nama);
        $('#create_modal input[name=email]').val(event.email);
        $('#create_modal input[name=hp]').val(event.hp);
        $('#create_modal textarea[name=alamat]').val(event.alamat);
        $('#create_modal textarea[name=note]').val(event.note);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal .input_pesanan').show();
        $('#create_modal').modal('show');
        document.getElementById("nama").innerHTML = event.nama;
        document.getElementById("email").innerHTML = event.email;
        document.getElementById("hp").innerHTML = event.hp;
        document.getElementById("alamat").innerHTML = event.alamat;
        document.getElementById("note").innerHTML = event.note;
        document.getElementById("nm_sales").innerHTML = event.nm_sales;
    }

    function editData(event) {
        $('#form_create').submit(function() {
            var element = $(this);
            var eventData;
            $.ajax({
                url: backend_url + 'calendar/save',
                type: element.attr('method'),
                data: element.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data) {
                    if (data.status) {
                        event.nama = $('#create_modal input[name=nama]').val();
                        event.email = $('#create_modal input[name=email]').val();
                        event.hp = $('#create_modal input[name=hp]').val();
                        event.alamat = $('#create_modal textarea[name=alamat]').val();
                        event.note = $('#create_modal textarea[name=note]').val();
                        event.start = moment($('#create_modal input[name=tgl_survei]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.end = moment($('#create_modal input[name=tgl_survei]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.color = $('#create_modal select[name=color]').val();
                        $('#calendarIO').fullCalendar('updateEvent', event);

                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('#create_modal input[name=id_survei]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    } else {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }
            });
            return false;
        })
    }

    function deleteData(event) {
        $('#create_modal .delete_calendar').click(function() {
            $.ajax({
                url: backend_url + 'calendar/delete',
                type: 'POST',
                data: 'id_survei=' + event.id_survei,
                dataType: 'JSON',
                beforeSend: function() {},
                success: function(data) {
                    if (data.status) {
                        $('#calendarIO').fullCalendar('removeEvents', event._id);
                        $('#create_modal').modal('hide');
                        $('#form_create')[0].reset();
                        $('#create_modal input[name=id_survei]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    } else {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html(data.notif);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#form_create').find('.alert').css('display', 'block');
                    $('#form_create').find('.alert').html('Wrong server, please save again');
                }
            });
        })
    }

    function linkData(event) {
        $('#create_modal .input_pesanan').click(function() {
            window.location.href = 'M_survei/read/' + event.id_survei;
        })
    }
</script>