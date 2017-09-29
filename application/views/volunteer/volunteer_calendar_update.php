<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/6/17
 * Time: 5:28 PM
 */
?>

<script>
    $(".datepicker").datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        autoclose: true
    });
    function handleClick(){
        if (document.getElementById("allDay").checked ){ document.getElementById("endDate").disabled = true; document.getElementById("endDate").value = '0000-00-00 00:00:00'}
        else { document.getElementById("endDate").disabled = false; }
    }
    $(document).ready(function() {
        $("#addCalendarEvent").submit(function(event) {
            event.preventDefault();
            var allDayEvent;
            if( $("#allDay").is(':checked') ) { allDayEvent = "1"; }
            else { allDayEvent = "0"; }
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Volunteer/addCalendarEvent",
                dataType: 'json',
                data: {
                    "eventTitle":    $("input#eventTitle").val(),
                    "startDate": $("input#startDate").val(),
                    "endDate": $("input#endDate").val(),
                    "allDayEvent": allDayEvent
                },
                success: function(res) {
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added ' + $("input#eventTitle").val() + '</div>');
                        document.getElementById("addCalendarEvent").reset();
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    }
                    else if (res === "duplicate") {
                        jQuery("div#myStatus").html('<div class="alert alert-warning mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Duplicate entry for ' + $("input#eventTitle").val() + '</div>');
                        document.getElementById("addCalendarEvent").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add ' + $("input#eventTitle").val() + '</div>');
                        document.getElementById("addCalendarEvent").reset();
                    }
                }
            });
        });
    });
</script>
<div class="ml-3">
    <form class="mt-3" id="addCalendarEvent" name="addCalendarEvent" data-toggle="validator" role="form">
        <div class="row mt-3">
            <div class="col-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="eventTitle" placeholder="Event Title" required>
                    <div class="input-group-addon">
                        <span class="fa fa-tasks"></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group date datepicker">
                    <input type="text" class="form-control" id="startDate" placeholder="Start Date/Time" required>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group date datepicker">
                    <input type="text" class="form-control" id="endDate" placeholder="End Date/Time">
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="All Day Event?" readonly>
                    <span class="input-group-addon">
                        <input type="checkbox" id="allDay" onclick='handleClick();'>
                    </span>
                </div>
            </div>
            <div class="col-1">
                <div class="input-group">
                    <button type = "submit" class = "btn btn-light">
                        Add Volunteer Schedule
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
