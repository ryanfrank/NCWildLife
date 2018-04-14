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
        $('#clock').html(moment().format('dddd MMM. D, YYYY [at] h:mm A z'));
    }
    setInterval(update,250);
<?php
    if ( !$this->ion_auth->logged_in() ) { ?>
        $( function() {
            var dialog,
                // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                name = $( "#name" ),
                email = $( "#email" ),
                password = $( "#password" ),
                allFields = $( [] ).add( name ).add( email ).add( password ),
                tips = $( ".validateTips" );

            function updateTips( t ) {
                tips
                    .text( t )
                    .addClass( "ui-state-highlight" );
                setTimeout(function() {
                    tips.removeClass( "ui-state-highlight", 1500 );
                }, 500 );
            }

            function checkLength( o, n, min, max ) {
                if ( o.val().length > max || o.val().length < min ) {
                    o.addClass( "ui-state-error" );
                    if ( o.val().length > 0 && o.val().length < min )
                    {
                        updateTips( n + " must be at least " + min + " characters.");
                        return false;
                    }
                    else if ( o.val().length > max )
                    {
                        updateTips( n + " cannot be greater than " + max + " characters.");
                        return false;
                    }
                    else if ( !o.val() )
                    {
                        updateTips( n + " is required ");
                        return false;
                    }
                } else {
                    return true;
                }
            }

            function checkRegexp( o, regexp, n ) {
                if ( !( regexp.test( o.val() ) ) ) {
                    o.addClass( "ui-state-error" );
                    updateTips( n );
                    return false;
                } else {
                    return true;
                }
            }

            function login() {
                event.preventDefault();

                var valid           = true;
                var loginID         = $("input#login");
                var password        = $("input#password");

                allFields.removeClass( "ui-state-error" );
                valid = valid && checkLength( loginID, "Login Name", 3, 80 );
                valid = valid && checkLength( password, "Password", 3, 16 );

                if ( valid ) {
                    jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>" + "Authentication/loginUser",
                        dataType: 'json',
                        data: {
                            "login": loginID.val(),
                            "password": password.val()
                        },
                        success: function (res) {
                            if (res === "failure") {
                                jQuery("div#loginStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to login ' + $("input#login").val() + '</div>');
                                document.getElementById("loginUser").reset();
                            }
                            else if (res === "success") {
                                window.location.reload(false);
                            }
                        }
                    });
                }
            }

            function register() {
                event.preventDefault();
                var valid           = true;
                var emailAddress    = $("input#emailAddress");
                var password        = $("input#inputPassword");
                var userName        = $("input#userName");
                var firstName       = $("input#firstName");
                var lastName        = $("input#lastName");

                allFields.removeClass( "ui-state-error" );
                valid = valid && checkLength( userName, "User Name", 3, 16 );
                valid = valid && checkLength( firstName, "First Name", 3, 16 );
                valid = valid && checkLength( lastName, "Last Name", 3, 16 );
                valid = valid && checkRegexp( emailAddress, emailRegex, "email: e.g. user@domain.com" );
                valid = valid && checkLength( password, "Password", 6, 16 );

                if ( valid ) {
                    jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>" + "Authentication/createUser",
                        dataType: 'json',
                        data: {
                            "first": firstName.val(),
                            "last": lastName.val(),
                            "user": userName.val(),
                            "email": emailAddress.val(),
                            "password": password.val()
                        },
                        success: function (res) {
                            if (res === "success") {
                                jQuery("div#createUserStatus").html('<div class="alert alert-success mt-lg-2 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added ' + firstName.val() + ' ' + lastName.val() + '</div>');
                                document.getElementById("registerNewUser").reset();
                                registerDialog.dialog("close");
                            }
                            else {
                                jQuery("div#createUserStatus").html('<div class="alert alert-danger mt-lg-2 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add ' + firstName.val()+ ' ' + lastName.val() + '</div>');
                                document.getElementById("registerNewUser").reset();
                                registerDialog.dialog("close");
                            }
                        }
                    });
                }
            }

            loginDialog = $( "#loginUser" ).dialog({
                autoOpen: false,
                height: 375,
                width: 325,
                modal: true,
                closeOnEscape: true,
                title: "User Login",
                buttons: {
                    "Login": login,
                    Cancel: function() {
                        loginDialog.dialog( "close" );
                    }
                },
                close: function() {
                    document.getElementById("loginUser").reset();
                    allFields.removeClass( "ui-state-error" );
                }
            });

            registerDialog = $( "#registerNewUser" ).dialog({
                autoOpen: false,
                height: 650,
                width: 425,
                modal: true,
                closeOnEscape: true,
                title: "Register New User",
                buttons: {
                    "Register": register,
                    Cancel: function() {
                        registerDialog.dialog( "close" );
                    }
                },
                close: function() {
                    document.getElementById("registerNewUser").reset();
                    allFields.removeClass( "ui-state-error" );
                }
            });

            $( "#login-user" ).on( "click", function() {
                loginDialog.dialog( "open" );
            });
            $( "#register-user" ).on( "click", function() {
                registerDialog.dialog( "open" );
            });
        });
    <?php } ?>
</script>

<div class="row mr-3">
    <div class="col align-self-start text-left font-italic" id="clock"></div>
    <div class="col align-self-end text-right font-italic">
        <?php
            if (!$this->ion_auth->logged_in()){
        ?>
                Welcome Guest!  Click here to
                    <a class="text-success" data-target="#registerModal" id="register-user">register</a>
                or
                    <a class="text-success"  data-target="#myStatus" id="login-user">login</a>.
        <?php
            }
            else {
                $user = $this->ion_auth->user()->row();
                $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
            ?>
                Hello! <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> (
                <?php
                    $num_groups = count($user_groups);
                    if ( $num_groups >= 1 ) {
                        $itteration = 1;
                        foreach ($user_groups as $group) {
                            echo $group->name;
                            if ( $itteration != $num_groups )
                            {
                                echo ",";
                            }
                            $itteration++;
                        }
                    }
                ?>
                )
                <a href="Authentication/logoutUser">Logout</a>
            <?php
            }
        ?>
    </div>
</div>
<div id="loginModal" hidden>
    <form class="mt-3" id="loginUser" name="loginUser">
        <p class="validateTips"></p>
        <div class="row">
            <div class="form-group col-10">
                <label for="login" class="align-content-center">Email Address</label>
                <input type="text" class="form-control text ui-widget-content ui-corner-all" id="login" placeholder="registered email address" onmouseover="this.focus();" >
                <div class="invalid-feedback">Please provide a login ID</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-10">
                <label for="password" class="align-content-center">Password</label>
                <input type="password" class="form-control text ui-widget-content ui-corner-all" id="password"  onmouseover="this.focus();">
                <div class="invalid-feedback">Please provide a password</div>
            </div>
        </div>
    </form>
</div>

<div  id="registerModal" hidden>
    <form class="mt-3" id="registerNewUser" name="registerNewUser" >
        <p class="validateTips"></p>
        <div class="row">
            <div class="form-group col-6">
                <label for="userName" class="align-content-center">User Name</label>
                <input type="text" class="form-control" id="userName" placeholder="jdoe" onmouseover="this.focus();"  required>
                <div class="invalid-feedback">Please provide a user name</div>
            </div>
        </div>
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
    </form>
</div>

<div class="row mb-0">
    <div class="col-2"></div>
    <div class="text-center col-8">
        <img src="<?php echo base_url();?>/application/images/logo_3.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <div class="col-2"></div>
</div>