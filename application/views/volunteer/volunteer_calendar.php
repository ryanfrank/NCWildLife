<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/4/17
 * Time: 11:20 AM
 */

?>
<script>
    $(function(){

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            dayClick: function(date) {
                $('#calendarModal').modal('show', function(){

                });
            },
            themeSystem: 'bootstrap4',
            selectable: true,
            title: "Volunteer Calendar",
            events: {
                url: "<?php echo base_url(); ?>" + "Volunteer/calendar/Volunteer",
                type: 'POST',
                color: 'blue',
                textColor: 'white'
            }
        });
    });
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
</div>
<div class="mt-4 row col-10 ml-1">
    <div id="calendar"></div>
</div>
<div class="modal fade fa-calendar-times-o" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg col-11" role="document">
        <div class="modal-content">
            <div class="container modal-header text-center align-content-center align-center">
                <h5 class="ml-3 col-11 modal-title text-muted text-center" id="addContactModalLabel">Add Volunteer Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker({
                                icons: {
                                    time: "fa fa-clock-o",
                                    date: "fa fa-calendar",
                                    up: "fa fa-arrow-up",
                                    down: "fa fa-arrow-down"
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
