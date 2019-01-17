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
    function allDayChange(id){
        if ( document.getElementById(id).checked ) {
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
            header: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            dayClick: function(date) {
                sDate = date.format();
                document.getElementById("e_startDate").value = sDate;
                document.getElementById("e_endDate").value = sDate;
                $('.timepicker').timepicker({
                    zindex: 20000,
                    timeFormat: 'h:mm p',
                    interval: 30,
                    dynamic: true,
                    dropdown: true,
                    scrollbar: true
                });
                $('#addToCalendarModal').modal('show');
                $('#addToCalendarModal').off('submit');
                $('#addToCalendarModal').submit( function(event){
                    event.preventDefault();
                    sTime = document.getElementById("e_startTime").value;
                    eTime = document.getElementById("e_endTime").value;
                    eTitle = document.getElementById("e_title").value;
                    sFor = document.getElementById("createdFor").value;
                    sDesc = document.getElementById("e_description").value;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "Volunteer/addCalendarEvent/Volunteer",
                        dataType: 'json',
                        data: {
                            "date": sDate,
                            "sTime": sTime,
                            "eTime": eTime,
                            "allDay": allDaySet,
                            "cFor": sFor,
                            "cDesc": sDesc,
                            "eTitle": eTitle
                        },
                        success : function(result) {
                            $('#addToCalendarModal').modal('toggle');
                            $('#calendar').fullCalendar('refetchEvents');
                            document.getElementById("e_startTime").value = null;
                            document.getElementById("e_endTime").value = null;
                            document.getElementById("e_title").value = null;
                            document.getElementById("createdFor").value = null;
                            if (result === "success") {
                                jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added calendar event</div>');
                                $('#success-alert').fadeOut(3000);
                            }
                        },
                        complete : function (event){

                        }
                    });
                });
            },
            themeSystem: 'bootstrap4',
            title: "Volunteer Calendar",
            events: {
                color: 'blue',
                textColor: 'white',
                url: "<?php echo base_url(); ?>" + "Volunteer/calendar/Volunteer",
                cache: true
            },
            eventClick: function(event){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Volunteer/getSchedule",
                    dataType: 'json',
                    data: {
                        "id": event.id
                    },
                    success : function(result) {
                        document.getElementById("currentDesc").value = null;
                        document.getElementById("curStartDate").value = moment(result.start).format("ddd, MMM Do YYYY");
                        document.getElementById("curEndDate").value = moment(result.end).format("ddd, MMM Do YYYY");
                        document.getElementById("curStartTime").value = moment(result.start).format('LT');
                        document.getElementById("curEndTime").value = moment(result.end).format('LT');
                        document.getElementById("curTitle").value = result.title;
                        document.getElementById("curUser").value = result.name;
                        if ( result['comments'].length > 0 ) {
                            var comment = "";
                            for (var i = 0; i < result['comments'].length; i++) {
                                if ( i !== 0 ) { comment += "\n"; }
                                comment += result['comments'][i].calendar_event_notes;
                                comment += "\n - " + result['comments'][i].name + " (" + moment(result['comments'][i].createdDate).format('ddd, MMM Do YYYY LT') + ")";
                            }
                            document.getElementById("currentDesc").value = comment;
                        }
                        if ( result.allDay === '1' ) { $('#curAllDay').attr('checked', true); }
                        else { $('#curAllDay').attr('checked', false); }

                        $('#updateEventModal').modal('show');
                        $('#updateEventModal').unbind('submit');
                        $('#updateEventModal').submit( function(event) {
                            event.preventDefault();
                            var activeElement = document.activeElement;
                            var updatedComment = document.getElementById('newDesc').value;
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Volunteer/updateSchedule/" + activeElement.value,
                                dataType: 'json',
                                data: {
                                    "comment":      updatedComment,
                                    "createdFor":   result.createdFor,
                                    "id":           result.id
                                },
                                success : function(result) {
                                    $('#updateEventModal').modal('toggle');
                                    $('#calendar').fullCalendar('refetchEvents');
                                    document.getElementById('newDesc').value = null;
                                    if (result === "success") {
                                        jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully updated schedule</div>');
                                        $('#success-alert').fadeOut(3000);
                                    }
                                },
                                complete : function(event){
                                    resetHandler('updateCalendarEvent');
                                }
                            });
                        });
                    }
                });
            }
        });
        $('#updateEventModal').modal('dispose');
        $('#addToCalendarModal').modal('dispose');
    });
</script>
<div class="container-fluid col-11 ml-0">
    <div class="row col-12 mb-5">
        <div class="col align-self-start col-2"></div>
        <div class="col align-self-center text-center">
            <h2 class="text-muted">Volunteer Schedule</h2>
        </div>
        <div class="col align-self-end col-2"></div>
    </div>
    <div class="row col-12 ml-4" style="border: 1px solid darkgrey; border-radius: 7px; box-shadow: 0 0 40px lightgrey;">
        <div class="mt-5 col-12" id="calendar"></div>
    </div>
