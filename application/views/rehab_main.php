<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/12/17
 * Time: 6:54 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to NC WildLife Rehab</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/bootstrap/css/bootstrap.min.css');?>">

</head>
<div class="container-fluid">
    In a container now...
    <div class="row">
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-light">Light</button>
        <button type="button" class="btn btn-dark">Dark</button>

        <button type="button" class="btn btn-link">Link</button>
        <div class="col-lg-9">
            In the main DIV
            <div class="col-8 col-sm-8">
                Inside small DIV
            </div>
        </div>
    </div>
</div>

</body>
</html>