<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/4/17
 * Time: 11:20 AM
 */

?>
<script>
    var allDaySet = false;
    function allDayChange(){
        if ( document.getElementById('allDay').checked ) {
            $('#e_startTime').prop('disabled', true);
            $('#e_endTime').prop('disabled', true);
            allDaySet = true;
        }
        else {
            $('#e_startTime').prop('disabled', false);
            $('#e_endTime').prop('disabled', false);
            allDaySet = false;
        }
    }
    $(function(){
        $('#calendar').fullCalendar({
            height: 800,
            header: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            dayClick: function(date) {
                sDate = date.format();
                document.getElementById("e_startDate").value = sDate;
                $('.timepicker').timepicker({
                    zindex: 20000,
                    timeFormat: 'h:mm p',
                    interval: 30,
                    dynamic: true,
                    dropdown: true,
                    scrollbar: true
                });
                $('#calendarModal').modal('show');
                $('#calendarModal').off('submit');
                $('#calendarModal').submit( function(event){
                    event.preventDefault();
                    sTime = document.getElementById("e_startTime").value;
                    eTime = document.getElementById("e_endTime").value;
                    eTitle = document.getElementById("e_title").value;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "Volunteer/addCalendarEvent/Volunteer",
                        dataType: 'json',
                        data: {
                            "date": sDate,
                            "sTime": sTime,
                            "eTime": eTime,
                            "allDay": allDaySet,
                            "eTitle": eTitle
                        },
                        success : function(result) {
                            $('#calendarModal').modal('toggle');
                            $('#calendar').fullCalendar('refetchEvents');
                            document.getElementById("e_startTime").value = null;
                            document.getElementById("e_endTime").value = null;
                            document.getElementById("e_title").value = null;
                            if (result === "success") {
                                jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added calendar event</div>');
                                $('#success-alert').fadeOut(3000);
                            }
                        }
                    });
                });
            },
            themeSystem: 'bootstrap4',
            title: "Volunteer Calendar",
            events: {
                url: "<?php echo base_url(); ?>" + "Volunteer/calendar/Volunteer",
                color: 'blue',
                textColor: 'white',
                eventDataTransform: function ( eventData ) {
                    if ( eventData.allDay === '1' ) { eventData.allDay = true; eventData.color = 'green' }
                    else { eventData.allDay = false }
                    return eventData;
                }
            }
        });
        $('#calendarModal').modal('dispose');
    });
</script>
<div class="container col-11 ml-0">
    <div class="row col-11">
        <div class="col align-self-start col-2"></div>
        <div class="col align-self-center text-center">
            <h2 class="text-muted">Volunteer Calendar / Schedule</h2>
        </div>
        <div class="col align-self-end col-2"></div>
    </div>
    <div class="mt-4 row col-11">
        <div id="calendar"></div>
    </div>
</div>
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content container col-12" style="width: 425px; height: 500px;">
            <div class="row modal-header">
                <div class="col align-self-start col-2"></div>
                <div class="col align-self-center col-8 text-center">
                    <h5 class="modal-title text-muted text-center" id="addContactModalLabel">Add Volunteer Schedule</h5>
                </div>
                <div class="col align-self-end col-2 align-self-end align-right">
                    <button type="button" class="close align-self-end" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body col-12">
                <form role="form" id="addCalendarEvent" data-toggle="validator" autocomplete="off">
                    <div class="col-12 row form-group">
                        <div class="col-12">
                            <label for="e_startDate" >Event Start Date</label>
                            <input id="e_startDate" type="text" class="form-control" value="" placeholder="Test" disabled>
                        </div>
                    </div>
                    <div class="col-12 row form-group">
                        <div class="col-12">
                            <label for="e_title">Event Title</label>
                            <input id="e_title" type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="row col-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="allDay" onclick="allDayChange();">
                            <label class="form-check-label" for="allDay">
                                All Day Event?
                            </label>
                        </div>
                    </div>
                    <div class="row col-12form-group">
                        <div class="col-5 align-left ml-0 mt-3">
                            <label class="align-self-start align-left" for="e_startTime">Start Time</label>
                            <input id="e_startTime" type="text" class="form-control timepicker" placeholder="" required>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5 align-right align-self-end">
                            <label class="align-self-end align-right" for="e_endTime">End Time</label>
                            <input id="e_endTime" type="text" class="form-control timepicker" placeholder="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row col-12 form-group mr-2">
                            <div class="col-4">
                                <button type="submit" id="addCalendarEntry" class="btn btn-success align-self-start align-left pull-left">Submit</button>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
