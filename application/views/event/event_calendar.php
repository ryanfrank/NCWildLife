<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/27/17
 * Time: 6:18 PM
 */
?>
<script>
    $(function(){
        $('#calendar').fullCalendar({
            theme: true,
            themeSystem: 'bootstrap4',
            themeName: 'Minty',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            editable: false,
            eventLimit: true,
            events: "<?php echo base_url(); ?>" + "Volunteer/calendar/Event",
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

<div class="container-fluid col-11 ml-0" style="border: 1px solid darkgrey; border-radius: 7px; box-shadow: 0 0 40px lightgrey;">
    <div class="row col-12 mb-5 mt-3">
        <div class="col align-self-start col-2"></div>
        <div class="col align-self-center text-center">
            <h2 class="text-muted">Event Schedule</h2>
        </div>
        <div class="col align-self-end col-2"></div>
    </div>
    <div class="row col-12 ml-1">
        <div class="mt-2 col-12" id="calendar"></div>
    </div>
</div>
