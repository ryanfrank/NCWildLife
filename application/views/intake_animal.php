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
            var injured;
            if( $("#injured").is(':checked') ) { injured = "1"; }
            else { injured = "0"; }
            var fed;
            if( $("#fed").is(':checked') ) { fed = "1"; }
            else { fed = "0"; }
            var e = document.getElementById("intakeSpecies");
            var speciesValue = e.options[e.selectedIndex].value;
            var e = document.getElementById("intakeAge");
            var ageValue = e.options[e.selectedIndex].value;
            var e = document.getElementById("intakeRehabber");
            var rehabberValue = e.options[e.selectedIndex].value;
            alert("Setup variables");
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Intake/intakeAnimal",
                dataType: 'json',
                data: {
                    "intakeDate":       $("input#intakeDate").val(),
                    "intakeWeight":     $("input#intakeWeight").val(),
                    "intakeSpecies":    speciesValue,
                    "intakeAge":        ageValue,
                    "possetionDate":    $("input#intakePossetion").val(),
                    "intakeRehabber":   rehabberValue,
                    "intakeInjured":    injured,
                    "injuryInfo":        $("input#injuryInfo").val(),
                    "isFed":            fed,
                    "foodInfo":         $("input#foodInfo").val(),
                    "foodDelivery":     $("input#foodDelivery").val(),
                    "intakeCondition":  $("input#intakeCondition").val(),
                    "animalName":       $("input#animalName").val()
                },
                success: function(res) {
                    alert("sent data");
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added animal</div>');
                        document.getElementById("intakeAnimal").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add animal</div>');
                        document.getElementById("intakeAnimal").reset();
                    }
                }
            });
            alert("Dropped from Ajax");
        });
    });
</script>
<div id="info">
    <form class="mt-3" id="intakeAnimal" name="intakeAnimal">
        <div class="row">
            <div class="form-group col-4">
                <label for="animalName" class="align-content-center">Animal Name</label>
                <input type="text" class="form-control" id="animalName" placeholder="Some name or identifying descripton" required>
                <div class="invalid-feedback">Please provide a valid name</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label for="intakeDate" class="align-content-center">Intake Date</label>
                <input type="text" class="form-control" id="intakeDate" placeholder="<?php echo $date;?>" value="<?php echo $date;?>" required>
                <div class="invalid-feedback">Please provide a valid date</div>
            </div>
            <div class="form-group col-2">
                <label for="intakeWeight" class="align-content-center">Intake Weight (g)</label>
                <input type="text" class="form-control" id="intakeWeight" placeholder="175" required>
                <div class="invalid-feedback">Please provide a valid weight</div>
            </div>
            <div class="form-group col-2">
                <label for="intakeSpecies" class="align-content-center">Intake Species</label>
                <select class="form-control" id="intakeSpecies" required>
                    <?php foreach ($species->result() as $row):?>
                        <option value="<?php echo $row->species_id?>"><?php echo $row->species_name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-2">
                <label for="intakeAge" class="align-content-center">Intake Age</label>
                <select class="form-control" id="intakeAge" required>
                    <?php foreach ($ages->result() as $row):?>
                        <option value="<?php echo $row->ages_id?>"><?php echo $row->ages_description?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="intakePossetion" class="align-content-center">Intake Possetion Date</label>
                <input type="text" class="form-control" id="intakePossetion" placeholder="<?php echo $date;?>" value="<?php echo $date;?>" required>
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
        <div class="row">
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="fed" type="checkbox" value="No">
                    Has animal been fed?
                </label>
            </div>
            <div class="form-group col-6">
                <label for="foodInfo" class="align-content-center">What has it been fed?</label>
                <input type="text" class="form-control" id="foodInfo" placeholder="Milk (specify type), Formula (specify type), etc...">
            </div>
            <div class="form-group col-3">
                <label for="foodDelivery" class="align-content-center">How was it fed?</label>
                <input type="text" class="form-control" id="foodDelivery" placeholder="Syringe, Bottle, Bowl, etc...">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="intakeCondition" class="align-content-center">Condition of intake?</label>
                <input type="text" class="form-control" id="intakeCondition" placeholder="specific information on intake condition (e.g. dehydration, etc)">
            </div>
        </div>
        <br>
        <div class="row ml-2 mt-4">
            <input type="submit" id="submitButton">
        </div>
    </form>
</div>
