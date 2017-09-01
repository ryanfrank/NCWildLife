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
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/bootstrap/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/ncwl.css');?>">
    <script type="text/javascript" src="<?php echo base_url('application/js/jquery-3.2.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/popper.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/bootstrap/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/rehab.js');?>"></script>
</head>
<body>
<div class="container-fluid" id="header">
    <?php $this->load->view('rehab_header'); ?>
</div>
<div class="container-fluid mt-2 mb-3" style="width: 98%;" id="logo">
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
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Intake/add_good_samaritan')">Add Good Samaritan</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Intake/intake_animal')">Intake Animal</a>
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
                <?php
                    if ( $this->ion_auth->logged_in() ){ ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="reportMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Charts
                            </button>
                            <div class="dropdown-menu" aria-labelledby="reportMenuButton">
                                <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/squirrelChart')">Squirrel Feeding</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/opossumChart')">Opossum Feeding</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/bunnyChart')">Bunny Feeding</a>
                            </div>
                        </div>
                    <?php } ?>
                <?php
                    if ($this->ion_auth->is_admin()){ ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="inventoryMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administration
                            </button>
                            <div class="dropdown-menu" aria-labelledby="inventoryMenuButton">
                                <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Admin/add_rehabber')">Add Rehabber</a>
                                <a class="dropdown-item" href="#">Add Locations</a>
                                <a class="dropdown-item" href="#">Add Cages</a>
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="myStatus" class="ml-5"> </div>
<div class="container-fluid mt-md-2 ml-2 border border-light rounded" id="content" style="min-height: 500px; width: 98%">
    <div class="card-deck mt-3 mb-3">
        <div class="card col-4" style="width: 20rem;">
            <img class="card-img-top rounded" src="<?php echo base_url();?>/application/images/squirrel_1.jpg" alt="Card image cap" height="450" width="175">
            <div class="card-body">
                <h4 class="card-title">Rehabilitation</h4>
                <p class="card-text">Taking every opportunity to return wild life to their natural habitats.</p>
            </div>
        </div>
        <div class="card col-4" style="width: 20rem;">
            <img class="card-img-top rounded" src="<?php echo base_url();?>/application/images/possum.jpg" alt="Card image cap" height="450" width="175">
            <div class="card-body">
                <h4 class="card-title">Education</h4>
                <p class="card-text">Educating the public on the benefits of wild life and the role they play in our ecosystem.</p>
            </div>
        </div>
        <div class="card col-4" style="width: 20rem;">
            <img class="card-img-top rounded" src="<?php echo base_url();?>/application/images/goat.jpg" alt="Card image cap" height="450" width="175">
            <div class="card-body">
                <h4 class="card-title">Partnership</h4>
                <p class="card-text">Working with our peer partners to facilitate support systems and enhance capabilities by sharing knowledge and experience.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>