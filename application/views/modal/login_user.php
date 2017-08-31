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
        $("#loginUser").submit(function(event) {
            event.preventDefault();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Authentication/loginUser",
                dataType: 'json',
                data: {
                    "login":    $("input#login").val(),
                    "password": $("input#password").val()
                },
                success: function(res) {
                    if (res === "failure") {
                        jQuery("div#loginStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to login ' + $("input#login").val() + '</div>');
                        document.getElementById("loginUser").reset();
                    }
                    else if (res === "success") {
                        alert('we have success');
                        window.location.reload(false);
                    }
                }
            });
        });
    });
</script>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loginStatus" class="ml-12"> </div>
                <form class="mt-3" id="loginUser" name="loginUser" data-toggle="validator">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="login" class="align-content-center">Login Account</label>
                            <input type="text" class="form-control" id="login" placeholder="registered username or email address" onmouseover="this.focus();"  required>
                            <div class="invalid-feedback">Please provide a login ID</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="password" class="align-content-center">Password</label>
                            <input type="password" class="form-control" id="password"  onmouseover="this.focus();"  required>
                            <div class="invalid-feedback">Please provide a password</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
