<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 9:02 PM
 */
?>

<script type="application/javascript">
    $(document).ready(function() {
        //$("mySubmit").click(function(event) {
        $("#goodSamaritanForm").submit(function(event) {
            event.preventDefault();
            var firstName = $("input#firstName").val();
            var lastName = $("input#lastName").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Intake/addSamaritan",
                dataType: 'json',
                data: { "first": firstName, "last": lastName },
                success: function(res) {
                if (res == "success" ) {
                    //jQuery("div#content").html('<h2 class="display-1">Successfully added ' + firstName + ' ' + lastName + '</h2>');
                    jQuery("div#content").html('<div class="alert alert-success mt-lg-4 col-3" role="alert">Successfully added ' + firstName + ' ' + lastName + '</div>');
                }
                else{
                    jQuery("div#content").html('<div class="alert alert-danger mt-lg-4 col-3" role="alert">Failed to add ' + firstName + ' ' + lastName + '</div>');
                }
            },
                error: function(res) {
                alert('ERROR: ' + res.first);
            }
            });
        });
    });
</script>
<form class="mt-3" id="goodSamaritanForm" name="goodSamaritanForm">
    <div class="row">
        <div class="form-group col-6">
            <label for="firstName" class="align-content-center">Good Samaritan First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="First Name" required>
            <div class="invalid-feedback">Please provide a first name</div>
        </div>
        <div class="form-group col-6">
            <label for="lastName" class="align-content-center">Good Samaritan Last Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
            <div class="invalid-feedback">Please provide a last name</div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="streetAddress" class="align-content-center">Good Samaritan Street Address</label>
            <input type="text" class="form-control" id="streetAddress" placeholder="Street Address">
        </div>
        <div class="form-group col-6">
            <label for="cityName" class="align-content-center">Good Samaritan City</label>
            <input type="text" class="form-control" id="cityName" placeholder="City">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-3">
            <label for="stateName" class="align-content-center">Good Samaritan State</label>
            <select class="form-control" id="stateName">
                <?php
                foreach ($states->result() as $row)
                {
                    print "<option>" . $row->state_name . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group col-3">
            <label for="zipCode" class="align-content-center">Good Samaritan Zip</label>
            <input type="text" class="form-control" id="zipCode" placeholder="Zip Code">
        </div>
        <div class="form-group col-3">
            <label for="emailAddress" class="align-content-center">Good Samaritan Email</label>
            <input type="email" class="form-control" id="emailAddress" placeholder="email@domain.com">
        </div>
        <div class="form-group col-3">
            <label for="phoneNumber" class="align-content-center">Good Samaritan Phone</label>
            <input type="text" class="form-control" id="phoneNumber" placeholder="XXX-XXX-XXXX">
        </div>
        </div>
    <div class="row">

    </div>
    <div class="row ml-2">
        <input type="submit" id="submitButton">
    </div>
</form>