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
    <script type="text/javascript" src="<?php echo base_url('application/js/jquery-3.2.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/popper.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/bootstrap/js/bootstrap.min.js');?>"></script>
    <script>
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown()
        });
    </script>

</head>
<body>
<div class="container w-100 h-100 mt-1 border border-primary" id="header">
    <div class="row align-items-center w-100">
        <div class="col-lg-auto w-100">
            <div class="jumbotron jumbo-fluid rounded">
                <h1 class="display-3">NC WildLife</h1>
            </div>
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
        </div>
    </div>
</div>
</body>
</html>