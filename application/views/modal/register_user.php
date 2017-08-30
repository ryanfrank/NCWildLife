<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/29/17
 * Time: 6:34 PM
 */
?>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="mt-3" id="registerNewuser" name="registerNewUser" data-toggle="validator" role="form">
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
                            <label for="inputPassword" class="align-content-center">Password</label>
                            <input type="password" class="form-control" id="inputPassword" data-minlength="6"  placeholder="Password" onmouseover="this.focus();"  required>
                            <div class="help-block">Minimum of 6 characters</div>
                            <div class="invalid-feedback">Please provide a password</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="inputPasswordConfirm" class="align-content-center">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm"  data-match="#inputPassword"  data-match-error="Sorry, passwords do not match" placeholder="Confirm" onmouseover="this.focus();"  required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>

