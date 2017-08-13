<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 12:45 PM
 */

?>

<form>
    <div class="form-group">
        <label for="speciesSelection">Species</label>
        <select class="form-control" id="speciesSelection">
            <?php
                foreach ($species->result() as $row)
                {
                    print "<option>" . $row->species_name . "</option>";
                }
            ?>
        </select>
    </div>


</form>