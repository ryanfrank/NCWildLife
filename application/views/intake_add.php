<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 12:45 PM
 */

?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#samaritan_submit").click(function(){
            var firstName = $("#firstName").val();
            var base_url= 'http://rehab.mycoolmac.net/';
            var url = base_url + '/Intake/addSamaritan';
            $.ajax({
                type : 'POST',
                dataType: 'json',
                url : url,
                data :'firstName=' + firstName ,
                success: function(data){
                    msg= eval(data);
                    amount= msg.amount;
                    alert(amount);
                }
            });
        });
    });
</script>
<form class="mt-3" id="goodSamaritanForm" action="" method="post">
    <div class="row">
        <div class="form-group col-3">
            <label for="speciesSelection" class="align-content-center">Species Released</label>
            <select class="form-control" id="speciesSelection">
                <?php
                    foreach ($species->result() as $row)
                    {
                        print "<option>" . $row->species_name . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-3">
            <label for="ageSelection" class="align-content-center">Age</label>
            <select class="form-control" id="ageSelection">
                <?php
                foreach ($ages->result() as $row)
                {
                    print "<option>" . $row->ages_description . "</option>";
                }
                ?>
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="firstName" class="align-content-center">Good Samaritan First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="First Name">
        </div>
        <div class="form-group col-6">
            <label for="lastName" class="align-content-center">Good Samaritan Last Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Last Name">
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
        <input type="submit" name="submit_samaritan" value="Submit Samaritan Information" id="samaritan_submit">
    </div>
</form>