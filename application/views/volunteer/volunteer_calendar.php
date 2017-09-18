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
            theme: true,
            themeSystem: 'standard',
            themeName: 'Lumen',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,list'
            },
            defaultView: 'agendaWeek',
            editable: false,
            eventLimit: true,
            events: "<?php echo base_url(); ?>" + "Volunteer/calendar",
            eventRender: function(event, element) {
                element.popover({
                    title: "Attendees",
                    trigger: 'hover click',
                    content: event.Description
                });
            }
        });
    });
</script>

<div class="row">
    <div class="col-6 ml-0">
        <button type="button" class="btn btn-outline-dark btn-sm ml-4" onclick="$(calendarUpdate).load('Volunteer/calendarEntry')" data-toggle="collapse" data-target="#calendarUpdate" aria-expanded="false" aria-controls="calendarUpdate">Add Event to Calendar</button>
        <button type="button" class="btn btn-outline-dark btn-sm ml-4" onclick="$(calendarUpdate).load('Volunteer/calendarRegistration')" data-toggle="collapse" data-target="#calendarUpdate" aria-expanded="false" aria-controls="calendarUpdate">Register/De-register Calendar Event</button>
    </div>
</div>
<div class="row col-12 mt-2">
    <div id="calendarUpdate" class="collapse"></div>
</div>
<div class="mt-4 row col-12 ml-1">
    <div id="calendar"></div>
</div>
