<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2019-01-12
 * Time: 19:14
 */
?>
<script type="text/template" id="ncwr-template">
    <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
        <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
            <li>
                <div class="qq-progress-bar-container-selector">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                <span class="qq-upload-size-selector qq-upload-size"></span>

            </li>
        </ul>
    </div>
</script>
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
                var userImage = "<?php echo base_url(); ?>" + "application/" + myUser.userImage;
                createdDate = moment.unix(myUser.created_on).format('MM/DD/YYYY');
                lastLogin = moment.unix(myUser.last_login).format('MM/DD/YYYY');
                myTable = '<div class="container col-12"><div class="row col-12">';
                myTable += '<table class="table table-responsive-xl">';
                myTable += '<thead><tr><th>'+ myUser.first_name + ' ' + myUser.last_name + ' (' + myUser.id + ')</th><th>Current Information</th><th></th><th></th></tr></thead><tbody>';
                myTable += '<tr><td>User Name</td><td>' + myUser.username + '</td><td>No-Show Count</td><td><input type="text" id="noShowCount" size="1" style="border: none;" value='+ myUser.noShow +' /><button type="button" id="resetNoShow" class="btn btn-outline-primary btn-sm ml-5">Reset Count</button></td></tr>';
                myTable += '<tr><td>Email Address</td><td><a id="emailAddress" href="#" data-type="text" data-pk="'+ myUser.id +'" data-title="Enter Email Address">' + myUser.email + '</a></td><td>Schedule Color</td><td><input type="color" id="schedColor" value="' + myUser.color + '" style="border: none; width: 60px; height: 40px;" ></td></tr>';
                myTable += '<tr><td>Phone Number</td><td><a id="phoneNumber" href="#" data-type="text" data-pk="'+ myUser.id +'" data-title="Enter Phone Number">' + formatPhoneNumber(myUser.phone) + '</a></td><td>Schedule Text Color</td><td><input type="color" id="textColor" value="' + myUser.textColor + '" style="border: none; width: 60px; height: 40px;" ></td></tr>';
                myTable += '<tr><td>Password</td><td><button type="button" id="resetPassword" class="btn btn-outline-primary btn-sm">Reset Password</button></td><td></td><td><input class="rounded" type="text" id="sampleTextBox" value=" Here is some text " style="text-align: center; color: ' + myUser.textColor + '; background-color: ' + myUser.color + '; border: none; width: 145px; height: 40px;" ></td></tr>';
                myTable += '<tr><td>Created Date</td><td>' + createdDate + '</td><td colspan="2" rowspan="4" align="center" ><div id="userImage" class="btn btn-outline-primary btn-sm qq-upload-button" style="background-color: #ffffff; color: #000000; width: 200px; height: 200px;border: none;"><img id="myImageFile" src="'+ userImage + '" alt="..." class="rounded" style="width: inherit; height: inherit;"></div><div class="mt-2" id="uploader" style="width: 200px;"></div></td></tr>';
                myTable += '<tr><td>Last Logged In</td><td>' + lastLogin + '</td></tr>';
                myTable += '<tr><td>Failed Login Attempts</td><td>'+ myUser.FailedLogin + '</td></tr>';
                myTable += '<tr><td>Group Membership</td><td><input id="admin" type="checkbox"><label class="ml-2" for="admin">Admin</label><input class="ml-3" id="volunteer" type="checkbox"><label class="ml-2" for="volunteer">Volunteer</label><input class="ml-3" id="members" type="checkbox"><label class="ml-2" for="member">Members</label><input class="ml-3" id="scheduler" type="checkbox"><label class="ml-2" for="scheduler">Scheduler</label></td></tr>';
                myTable += '<tr><td>Active User</td><td><input id="active" type="checkbox"></td><td></td><td><button type="button" id="updateUser" class="btn btn-outline-primary btn-sm">Update User</button></td></tr>';
                myTable += '</tbody></table>';
                myTable += '</div></div>';
                $('.tab-content').html(myTable);
                for ( var i = 0; i < myUser['groups'].length; i++) { $('#' + myUser['groups'][i].name).attr('checked', true); }
                if ( myUser.active === '1' ) { $('#active').attr('checked', true); }
                $(document).ready( function() {
                    $('#phoneNumber').editable({
                        type: 'text',
                        success : function (response, newValue){
                            document.getElementById('phoneNumber').innerHTML = newValue;
                        }
                    });
                    $('#emailAddress').editable({
                        type: 'text',
                        success : function (response, newValue){
                            document.getElementById('emailAddress').innerHTML = newValue;
                        }
                    });
                    var element = document.getElementById('sampleTextBox');
                    $('#schedColor').ColorPicker({
                        onShow: function (colpkr){
                            $(colpkr).fadeIn(500);
                        },
                        onSubmit: function (hsb, hex, rgb, el){
                            $(el).val('#' + hex);
                            element.style.backgroundColor = '#' + hex;
                            $(el).ColorPickerHide();
                        }
                    });
                    $('#textColor').ColorPicker({
                        onShow: function (colpkr){
                            $(colpkr).fadeIn(500);
                        },
                        onSubmit: function (hsb, hex, rgb, el){
                            $(el).val('#' + hex);
                            element.style.color = '#' + hex;
                            $(el).ColorPickerHide();
                        }
                    });
                    var uploader = new qq.FineUploader({
                        button: document.getElementById("userImage"),
                        debug: false,
                        element: document.getElementById("uploader"),
                        template: 'ncwr-template',
                        request: {
                            params: {
                                userId: myUser.id
                            },
                            endpoint: "<?php echo base_url(); ?>" + "Admin/uploadImage"
                        },
                        thumbnails: {
                            placeholders: {
                                waitingPath: 'application/css/fine-uploader/placeholders/waiting-generic.png',
                                notAvailablePath: 'application/css/fine-uploader/placeholders/not_available-generic.png'
                            }
                        },
                        validation: {
                            allowedExtensions: ['jpeg','jpg','png']
                        },
                        callbacks: {
                            onUpload: function (id, name){
                                var myExtension = name.split('.')[1];
                                var newFileName = moment().unix() + '.' + myExtension;
                                uploader.setName(id, newFileName);
                            },
                            onComplete: function (id, name, responseJSON){
                                var myFile = "application/images/Users/" + name;
                                document.getElementById("myImageFile").src=myFile;
                            }
                        }
                    });
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
                    $('#resetNoShow').off('click');
                    $('#resetNoShow').click(function () {
                        var noShowCount = document.getElementById('noShowCount');
                        noShowCount.value = 0;
                        this.innerHTML = "Ready!";
                        this.classList.remove('btn-outline-primary');
                        this.classList.add('btn-outline-success');

                    });
                    $('#updateUser').off('click');
                    $('#updateUser').click(function (e) {
                        e.preventDefault();
                        var groups = {};
                        for ( var i = 0; i < $('input:checkbox').length; i++ ){
                            groups[$('input:checkbox')[i].id] = $('input:checkbox')[i].checked;
                        }
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + "Admin/userUpdate",
                            dataType: 'json',
                            data: {
                                "id": myUser.id,
                                "color": document.getElementById('schedColor').value,
                                "textColor": document.getElementById('textColor').value,
                                "noShow": document.getElementById('noShowCount').value,
                                "email": document.getElementById('emailAddress').innerHTML,
                                "phone": document.getElementById('phoneNumber').innerHTML,
                                "myGroups": groups
                            },
                            success: function (result) {
                                if (result === "success") {
                                    jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 fade show" role="alert">Successfully updated user</div>');
                                    $('#success-alert').fadeOut(3000);
                                } else {
                                    jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 fade show" role="alert">Unable to update user</div>');
                                    $('#error-alert').fadeOut(5000);
                                }
                            }
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
            <div class="list-group " id="user-list" role="tablist" style="max-height: 550px; margin-bottom: 10px; overflow:scroll; border: 1px solid darkgrey; box-shadow: 0 0 40px lightgrey;" >
                <?php foreach ($users->result() as $row):?>
                    <a class="list-group-item list-group-item-action" id="<?php echo $row->id; ?>" data-toggle="list" href="#" role="tab" aria-controls="userName"><?php echo $row->name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-10">
            <div class="container rounded col-12" style="min-height: 525px;  border: 1px solid darkgrey; border-radius: 7px; box-shadow: 0 0 40px lightgrey;">
                <div class="row col-12">
                    <div class="tab-content col-12" id="tabContent">
                        Some more text
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
                <h6 class="ml-3 col-6 modal-title text-muted text-center" id="resetPasswordLabel">Reset Password</h5>
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