</div>
<div class="modal fade" id="addToCalendarModal" tabindex="-1" role="dialog" aria-labelledby="addCalendarEventLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content container col-12" style="width: 425px; height: 650px;">
            <div class="row modal-header mt-3">
                <div class="col align-self-start col-2"></div>
                <div class="col align-self-center col-8 text-center">
                    <h5 class="modal-title text-muted text-center" id="addCalendarEventLabel">Add Volunteer Schedule</h5>
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
                        <div class="col-6">
                            <label for="e_startDate" >Schedule Start Date</label>
                            <input id="e_startDate" type="text" class="form-control" value="" placeholder="Test" disabled>
                        </div>
                        <div class="col-6">
                            <label for="e_endDate" >Schedule End Date</label>
                            <input id="e_endDate" type="text" class="form-control" value="" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="col-12 row form-group">
                        <div class="col-12">
                            <label for="e_title">Schedule Title</label>
                            <input id="e_title" type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-12 row form-group">
                        <div class="col-12">
                            <label for="e_title">Schedule Description / Notes</label>
                            <textarea id="e_description" rows="3" class="form-control" style="resize: none;" ></textarea>
                        </div>
                    </div>
                    <div class="row col-12 form-group">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" value="" id="allDay" onclick="allDayChange(this.id);">
                            <label class="form-check-label" for="allDay">
                                All Day Schedule?
                            </label>
                        </div>
                        <?php if ( $this->ion_auth->in_group('admin') ){ ?>
                            <div class="col-6">
                                <select class="form-control" id="createdFor">
                                <option value=""></option>
                                    <?php foreach ($users->result() as $row):?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row col-12 form-group">
                        <div class="col-6 align-left ml-0 mt-3">
                            <label class="align-self-start align-left" for="e_startTime">Schedule Start Time</label>
                            <input id="e_startTime" type="text" class="form-control timepicker" placeholder="" required>
                        </div>
                        <div class="col-6 align-right align-self-end">
                            <label class="align-self-end align-right" for="e_endTime">Schedule End Time</label>
                            <input id="e_endTime" type="text" class="form-control timepicker" placeholder="" required>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <div class="row col-12 form-group mr-2 pull-left">
                            <div class="col-4">
                                <button type="submit" id="addCalendarEntry" class="btn btn-success align-self-start align-left pull-left">Submit</button>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4 pull-right">
                                <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="modal fade" id="updateEventModal" tabindex="-1" role="dialog" aria-labelledby="updateEventLabel" aria-hidden="false">
        <div class="modal-dialog col-12 modal-dialog-centered" style="min-width: 650px;" role="document">
            <div class="modal-content">
                <div class="modal-header mt-3">
                    <div class="col align-self-start col-2"></div>
                    <div class="col align-self-center col-8 text-center">
                        <h5 class="modal-title text-muted text-center" id="updateEventLabel">Review Schedule</h5>
                    </div>
                    <div class="col-2 align-self-end align-right">
                        <button type="button" class="close align-self-end" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <form role="form" id="updateCalendarEvent" data-toggle="validator" autocomplete="off">
                        <div class="col-12 row form-group">
                            <div class="col-6">
                                <label for="curStartDate" >Schedule Start Date</label>
                                <input id="curStartDate" type="text" class="form-control" value="" placeholder="Test" disabled>
                            </div>
                            <div class="col-6">
                                <label for="curEndDate" >Schedule End Date</label>
                                <input id="curEndDate" type="text" class="form-control" value="" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="row col-12 form-group">
                            <div class="col-6 align-left ml-0">
                                <label class="align-self-start align-left" for="curStartTime">Schedule Start Time</label>
                                <input id="curStartTime" type="text" class="form-control timepicker" placeholder="" disabled>
                            </div>
                            <div class="col-6 align-right align-self-end">
                                <label class="align-self-end align-right" for="curEndTime">Schedule End Time</label>
                                <input id="curEndTime" type="text" class="form-control timepicker" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="col-12 row form-group">
                            <div class="col-12">
                                <label for="curTitle">Schedule Title</label>
                                <input id="curTitle" type="text" class="form-control" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="col-12 row form-group">
                            <div class="col-12">
                                <label for="curUser">Schedule For</label>
                                <input id="curUser" type="text" class="form-control" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="col-12 row form-group">
                            <div class="col-12">
                                <label for="currentDesc">Archived Notes</label>
                                <textarea id="currentDesc" rows="3" class="form-control" style="resize: none;" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-12 row form-group">
                            <div class="col-12">
                                <label for="newDesc">Update Notes</label>
                                <textarea id="newDesc" rows="3" class="form-control" style="resize: none;" required></textarea>
                            </div>
                        </div>
                        <div class="row col-12 form-group">
                            <div class="col-6">
                                <input class="form-check-input ml-1" type="checkbox" value="" id="curAllDay" disabled>
                                <label class="form-check-label ml-4" for="curAllDay">All Day Schedule?</label>
                            </div>
                        </div>
                        <div class="modal-footer col-12 mt-2">
                            <div class="row col-12 form-group">
                                <div class="col-3"><button id="update" type="submit" value="update" class="btn btn-success btn-small">Add Note</button></div>
                                <div class="col-3"><?php if ( $this->ion_auth->in_group('scheduler') ){ ?><button type="submit" id="noshow" value="noshow" class="btn btn-warning btn-small">No Show</button><?php } ?></div>
                                <div class="col-3"><?php if ( $this->ion_auth->in_group('scheduler') ){ ?><button type="submit" id="delete" value="delete" class="btn btn-danger btn-small">Delete</button><?php } ?></div>
                                <div class="col-3"><button type="button" class="btn btn-secondary btn-small" data-dismiss="modal">Cancel</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
