$(document).ready(function() {
    $(".mySubmit").click(function(event) {
        event.preventDefault();
        var firstName = $("input#firstName").val();
        var lastName = $("input#lastName").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "/Intake/addSamaritan",
            dataType: 'json',
            data: {first: firstName, last: lastName},
            success: function(res) {
                if (res)
                {
// Show Entered Value
                    jQuery("div#content").show();
                    jQuery("div#content").html(res.first);
                    jQuery("div#value_pwd").html(res.last);
                }
            }
        });
    });
});