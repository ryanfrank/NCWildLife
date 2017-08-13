<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 12:45 PM
 */

?>

<form class="mt-3">
    <div class="row">
        <div class="form-group col-3">
            <label for="speciesSelection" class="align-content-center">Species</label>
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


</form>