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
            var e = document.getElementById("stateName");
            var stateValue = e.options[e.selectedIndex].value;
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
                    "zip":          $("input#zipCode").val(),
                    "email":        $("input#emailAddress").val(),
                    "phone":        $("input#phoneNumber").val(),
                    "isLicensed":   licensed
                },
                success: function(res) {
                    //$("myStatus").show();
                    $("#myStatus").slideToggle(1500);
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-3" role="alert">Successfully added ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("addRehabber").reset();
                    }
                    else if (res === "duplicate") {
                        jQuery("div#myStatus").html('<div class="alert alert-warning mt-lg-4 col-3" role="alert">Duplicate entry for ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("addRehabber").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-3" role="alert">Failed to add ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("addRehabber").reset();
                    }
                }
            });
        });
    });
</script>
<div id="info">
    <form class="mt-3" id="addRehabber" name="addRehabber">
        <div class="row">
            <div class="form-group col-6">
                <label for="firstName" class="align-content-center">Rehabber First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name" required>
                <div class="invalid-feedback">Please provide a first name</div>
            </div>
            <div class="form-group col-6">
                <label for="lastName" class="align-content-center">Rehabber Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
                <div class="invalid-feedback">Please provide a last name</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="streetAddress" class="align-content-center">Rehabber Street Address</label>
                <input type="text" class="form-control" id="streetAddress" placeholder="Street Address" required>
            </div>
            <div class="form-group col-6">
                <label for="cityName" class="align-content-center">Rehabber City</label>
                <input type="text" class="form-control" id="cityName" placeholder="City" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label for="stateName" class="align-content-center">Rehabber State</label>
                <select class="form-control" id="stateName" required>
                    <?php foreach ($states->result() as $row):?>
                        <option value="<?php echo $row->state_id?>"><?php echo $row->state_name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="zipCode" class="align-content-center">Rehabber Zip</label>
                <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" required>
            </div>
            <div class="form-group col-3">
                <label for="emailAddress" class="align-content-center">Rehabber Email</label>
                <input type="email" class="form-control" id="emailAddress" placeholder="email@domain.com" required>
            </div>
            <div class="form-group col-3">
                <label for="phoneNumber" class="align-content-center">Rehabber Phone</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="XXX-XXX-XXXX" required>
            </div>
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="rehabberLicensed" type="checkbox" value="No">
                    Licensed Rehabber?
                </label>
            </div>
        </div>
        <br>
        <div class="row ml-2 mt-4">
            <input type="submit" id="submitButton">
        </div>
    </form>
    <div id="myStatus" > </div>
</div>
</div>