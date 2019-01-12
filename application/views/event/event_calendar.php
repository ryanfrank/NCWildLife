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
                right: 'month,agendaWeek,agendaDay,list'
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

<div class="container col-11 ml-0">
    <div class="row col-11">
        <div class="col align-self-start col-2"></div>
        <div class="col align-self-center text-center">
            <h2 class="text-muted">Event Calendar / Schedule</h2>
        </div>
        <div class="col align-self-end col-2"></div>
    </div>
    <div class="mt-4 row col-11">
        <div id="calendar"></div>
    </div>
</div>
