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
                                        <!-- <div class="table-toolbar">
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
                                        </div> -->
                                        <!-- place -->
                                        <!-- place -->
                                        <div id="calendarIO"></div>
                                        <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                                        <input type="hidden" name="calendar_id" value="0">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">Create calendar event</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <div class="alert alert-danger" style="display: none;"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2">Title <span class="required"> * </span></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="color" class="col-sm-2 control-label">Color</label>
                                                                <div class="col-sm-10">
                                                                    <select name="color" class="form-control">
                                                                        <option value="">Choose</option>
                                                                        <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                                                        <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                                        <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                                                        <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                                        <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                                        <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                                        <option style="color:#000;" value="#000">&#9724; Black</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2">Start Date</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                        <input type="text" name="start_date" class="form-control" readonly>
                                                                        <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2">End Date</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                        <input type="text" name="end_date" class="form-control" readonly>
                                                                        <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a>
                                                            <a class="btn btn-danger delete_calendar" style="display: none;">Delete</a>
                                                            <button type="submit" class="btn green">Submit</button>
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
            select: function(start, end) {
                $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
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
            },
            events: JSON.parse(get_data)
        });
    });

    $(document).on('click', '.add_calendar', function() {
        $('#create_modal input[name=calendar_id]').val(0);
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
                        id: data.id,
                        title: $('#create_modal input[name=title]').val(),
                        description: $('#create_modal textarea[name=description]').val(),
                        start: moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end: moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
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
            data: 'calendar_id=' + event.id + '&title=' + event.title + '&start_date=' + start + '&end_date=' + end,
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
                            id: data.id,
                            title: $('#create_modal input[name=title]').val(),
                            description: $('#create_modal textarea[name=description]').val(),
                            start: moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end: moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
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
        $('#create_modal input[name=calendar_id]').val(event.id);
        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal input[name=description]').val(event.description);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
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
                        event.title = $('#create_modal input[name=title]').val();
                        event.description = $('#create_modal textarea[name=description]').val();
                        event.start = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.end = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.color = $('#create_modal select[name=color]').val();
                        $('#calendarIO').fullCalendar('updateEvent', event);

                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
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
                data: 'id=' + event.id,
                dataType: 'JSON',
                beforeSend: function() {},
                success: function(data) {
                    if (data.status) {
                        $('#calendarIO').fullCalendar('removeEvents', event._id);
                        $('#create_modal').modal('hide');
                        $('#form_create')[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
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
</script>
</body>

</html>