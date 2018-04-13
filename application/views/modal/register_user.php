<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/29/17
 * Time: 6:34 PM
 */
?>
<script type="application/javascript">
    $(document).ready(function() {
        $("#registerNewUser").submit(function(event) {
            event.preventDefault();
            jQuery.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>" + "Authentication/createUser",
                dataType: 'json',
                data: {
                    "first":        $("input#firstName").val(),
                    "last":        $("input#lastName").val(),
                    "user":        $("input#userName").val(),
                    "email":        $("input#emailAddress").val(),
                    "password":        $("input#inputPassword").val()
                },
                success: function(res) {
                    if (res === "success") {
                        jQuery("div#createUserStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("registerNewUser").reset();
                    }
                    else if (res === "duplicate") {
                        jQuery("div#createUserStatus").html('<div class="alert alert-warning mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Duplicate entry for ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("registerNewUser").reset();
                    }
                    else {
                        jQuery("div#createUserStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("registerNewUser").reset();
                    }
                }
            });
        });
    });
</script>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="createUserStatus" class="ml-12"> </div>
                <form class="mt-3" id="registerNewUser" name="registerNewUser" data-toggle="validator">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="firstName" class="align-content-center">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Jane/John" onmouseover="this.focus();"  required>
                            <div class="invalid-feedback">Please provide a first name</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="lastName" class="align-content-center">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Doe" onmouseover="this.focus();"  required>
                            <div class="invalid-feedback">Please provide a last name</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="userName" class="align-content-center">User Name</label>
                            <input type="text" class="form-control" id="userName" placeholder="jdoe" onmouseover="this.focus();"  required>
                            <div class="invalid-feedback">Please provide a user name</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="emailAddress" class="align-content-center">Email</label>
                            <input type="email" class="form-control" id="emailAddress" placeholder="email@domain.com" data-error="Bruh, that email address is invalid" onmouseover="this.focus();"  required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="inputPassword" class="align-content-center">Password</label>
                            <input type="password" class="form-control" id="inputPassword" data-minlength="6"  placeholder="Password" onmouseover="this.focus();"  required>
                            <div class="help-block">Minimum of 6 characters</div>
                            <div class="invalid-feedback">Please provide a password</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Submit User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>