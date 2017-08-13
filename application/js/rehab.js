$(document).ready(function(){
    $("#samaritan_submit").click(function(){
        var firstName = $("#firstName").val();
        var base_url= 'http://rehab.mycoolmac.net/';
        var url = base_url + '/Intake/addSamaritan';
        $.ajax({
            type : 'POST',
            dataType: 'json',
            url : url,
            data :'firstName=' + firstName
        });
    });
});