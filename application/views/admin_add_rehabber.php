<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/14/17
 * Time: 4:33 PM
 */

?>
<script type="application/javascript">
    $(document).ready(function() {
        $("#addRehabber").submit(function(event) {
            event.preventDefault();
            var licensed;
            if( $("#rehabberLicensed").is(':checked') ) { licensed = "1"; }
            else { licensed = "0"; }
            var isVolunteer;
            if( $("#volunteer").is(':checked') ) { isVolunteer = "1"; }
            else { isVolunteer = "0"; }
            var isActive;
            if( $("#active").is(':checked') ) { isActive = "1"; }
            else { isActive = "0"; }
            var e = document.getElementById("stateName");
            var stateValue = e.options[e.selectedIndex].value;
            var f = document.getElementById("countyName");
            var countyValue = f.options[f.selectedIndex].value;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Admin/addRehabber",
                dataType: 'json',
                data: {
                    "first":        $("input#firstName").val(),
                    "last":         $("input#lastName").val(),
                    "street":       $("input#streetAddress").val(),
                    "city":         $("input#cityName").val(),
                    "state":        stateValue,
                    "county":       countyValue,
                    "zip":          $("input#zipCode").val(),
                    "email":        $("input#emailAddress").val(),
                    "phone":        $("input#phoneNumber").val(),
                    "isLicensed":   licensed,
                    "isActive":     isActive,
                    "isVolunteer":  isVolunteer,
                    "notes":        $("input#rehabberNotes").val(),
                    "affiliation":  $("input#rehabberAffiliation").val()
                },
                success: function(res) {
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("addRehabber").reset();
                    }
                    else if (res === "duplicate") {
                        jQuery("div#myStatus").html('<div class="alert alert-warning mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Duplicate entry for ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("addRehabber").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("addRehabber").reset();
                    }
                }
            });
        });
    });
</script>
<script type="application/javascript">
    $('#stateName').change(function(){
        var e = document.getElementById("stateName");
        var stateValue = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/getCounty",
            dataType: 'json',
            data: {
                "stateID": stateValue
            },
            success: function(result){
                $('#countyName').empty();
                $.each(result.result, function(){
                    $('#countyName').append('<option value="' + this['county_id'] + '" >'+this['county_name']+'</option>');
                    document.getElementById("countyName").disabled = false;
                });
            }
        });
    });
</script>
<div id="info">
    <form class="mt-3" id="addRehabber" name="addRehabber">
        <div class="row">
            <div class="form-group col-6">
                <label for="firstName" class="align-content-center">Rehabber / Volunteer First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name" onmouseover="this.focus();"  required>
                <div class="invalid-feedback">Please provide a first name</div>
            </div>
            <div class="form-group col-6">
                <label for="lastName" class="align-content-center">Rehabber / Volunteer Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" onmouseover="this.focus();"  required>
                <div class="invalid-feedback">Please provide a last name</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="streetAddress" class="align-content-center">Rehabber / Volunteer Street Address</label>
                <input type="text" class="form-control" id="streetAddress" placeholder="Street Address" onmouseover="this.focus();">
            </div>
            <div class="form-group col-6">
                <label for="cityName" class="align-content-center">Rehabber / Volunteer City</label>
                <input type="text" class="form-control" id="cityName" placeholder="City" onmouseover="this.focus();"  required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label for="stateName" class="align-content-center">Rehabber / Volunteer State</label>
                <select class="form-control" id="stateName" required>
                    <option></option>
                    <?php foreach ($states->result() as $row):?>
                        <option value="<?php echo $row->state_id?>"><?php echo $row->state_name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="countyName" class="align-content-center">Rehabber / Volunteer County</label>
                <select class="form-control" id="countyName" disabled>
                    <option>Select State First</option>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="zipCode" class="align-content-center">Rehabber / Volunteer Zip</label>
                <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" onmouseover="this.focus();">
            </div>
            <div class="form-group col-3">
                <label for="emailAddress" class="align-content-center">Rehabber / Volunteer Email</label>
                <input type="email" class="form-control" id="emailAddress" placeholder="email@domain.com" onmouseover="this.focus();" >
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label for="phoneNumber" class="align-content-center">Rehabber / Volunteer Phone</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="XXX-XXX-XXXX" onmouseover="this.focus();" required>
            </div>
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="rehabberLicensed" type="checkbox" value="No" onmouseover="this.focus();" >
                    Licensed Rehabber?
                </label>
            </div>
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="volunteer" type="checkbox" value="No" onmouseover="this.focus();" >
                    NC WildLife Rehab Volunteer?
                </label>
            </div>
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="active" type="checkbox" value="No" onmouseover="this.focus();" >
                    Active?
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-check col-6">
                <label for="rehabberNotes" class="align-content-center">Notes</label>
                <input type="text" class="form-control" id="rehabberNotes" placeholder="Enter notes here" onmouseover="this.focus();">
            </div>
            <div class="form-check col-6">
                <label for="rehabberAffiliation" class="align-content-center">Affiliations</label>
                <input type="text" class="form-control" id="rehabberAffiliation" placeholder="Enter affiliations here" onmouseover="this.focus();">
            </div>
        </div>
        <div class="row ml-2 mt-4">
            <input type="submit" id="submitButton">
        </div>
    </form>
</div>