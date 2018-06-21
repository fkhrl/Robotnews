<?php
include("cms-admin/class/db_Class.php");
$obj = new db_class();
$table = "newsletter";
if (isset($_POST['subscribe'])) {
    extract($_POST);
    if (!empty($email)) {
        $insert = array('email' => $email, 'date' => date('Y-m-d'));
        if ($obj->insert($table, $insert) == 1) {
//            header('location: index.php');
             echo 'success';
        } else {
            echo 'failed';
        }
    } else {
        echo 'failed';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" type="image/png" href="favicon.png"/>
        <link rel="icon" type="image/png" href="favicon.png"/>
        <title>Robot News</title>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="style/ie.css" type="text/css" media="all">
        <![endif]-->
        <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="style/responsive.css" type="text/css" media="all">
        <!-----calendar/-------->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="calendar/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Orbitron:500' rel='stylesheet' type='text/css'>
        <!--//web-fonts-->
        <!--Calender-->
        <script src="calendar/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="calendar/css/clndr.css" type="text/css" />
        <script src="calendar/js/underscore-min.js"></script>
        <script src= "calendar/js/moment-2.2.1.js"></script>
        <script src="calendar/js/clndr.js"></script>
        <script src="calendar/js/main.js"></script>
        <!-- end calender -->
        <!-- digital clock starts here -->
        <link rel="stylesheet" href="calendar/css/flipclock.css">
        <script src="calendar/js/flipclock.js"></script>	
        <!-- digital clock ends here -->
    </head>
    <body class="wide">
        <!--[if lt IE 8]>
        <div class="sc_infobox sc_infobox_style_error">
        It looks like you're using an old version of Internet Explorer. For the best web site experience, please <a href="http://windows.microsoft.com/en-us/internet-explorer/ie-10-worldwide-languages">update your browser</a> or learn how to <a href="http://browsehappy.com">browse happy</a>!
        </div>
        <![endif]-->
        <div id="page"> 

            <!-- header begin -->
            <header role="banner" class="site-header" id="header">
                <div>
                    <?php
                    include("include/header.php");
                    ?>
                    <!-- /mobile menu --> 
                </div>
                <section class="news-ticker"> 
                    <!-- Recent News slider -->
                    <?php include("include/news_ticker.php"); ?>
                    <!-- /Recent News slider --> 
                </section>
        </div>
    </header>
    <!-- / header  -->
    <div class="right_sidebar" id="main">
        <div class="inner">
            <div class="general_content clearboth">
                <div class="main_content">
                    <div class="content-area" id="primary">
                        <div role="main" class="site-content" id="content"> 

                            <!--slider1-->
                            <div class="block_home_slider style1">
                                <?php include 'include/news_slider.php'; ?>
                            </div>
                            <!-- Recent News -->
                            <div class="home_category_news clearboth">
                                <?php include 'include/topnews.php'; ?>
                            </div>
                            <!-- /end Recent News --> 

                            <!-- Recent News -->
                            <div class="home_category_news clearboth">
                                <?php include 'include/category_news1.php'; ?>
                            </div>
                            <!-- /Recent News --> 

                            <!-- Recent News -->
                            <?php include 'include/category_news2.php'; ?>
                            <!-- /Recent News -->
                            <div class="two_columns_news clearboth"> 

                                <!-- Recent News -->
                                <?php include 'include/single_category_news1.php'; ?>
                                <!-- /Recent News --> 

                                <!-- Recent News -->
                                <?php include 'include/single_category_news2.php'; ?>
                                <!-- / Recent News --> 
                            </div>
                        </div>
                        <!-- /#content --> 
                    </div>
                    <!-- /#primary --> 
                </div>
                <!--/.main_content--> 

                <!-- .main_sidebar -->
                <div role="complementary" class="main_sidebar right_sidebar" id="secondary">
                    <aside class="widget widget_news_combine" id="news-combine-widget-2">
                        <div class="widget_header">
                            <!--<div class="widget_subtitle"><a class="lnk_all_news" href="page-style1.php">All news</a></div>-->
                            <h3 class="widget_title">Main News</h3>
                        </div>
                        <div class="widget_body">
                            <div class="block_news_tabs" id="tabs">
                                <div class="tabs">
                                    <ul>
                                        <li><a href="#tabs1"><span>Latest</span></a></li>
                                        <li><a href="#tabs2"><span>Popular</span></a></li>
                                        <!--<li><a href="#tabs3"><span>Most Commented</span></a></li>-->
                                    </ul>
                                </div>
                                <!-- tab content goes here -->
                                <?php include 'include/latest_news.php'; ?>
                                <!-- tab content goes here -->
                                <?php include 'include/popular_news.php'; ?>
                                <!-- tab content goes here -->
                                
                            </div>
                        </div>
                    </aside>
                    <!--Video Widget End-->
                    <!--Recent Photo-->
                    <aside class="widget widget_recent_blogposts">
                        <?php include 'include/recent_post.php'; ?>
                    </aside>
                    <!--Recent News End-->
                    <!-- Recent photo -->
                    <aside class="widget widget_recent_photos">
                        <?php include 'include/recent_photo.php'; ?>
                    </aside>
                    <!-- newsletter -->
                    <aside class="widget feedburner_subscribe" >
                        <div class="block_newsletter">
                            <div class="widget_header">
                                <h3 class="widget_title">Subscribe To Our Newsletter</h3>
                            </div>
                            <div class="widget_body">
                                <div class="label">Subscribe to our email newsletter.</div>
                                <form method="post" action="">
                                    <div class="field">
                                        <input type="email" placeholder="Enter Your E-mail address" class="w_def_text" title="Enter Your Email Address" name="email">
                                    </div>
                                    <input type="submit" value="Subscribe" name="subscribe" class="button">
                                </form>
                            </div>
                        </div>
                    </aside>

                </div>
                <!-- /.main_sidebar --> 

            </div>
            <!-- /.general_content --> 
        </div>
        <!-- /.inner --> 
    </div>
    <!-- /#main -->

    <footer role="contentinfo" class="site-footer" id="footer">
        <?php
        include("include/footer.php");
        ?>
    </footer>

    <!-- PopUp -->
    <div id="overlay"></div>
    <!-- Login form -->
    <div class="login-popup popUpBlock" >
        <?php include 'login.php'; ?>
    </div>
    <!-- /Login form --> 

    <!-- Registration form -->
    <div class="registration-popup popUpBlock">
        <?php include 'registration.php'; ?>
    </div>
    <!-- /Registration form --> 

    <!-- go Top--> 
    <a id="toTop" href="#"><span></span></a> </div>
<!--page--> 

<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script> 
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript" src="js/jquery.jclock.js"></script> 
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.elastislide.js"></script> 

<script type="text/javascript" src="js/mediaelement.min.js"></script> 
<script type="text/javascript" src="js/lib.js"></script>
</body>
</html> 
