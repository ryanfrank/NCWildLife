<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/29/17
 * Time: 3:11 PM
 */
?>
<script type="application/javascript">
    $('#user').change(function(){
        var e = document.getElementById("user");
        var userID = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/userData",
            dataType: 'json',
            data: {
                "userID": userID
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
<div class="row">
    <div class="form-group col-3">
        <label for="user" class="align-content-center">User</label>
        <select class="form-control" id="user" required>
            <option></option>
            <?php foreach ($users as $row):?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->first_name . " " . $row->last_name; ?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <label for="firstName" class="align-content-center">User First Name</label>
        <input type="text" class="form-control" id="firstName" placeholder="First Name" onmouseover="this.focus();">
        <div class="invalid-feedback">Please provide a first name</div>
    </div>
    <div class="form-group col-3">
        <label for="lastName" class="align-content-center">User Last Name</label>
        <input type="text" class="form-control" id="lastName" placeholder="Last Name" onmouseover="this.focus();">
        <div class="invalid-feedback">Please provide a last name</div>
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <?php foreach ($groups as $group ):?>
        <div class="input-group">
          <span class="input-group-addon">
            <input type="checkbox" aria-label="Checkbox for following text input">
          </span>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="<?php echo $group['description'];?>">
        </div>
        <?php  endforeach; ?>
    </div>
</div>
