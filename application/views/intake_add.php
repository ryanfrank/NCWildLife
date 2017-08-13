<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 12:45 PM
 */

?>

<form class="mt-3">
    <div class="form-group row">
        <label for="speciesSelection" class="col-sm-2">Species</label>
        <select class="form-control col-sm-3" id="speciesSelection">
            <?php
                foreach ($species->result() as $row)
                {
                    print "<option>" . $row->species_name . "</option>";
                }
            ?>
        </select>
    </div>


</form>