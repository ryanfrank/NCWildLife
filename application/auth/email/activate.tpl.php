<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 4/16/18
 * Time: 10:55 AM
 */
?>

<html>
<body>
<h1><?php echo sprintf(lang('email_activate_heading'), $identity);?></h1>
<p><?php echo sprintf(lang('email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('email_activate_link')));?></p>
</body>
</html>
