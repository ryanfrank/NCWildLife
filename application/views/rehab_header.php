<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/29/17
 * Time: 5:42 PM
 */
?>
<script type="text/javascript">
    function get_modal(type){
        $.ajax({
            type    : 'POST',
            url     : '<?php base_url() ?>Authentication/' + type + '_user',
            cache   : false,
            success : function(data){
                if(data){
                    $('#modal_target').html(data);

                    //This shows the modal
                    $('#' + type + 'Modal').modal();
                }
            }
        });
    }
</script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
<script>
    $(document).ready(function() {
        $('#registerNewuser').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                password: {
                    validators: {
                        identical: {
                            field: 'inputPassword',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        identical: {
                            field: 'inputPasswordConfirm',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }
            }
        });
    });
</script>

<div class="row border rounded ml-1 mr-1 mt-1" style="width: 100%; background-color: #686868 ">
    <div class="col align-self-start text-left font-italic text-white">
        <?php echo date('l jS \of F Y'); ?>
    </div>

    <div class="col align-self-end text-right text-white">
        <?php
            if (!$this->ion_auth->logged_in()){
        ?>
                Welcome Guest!  Click here to
                    <a class="text-success" data-toggle="modal" data-target="#registerModal" onclick="get_modal('register');">register</a>
                or
                    <a class="text-success" data-toggle="modal" data-target="#loginModal" onclick="get_modal('login');">login</a>.
        <?php
            }
        ?>
    </div>
</div>
<div id="modal_target"></div>