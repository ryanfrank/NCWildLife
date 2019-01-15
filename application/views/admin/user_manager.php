<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2019-01-12
 * Time: 19:14
 */
?>
<script type="application/javascript">
    $('#user-list a').off('click');
    $('#user-list a').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/userDetail",
            dataType: "json",
            data: { "id": this.id },
            success: function (result) {
                var myUser = result;
                createdDate = moment.unix(myUser.created_on).format('MM/DD/YYYY');
                lastLogin = moment.unix(myUser.last_login).format('MM/DD/YYYY');
                myTable = '<div class="container col-12"><div class="row col-12">';
                myTable += '<table class="table table-hover table-responsive-xl">';
                myTable += '<thead><tr><th>'+ myUser.first_name + ' ' + myUser.last_name + ' (' + myUser.id + ')</th><th>Current Information</th></tr></thead><tbody>';
                myTable += '<tr><td>User Name</td><td>' + myUser.username + '</td></tr>';
                myTable += '<tr><td>Email Address</td><td><a id="emailAddress" href="#" data-type="text" data-pk="'+ myUser.id +'" data-title="Enter Email Address">' + myUser.email + '</a></td></tr>';
                myTable += '<tr><td>Phone Number</td><td><a id="phoneNumber" href="#" data-type="text" data-pk="'+ myUser.id +'" data-title="Enter Phone Number">' + formatPhoneNumber(myUser.phone) + '</a></td></tr>';
                myTable += '<tr><td>Password</td><td><button type="button" id="resetPassword" class="btn btn-outline-primary btn-sm">Reset Password</button></td></tr>';
                myTable += '<tr><td>Created Date</td><td>' + createdDate + '</td></tr>';
                myTable += '<tr><td>Last Logged In</td><td>' + lastLogin + '</td></tr>';
                myTable += '<tr><td>Failed Login Attempts</td><td>'+ myUser.FailedLogin + '</td></tr>';
                myTable += '<tr><td>Group Membership</td><td><input id="admin" type="checkbox"><label class="ml-2" for="admin">Admin</label><input class="ml-3" id="volunteer" type="checkbox"><label class="ml-2" for="volunteer">Volunteer</label><input class="ml-3" id="members" type="checkbox"><label class="ml-2" for="member">Members</label></td></tr>';
                myTable += '<tr><td>Active User</td><td><input id="activeCheck" type="checkbox"></td></tr>';
                myTable += '</tbody></table>';
                myTable += '</div></div>';
                $('.tab-content').html(myTable);
                for ( var i = 0; i < myUser['groups'].length; i++) { $('#' + myUser['groups'][i].name).attr('checked', true); }
                if ( myUser.active === '1' ) { $('#activeCheck').attr('checked', true); }
                $(document).ready(function() {
                    $('#phoneNumber').editable();
                    $('#emailAddress').editable();
                });
                $(document).ready( function() {
                    $('#resetPassword').off('click');
                    $('#resetPassword').click(function () {
                        $('#resetPasswordModal').modal('show');
                        $('#resetPasswordModal').submit(function (event) {
                            event.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Admin/changePassword",
                                dataType: 'json',
                                data: {
                                    "id": myUser.id,
                                    "password": document.getElementById("newPassword").value
                                },
                                success: function (result) {
                                    $('#resetPasswordModal').modal('toggle');
                                    if (result === "success") {
                                        jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 fade show" role="alert">Reset users password</div>');
                                        $('#success-alert').fadeOut(3000);
                                    } else {
                                        jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 fade show" role="alert">Unable to reset password</div>');
                                        $('#error-alert').fadeOut(5000);
                                    }
                                }
                            });
                        });
                    });
                });
            }
        });
        $('.tab-content').html("");
    });
</script>
<div class="container-fluid col-12">
    <div class="row col-11 justify-content-md-center">
        <h2 class="text-muted">NC WildLife User Management</h2>
    </div>
</div>
<div class="container-fluid col-12 mt-3">
    <div class="row col-12">
        <div class="col-2">
            <div class="list-group " id="user-list" role="tablist" style="max-height: 525px; margin-bottom: 10px; overflow:scroll; border: 1px solid darkgrey; box-shadow: 0 0 40px lightgrey;" >
                <?php foreach ($users->result() as $row):?>
                    <a class="list-group-item list-group-item-action" id="<?php echo $row->id; ?>" data-toggle="list" href="#" role="tab" aria-controls="userName"><?php echo $row->name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-10">
            <div class="container rounded col-12" style="min-height: 525px;  border: 1px solid darkgrey; border-radius: 7px; box-shadow: 0 0 40px lightgrey;">
                <div class="row col-12">
                    <div class="tab-content col-12" id="tabContent">
                        Here is some text...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content col-6">
            <div class="modal-header text-center align-content-center align-center">
                <h5 class="ml-3 col-6 modal-title text-muted text-center" id="resetPasswordLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="resetPasswordForm" data-toggle="validator" onreset="resetHandler(this.id)">
                    <div class="form-group">
                        <label for="newPassword" class="align-content-center">New Password</label>
                        <input type="password" class="form-control text ui-widget-content ui-corner-all" id="newPassword" onchange="checkLength(this.value, this.id, 8)" onmouseover="this.focus();" required >
                        <div class="invalid-feedback">Please provide a password of at least 8 characters</div>
                        <div class="valid-feedback">Password is valid!</div>
                    </div>
                    <div class="form-group">
                        <label for="confirmNewPassword" class="align-content-center">Re-Enter New Password</label>
                        <input type="password" class="form-control text ui-widget-content ui-corner-all" id="confirmNewPassword" onchange="checkMatch($('#newPassword')[0].value, this.value, this.id)" onmouseover="this.focus();" required>
                        <div class="invalid-feedback">Passwords do not match</div>
                        <div class="valid-feedback">Passwords match!</div>
                    </div>
                    <button type="submit" id="resetPasswordButton" class="btn btn-success pull-right">Reset Password</button>
                    <button type="reset" id="resetPasswordInput" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
