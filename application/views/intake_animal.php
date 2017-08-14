<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/14/17
 * Time: 6:22 PM
 */
?>
<script type="application/javascript">
    $(document).ready(function() {
        $("#intakeAnimal").submit(function(event) {
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
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("intakeAnimal").reset();
                    }
                    else if (res === "duplicate") {
                        jQuery("div#myStatus").html('<div class="alert alert-warning mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Duplicate entry for ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("intakeAnimal").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("intakeAnimal").reset();
                    }
                }
            });
        });
    });
</script>
<div id="info">
    <form class="mt-3" id="intakeAnimal" name="intakeAnimal">
        <div class="row">
            <div class="form-group col-3">
                <label for="intakeDate" class="align-content-center">Intake Date</label>
                <input type="text" class="form-control" id="intakeDate" placeholder="<?php echo $date;?>" value="<?php echo $date;?>" required>
                <div class="invalid-feedback">Please provide a valid date</div>
            </div>
            <div class="form-group col-3">
                <label for="intakeWeight" class="align-content-center">Intake Weight (g)</label>
                <input type="text" class="form-control" id="intakeWeight" placeholder="175" required>
                <div class="invalid-feedback">Please provide a valid weight</div>
            </div>
            <div class="form-group col-3">
                <label for="intakeAge" class="align-content-center">Intake Age</label>
                <select class="form-control" id="intakeAge" required>
                    <?php foreach ($ages->result() as $row):?>
                        <option value="<?php echo $row->ages_id?>"><?php echo $row->ages_description?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="intakePossetion" class="align-content-center">Intake Possetion Date</label>
                <input type="text" class="form-control" id="intakeDate" placeholder="<?php echo $date;?>" value="<?php echo $date;?>" required>
                <div class="invalid-feedback">Please provide a valid date</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label for="intakeRehabber" class="align-content-center">Rehabber Intaking Animal</label>
                <select class="form-control" id="intakeRehabber" required>
                    <?php foreach ($rehabber->result() as $row):?>
                        <option value="<?php echo $row->rehabber_id?>"><?php echo $row->rehabber_first_name . ' ' .$row->rehabber_last_name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="injured" type="checkbox" value="No">
                    Intake Injury?
                </label>
            </div>
            <div class="form-group col-6">
                <label for="injuryInfo" class="align-content-center">Injury Information</label>
                <input type="text" class="form-control" id="injuryInfo" placeholder="Cat attack, dog attack, HBV, etc...">
            </div>
        </div>

        <br>
        <div class="row ml-2 mt-4">
            <input type="submit" id="submitButton">
        </div>
    </form>
</div>
