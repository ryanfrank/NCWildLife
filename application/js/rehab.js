$(function(){
    $("#goodSamaritanForm").submit(function(){
        dataString = $("#goodSamaritanForm").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/Intake/addSamaritan",
            data: dataString,
            success: function(data){
                alert('Successful!');
            }
        });
        return false;  //stop the actual form post !important!
    });
});