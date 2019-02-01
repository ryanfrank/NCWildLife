<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/29/17
 * Time: 5:42 PM
 */
?>
<script type="text/javascript">
    function update() {
        $('#clock').html(moment().format('dddd MMM. D, YYYY [at] LT'));
    }
    function checkLength(val, id, length){
        element = document.getElementById(id);
        if ( val.length >= length ){
            element.classList.remove('is-invalid');
            element.classList += " is-valid";
        }
        else {
            element.classList.remove('is-valid');
            element.classList += " is-invalid";
        }
    }
    function checkMatch(val, newVal, id){
        element = document.getElementById(id);
        if ( val === newVal ){
            element.classList.remove('is-invalid');
            element.classList += " is-valid";
        }
        else {
            element.classList.remove('is-valid');
            element.classList += " is-invalid";
        }
    }
    function resetHandler(id) {
        var elements = document.getElementById(id).elements;
        for ( var i = 0, element; element = elements[i++]; ){
            myElement = document.getElementById(element.id);
            if ( element.nodeName !== 'BUTTON' ) {
                if (myElement.classList.contains('is-valid')) {
                    myElement.classList.remove('is-valid');
                }
                if (myElement.classList.contains('is-invalid')) {
                    myElement.classList.remove('is-invalid');
                }
            }
        }
    }
    setInterval(update,250);
    <?php
    if (!$this->ion_auth->logged_in()){
    ?>
        function checkEmail(email, id){
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if ( re.test(email) ){
                element = document.getElementById(id);
                element.classList.remove('is-invalid');
                element.classList += " is-valid";
            }
            else {
                element = document.getElementById(id);
                element.classList.remove('is-valid');
                element.classList += " is-invalid";
            }
        }
        $(document).ready( function() {
            $('#login-user').off('click');
            $('#login-user').click(function(){
                $('#loginUserModal').modal('show');
                $('loginUserForm').off('submit');
                $('#loginUserForm').submit( function(event){
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "Authentication/loginUser",
                        dataType: 'json',
                        data: {
                            "login": document.getElementById("login").value,
                            "password": document.getElementById("password").value
                        },
                        success: function (result) {
                            $('#loginUserModal').modal('toggle');
                            if (result === "success") {
                                window.location.reload(false);
                            } else if (result === "tooManyFailed") {
                                document.getElementById("login").value = null;
                                document.getElementById("password").value = null;
                                jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to login: too many failed attempts</div>');
                                $('#error-alert').fadeOut(5000);
                            } else {
                                document.getElementById("login").value = null;
                                document.getElementById("password").value = null;
                                jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to login: Incorrect username or password</div>');
                                $('#error-alert').fadeOut(5000);
                            }
                        }
                    });
                });
            });
            $('#register-user').off('click');
            $('#register-user').click(function(){
                $('#registerUserModal').modal('show');
                $('#registerUserModal').submit( function(event){
                    event.preventDefault();
                    var valid = false;
                    var elements = document.getElementById("registerNewUser").elements;
                    for ( var i = 0, element; element = elements[i++]; ){
                        myElement = document.getElementById(element.id);
                        if ( element.nodeName !== 'BUTTON' ) {
                            if (myElement.classList.contains('is-valid')) {
                                valid = true;
                            } else {
                                myElement.classList += ' is-invalid';
                                valid = false;
                            }
                        }
                    }
                    if ( valid ) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + "Authentication/createUser",
                            dataType: 'json',
                            data: {
                                "first": document.getElementById("firstName").value,
                                "last": document.getElementById("lastName").value,
                                "user": document.getElementById("userName").value,
                                "email": document.getElementById("emailAddress").value,
                                "password": document.getElementById("inputPassword").value
                            },
                            success: function (result) {
                                $('#registerUserModal').modal('toggle');
                                if (result === "success") {
                                    //window.location.reload(false);
                                }
                                else {
                                    document.getElementById("firstName").value = null;
                                    document.getElementById("lastName").value = null;
                                    document.getElementById("userName").value = null;
                                    document.getElementById("emailAddress").value = null;
                                    document.getElementById("inputPassword").value = null;
                                    jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to register user</div>');
                                    $('#error-alert').fadeOut(5000);
                                }
                            }
                        });
                    }
                    else { alert('Something is invalid'); }
                });
            });
        });
    <?php } ?>
    function formatPhoneNumber(phoneNumber) {
        var cleaned = ('' + phoneNumber).replace(/\D/g, '');
        var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
        if (match) {
            return '(' + match[1] + ') ' + match[2] + '-' + match[3];
        }
        return null;
    }
