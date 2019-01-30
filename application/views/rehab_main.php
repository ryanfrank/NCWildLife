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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="fb:app_id" content="274370306563906" />
    <title>NC Wild Life Rehab</title>
    <script type="text/javascript" src="<?php echo base_url('application/js/jquery-3.3.1.min.js');?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/fullcalendar.min-3.9.0.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/bootstrap-editable.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/colorpicker.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/fine-uploader.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/js/modernizr.custom-orig.js');?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/ncwl.css');?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/fullcalendar-3.9.0.css');?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/bootstrap-editable.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/colorpicker.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('application/css/fine-uploader/fine-uploader.min.css');?>">

</head>
    <body>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '<?php echo $facebook->app_id; ?>',
                    xfbml      : true,
                    version    : 'v3.2'
                });
                facebookPageId = '<?php echo $facebook->page_id; ?>';
                facebookAuthToken = '<?php echo $facebook->access_token; ?>';
                FB.api('/' + facebookPageId + '',{fields:'posts.limit(4){id,message,full_picture,picture,shares,created_time,from,link,permalink_url,name}',access_token:''+ facebookAuthToken +''} , function(response){
                    fbHTML = '<div class="stage"><ul class="stage">';
                    for ( var i = 0; i < response.posts.data.length; i++ ){
                        fbHTML += '<li class="post">';
                        fbHTML += '     <div class="item">';
                        fbHTML += '         <div class="picture" style="background-image: url('+ response.posts.data[i].full_picture +');"></div>';
                        fbHTML += '         <div class="container info text-justify" >';
                        fbHTML += '             <p class="ml-1 mr-1 text-justify"><br />'+ response.posts.data[i].message + '</p>';
                        fbHTML += '         </div>';
                        fbHTML += '     </div>';
                        fbHTML += '</li>';
                    }
                    fbHTML += '</ul></div>';
                    $('#fbFeed').html(fbHTML);
                });
                FB.AppEvents.logPageView();
            };
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="container-fluid mt-1 w-100 bg-light" id="header" style="font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;"><?php $this->load->view('rehab_header');?> </div>
        <div class="container-fluid col-12 bg-light border-bottom-2" style="border-bottom: 1px solid darkgrey; box-shadow: 0px 5px 10px -1px lightgrey;font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;" id="menuBar">
            <div class="row col-12"><?php $this->load->view('rehab_menu');?></div>
        </div>
        <div id="createUserStatus" class="col-12 ml-5" style="font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;"></div>
        <div id="updateStatus" class="container-fluid ml-5" style="font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;"></div>
        <div class="container-fluid ml-1 mt-4 mb-5" id="content" style="min-height: 600px; width: 98%;font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;">
            <div class="alert col-6 alert-light text-center" role="alert"><h6>Hover over each image to view story</h6></div>
            <div class="row col-12">
                <div class="col-6 text-justify" id="fbFeed" style="font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;"></div>
                <div class="col-6 text-justify" id="fbStory">
                    <strong style="font-weight: 500;font-size: 24px;">Welcome to NC Wild Life Rehab</strong><br>
                    <div style="font-size: 16px;">Here at NC Wild Life Rehab, we have two main focuses. First, is to save the animals. Secondly, is to educate. By
                    educating, we can spread the word of what to do if an injured or orphaned animal is found. Our
                    educational goals and activities include inhouse classes on different topics (what to do if you
                    find a wild baby, squirrel pox, how to become a wildlife rehabilitator, etc,), through volunteering
                    programs here at NC Wild Life Rehab, teaching classes to boy and girl scouts and at animal shelters and at nature
                    centers. NC Wild Life Rehab also educates by posting in closed wildlife groups that contain only licensed wildlife
                    rehabilitators and on NCWR’s personal Facebook page. We always encourage questions and appreciate
                    suggestions from outsiders on topics such as cage building ideas and other random topics. The more
                    we teach and the more we learn, the more we can assist wildlife here and in a broad spectrum.</div>
                    <p><br>
                    <strong style="font-weight: 500;font-size: 24px;">Current activities planned Second half of 2017:</strong><br>
                    <div style="font-size: 16px;">
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
        </div>
        <div class="container-fluid col-12 bg-light" style="min-height: 30vh; border-top: 1px solid darkgrey; box-shadow: 0 -5px 10px -1px lightgrey;font-family: 'Montserrat', sans-serif; font-style: normal; font-weight: 300; font-size: 15px;" id="footer">
            <div class="row col-12"><?php $this->load->view('rehab_footer');?></div>
        </div>
    </body>
</html>