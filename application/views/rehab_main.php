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
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
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