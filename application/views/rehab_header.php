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
<div class="row border ml-1 mt-1 w-100">
    <div class="col align-self-start text-left font-italic">
        <?php echo date('l jS \of F Y'); ?>
    </div>
    <div class="col align-self-end text-right font-italic">
        <?php
            if (!$this->ion_auth->logged_in()){
        ?>
                Welcome Guest!  Click here to
                    <a class="text-success" data-toggle="modal" data-target="#registerModal" onclick="get_modal('register');">register</a>
                or
                    <a class="text-success" data-toggle="modal" data-target="#loginModal" onclick="get_modal('login');">login</a>.
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
<div id="modal_target"></div>