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
    <?php
        if (strpos($_SERVER['HTTP_HOST'], 'www') === false && ( $_SERVER['HTTP_HOST'] != "localhost" && $_SERVER['HTTP_HOST'] != "rehab.mycoolmac.net") ){
            $protocol = isset($_SERVER['HTTPS']) && filter_var($_SERVER['HTTPS'], FILTER_VALIDATE_BOOLEAN)
                ? 'https'
                : 'http';
            header(
                "Location: $protocol://www." . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                true,
                301
            );
        }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to NC Wild Life Rehab</title>
    <script type="text/javascript" src="<?php echo base_url('application/js/jquery-3.3.1.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('application/bootstrap-4.0.0-beta-dist/js/bootstrap.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/bootstrap-4.0.0-beta-dist/js/bootstrap-datetimepicker.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/bootstrap-table/bootstrap-table.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/moment.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/fullcalendar.min-3.9.0.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/jquery-ui.min.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/bootstrap-4.0.0-beta-dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/bootstrap-4.0.0-beta-dist/css/bootstrap-datetimepicker.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/fullcalendar-3.9.0.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/bootstrap-table.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/css/font-awesome.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/ncwl.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/jquery-ui.min.css');?>">
</head>
    <body>
        <div class="container-fluid ml-3 mt-1 w-100 mr-2" id="header"> <?php $this->load->view('rehab_header'); ?> </div>
        <div class="container-fluid ml-0 mr-2" id="menuBar"> <?php $this->load->view('rehab_menu'); ?> </div>
        <div id="modal_target"></div>
        <div id="createUserStatus" class="col-12 ml-5"></div>
        <div id="loginStatus" class="col-12 ml-5"></div>
        <div id="myStatus" class="container-fluid ml-2"></div>
        <div class="container-fluid ml-0 mt-2" id="content" style="min-height: 500px; width: 98%">
            <div class="row">
                <div id="carouselMain" class="carousel slide col-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="carouselMain" data-slide-to="0" class="active"></li>
                        <li data-target="carouselMain" data-slide-to="1"></li>
                        <li data-target="carouselMain" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 rounded" style="height: 500px;" src="<?php echo base_url();?>/application/images/squirrel_1.jpg" alt="First Slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Rehabilitation</h3>
                                <p>Taking every opportunity to return wild life to their natural habitats.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 rounded" style="height: 500px;" src="<?php echo base_url();?>/application/images/possum.jpg" alt="First Slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Education</h3>
                                <p>Educating the public on the benefits of wild life and the role they play in our ecosystem.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 rounded" style="height: 500px;" src="<?php echo base_url();?>/application/images/goat.jpg" alt="First Slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Partnership</h3>
                                <p>Working with our peer partners to facilitate support systems and enhance capabilities by sharing knowledge and experience.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselMain" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselMain" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-6">
                    <strong>Welcome to NC Wild Life Rehab</strong><br>
                    Here at NC Wild Life Rehab, we have two main focuses. First, is to save the animal/s. Secondly, is to educate. By
                    educating, we can spread the word of what to do if an injured or orphaned animal is found. Our
                    educational goals and activities include inhouse classes on different topics (what to do if you
                    find a wild baby, squirrel pox, how to become a wildlife rehabilitator, etc,), through volunteering
                    programs here at NC Wild Life Rehab, teaching classes to boy and girl scouts and at animal shelters and at nature
                    centers. NC Wild Life Rehab also educates by posting in closed wildlife groups that contain only licensed wildlife
                    rehabilitators and on NCWR’s personal Facebook page. We always encourage questions and appreciate
                    suggestions from outsiders on topics such as cage building ideas and other random topics. The more
                    we teach and the more we learn, the more we can assist wildlife here and in a broad spectrum.
                    <p><br>
                    <strong>Current activities planned Second half of 2017:</strong>    <br>
                    Iredell Human Society hosted a Wildlife Education Day – July 2017<br>
                    What to do if you find a wildlife baby – inhouse class – August 2017<br>
                    Love your Possums – inhouse class- August 2017<br>
                    How to outsmart wildlife in your home and garden – inhouse class – August 2017<br>
                    From intake to release at NCWR – inhouse class – September 2017<br>
                    Nature Day in Charlotte, NC - October 2017<br>
                    South Mountain’s Nature Day – October 2017<br>
                    </p>


                </div>
            </div>
        </div>
    </body>
</html>