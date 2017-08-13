<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/12/17
 * Time: 6:54 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to NC WildLife Rehab</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/bootstrap/css/bootstrap.min.css');?>">
    <script type="text/javascript" src="<?php echo base_url('application/bootstrap/js/jquery-3.2.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/popper.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/bootstrap/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/rehab.js');?>"></script>
</head>
<body>
<div class="container-fluid mt-2 mb-3" style="width: 98%;" id="header">
    <div class="row align-items-center w-100">
        <div class="col-lg-auto w-100">
            <div class="jumbotron jumbo-fluid rounded">
                <h1 class="display-3 align-center">NC WildLife</h1>
            </div>
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="intakeMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Intake
                    </button>
                    <div class="dropdown-menu" aria-labelledby="intakeMenuButton">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Intake/add')">Add Information</a>
                        <a class="dropdown-item" href="#">Update Information</a>
                        <a class="dropdown-item" href="#">Inventory Update</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="reportMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reports
                    </button>
                    <div class="dropdown-menu" aria-labelledby="reportMenuButton">
                        <a class="dropdown-item" href="#">Current Activity</a>
                        <a class="dropdown-item" href="#">Year to date</a>
                        <a class="dropdown-item" href="#">Inventory</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="inventoryMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inventory
                    </button>
                    <div class="dropdown-menu" aria-labelledby="inventoryMenuButton">
                        <a class="dropdown-item" href="#">Inventory Search</a>
                        <a class="dropdown-item" href="#">Update Inventory</a>
                        <a class="dropdown-item" href="#">Add New Inventory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-md-2 ml-2 border border-dark rounded" id="content" style="min-height: 500px; width: 98%"></div>
</body>
</html>