</script>
<nav class="navbar navbar-light navbar-expand-lg"  id="header" style="font-size: 15px;"> 
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <i class="h6" id="clock" style="font-style: normal; font-weight: 300;"></i>
        </li>
    </ul>
    <?php if (!$this->ion_auth->logged_in()){?>
        <ul class="navbar-nav mr-4">
            <li class="nav-item">
                <img class="img-thumbnail mr-2" style="width: 40px; height: 40px;"src="<?php echo $image;?>" />
            </li>
            <li class="nav-item mt-3">
                <i class="mr-2" style="font-style: normal; font-weight: 400;" data-target="#loginUserModal" id="login-user">Login</i>
            </li>
            <li class="nav-item mt-3">
                <i class="mr-2" style="font-style: normal; font-weight: 300;" >/</i>
            </li>
            <li class="nav-item mt-3">
                <i class="mr-2" style="font-style: normal; font-weight: 400;" data-target="#registerUserModal" id="register-user">Register</i>
            </li>
        </ul>
    <?php } else { ?>
        <ul class="navbar-nav mr-4">
            <li class="nav-item">
                <img class="mr-2 rounded" style="width: 35px; height: 35px;" src="<?php echo $user->userImage;?>" />
            </li>
            <li class="nav-item dropdown mt-2">
                <a class="nav-link dropdown-toggle" style="font-style: normal; font-weight: 600;" href="#" id="userProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="userProfile" style="width: 1px !important;">
                    <a class="dropdown-item" style="font-style: normal; font-weight: 300; font-size: 15px;" href="Authentication/logoutUser">Logout</a>
                    <a class="dropdown-item" style="font-style: normal; font-weight: 300; font-size: 15px;" href="javascript:void(0)" onclick="$('#content').load('Admin/manageUsers/Profile')">Profile</a>
                </div>
            </li>
        </ul>
    <?php } ?>
</nav>

<?php
if (!$this->ion_auth->logged_in()){
?>
    <div class="container-fluid">
        <div class="modal fade" id="loginUserModal" tabindex="-1" role="dialog" aria-labelledby="loginUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content col-6">
                    <div class="modal-header text-center align-content-center align-center">
                        <h5 class="ml-3 col-6 modal-title text-muted text-center" id="loginUserLabel">Login User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="loginUserForm" data-toggle="validator">
                            <div class="form-group">
                                <label for="login" class="align-content-center">Email Address</label>
                                <input type="text" class="form-control text ui-widget-content ui-corner-all" id="login" placeholder="registered email address" onmouseover="this.focus();" >
                                <div class="invalid-feedback">Please provide a login ID</div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="align-content-center">Password</label>
                                <input type="password" class="form-control text ui-widget-content ui-corner-all" id="password"  onmouseover="this.focus();">
                                <div class="invalid-feedback">Please provide a password</div>
                            </div>
                            <button type="submit" id="loginUserButton" class="btn btn-success pull-right">Login</button>
                            <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="registerUserModal" tabindex="-1" role="dialog" aria-labelledby="registerUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content col-10">
                    <div class="modal-header text-center align-content-center align-center">
                        <h5 class="ml-3 col-10 modal-title text-muted text-center" id="registerUserLabel">Register New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="mt-3 col-12" id="registerNewUser" name="registerNewUser" onreset="resetHandler(this.id)">
                        <div class="modal-body">
                            <div class="row ml-1 col-12">
                                <div class="form-group col-8">
                                    <label for="userName" class="align-content-center">User Name</label>
                                    <input type="text" class="form-control" id="userName" onchange="checkLength(this.value, this.id, 5)" onmouseover="this.focus();"  >
                                    <div class="invalid-feedback">Please provide a valid user name of 5 characters</div>
                                    <div class="valid-feedback">UserName looks valid!</div>
                                </div>
                            </div>
                            <div class="row ml-1 col-12">
                                <div class="form-group col-8">
                                    <label for="firstName" class="align-content-center">First Name</label>
                                    <input type="text" class="form-control" id="firstName" onchange="checkLength(this.value, this.id, 3)" onmouseover="this.focus();"  >
                                    <div class="invalid-feedback">Please provide a valid first name of 3 characters</div>
                                    <div class="valid-feedback">First name looks valid!</div>
                                </div>
                            </div>
                            <div class="row ml-1 col-12">
                                <div class="form-group col-8">
                                    <label for="lastName" class="align-content-center">Last Name</label>
                                    <input type="text" class="form-control" id="lastName"  onchange="checkLength(this.value, this.id, 3)" onmouseover="this.focus();"  >
                                    <div class="invalid-feedback">Please provide a valid last name of 3 characters</div>
                                    <div class="valid-feedback">Last name looks valid!</div>
                                </div>
                            </div>
                            <div class="row ml-1 col-12">
                                <div class="form-group col-8">
                                    <label for="emailAddress" class="align-content-center">Email</label>
                                    <input type="email" class="form-control" id="emailAddress" placeholder="email@domain.com"  onchange="checkEmail(this.value, this.id)" onmouseover="this.focus();"  >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row ml-1 col-12">
                                <div class="form-group col-8">
                                    <label for="inputPassword" class="align-content-center">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" data-minlength="8"  onchange="checkLength(this.value, this.id, 8)" onmouseover="this.focus();"  >
                                    <div class="invalid-feedback">Please provide a password of at least 8 characters</div>
                                    <div class="valid-feedback">Password is valid!</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row ml-1 col-12">
                                <div class="col-md-12 text-center">
                                    <button type="submit" id="registerUserButton" class="btn btn-success">Register</button>
                                    <button type="reset" id="resetRegistration" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row mb-0" style="height: 60px;">
    <div class="col-2"></div>
    <div class="text-center col-8">
       <!-- <img src="<?php //echo base_url();?>/application/images/logo_3.jpg" class="img-fluid" alt="Responsive image"> -->
    </div>
    <div class="col-2"></div>
</div>