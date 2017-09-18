<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/6/17
 * Time: 5:28 PM
 */
?>

<script>
    $(document).ready(function() {
        $("#updateCalendarEvent").submit(function(event) {
            event.preventDefault();
            var e = document.getElementById("eventID");
            var eventValue = e.options[e.selectedIndex].value;
            var f = document.getElementById("userID");
            var userID = f.options[f.selectedIndex].value;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Volunteer/updateCalendarEvent",
                dataType: 'json',
                data: {
                    "event":    eventValue,
                    "user":     userID
                },
                success: function(res) {
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully registered for event</div>');
                        document.getElementById("updateCalendarEvent").reset();
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    }
                    else if (res === "duplicate") {
                        jQuery("div#myStatus").html('<div class="alert alert-warning mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Duplicate entry for ' + $("input#eventTitle").val() + '</div>');
                        document.getElementById("updateCalendarEvent").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to register for event</div>');
                        document.getElementById("updateCalendarEvent").reset();
                    }
                }
            });
        });
    });
</script>

<div class="ml-1 mt-2">
    <form id="updateCalendarEvent" name="updateCalendarEvent" data-toggle="validator" role="form">
        <div class="row">
            <div class="form-group col-6">
                <select class="form-control" id="eventID">
                    <?php foreach ($result as $row): ?>
                        <option value="<? echo $row['id']; ?>"><? echo $row['title'] . " " . $row['start'] ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-4">
                <select class="form-control" id="userID">
                        <option value="<? echo $user->id; ?>"><? echo $user->first_name . " " . $user->last_name ?></option>
                </select>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <button type = "submit" class = "btn btn-light">
                        Join/Register for Event
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
