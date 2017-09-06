<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/4/17
 * Time: 11:20 AM
 */
?>
<script>
    $(document).ready(function(){
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
            events: "<?php echo base_url(); ?>" + "Volunteer/getCalendar",
            eventRender: function(event, element) {
                element.popover({
                    title: "Attendees",
                    trigger: 'hover click',
                    content: event.description
                });
            }
        });
    });
</script>
<div class="mt-4 row col-10">
    <div id="calendar"></div>
</div>
