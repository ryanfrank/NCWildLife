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
            themeSystem: 'standard',
            themeName: 'Lumen',
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

<div class="mt-4 row col-12 ml-1">
    <div id="calendar"></div>
</div>
