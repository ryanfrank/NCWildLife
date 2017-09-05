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
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            editable: true,
            events: "<?php echo base_url(); ?>" + "Volunteer/getCalendar"
        });
    });
</script>
<div class="mt-4 row col-10">
    <div id="calendar"></div>
</div>
