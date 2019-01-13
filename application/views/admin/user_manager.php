<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2019-01-12
 * Time: 19:14
 */
?>
<script type="application/javascript">
    var table = $('#userInformationTable');
    $('#user').off('change');
    $('#user').change(function(){
        myID = this.value;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/userDetail",
            dataType: 'json',
            data: {
                "id" : myID
            },
            success : function(result) {
                myInformation = result[0];
                position = 0;
                var table = document.getElementById("userInformationTable");
                $('#userInformationTable tr').remove();
                Object.keys(result[0]).forEach(function (k){
                    console.log(k + ' - ' + result[0][k]);
                    row = table.insertRow(position);
                    cell1 = row.insertCell(0);
                    cell2 = row.insertCell(1);
                    cell1.innerHTML = k;
                    if ( k === 'created_on' || (k === 'last_login' && result[0][k] !== ' ' ) ) {
                        myDate = new Date(result[0][k]*1000);
                        cell2.innerHTML = myDate;
                    }
                    else if ( k === 'password' ){
                        cell2.innerHTML = "PASSWORD";
                    }
                    else { cell2.innerHTML = result[0][k]; }
                    position++;
                });
            }
        });
    });
</script>
<div class="container-fluid col-12">
    <div class="row col-11 justify-content-md-center">
        <h2 class="text-muted">NC WildLife User Management</h2>
    </div>

    <div class="row col-2">
        <label for="user" class="align-content-center">Select User</label>
        <select class="form-control" id="user" required>
            <option></option>
            <?php foreach ($users->result() as $row):?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>
<div class="container col-8">
    <div class="row mt-5 col-8 justify-content-md-center">
        <div id="userTable" class="col-12 align-center justify-content-md-center">
            <table class="table" id="userInformationTable"></table>
        </div>
    </div>
</div>
