<?php
include("cms-admin/class/db_Class.php");
$obj = new db_class();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" type="image/png" href="<?php echo $obj->baseUrlF();?>favicon.png"/>
        <title>Robot News</title>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="style/ie.css" type="text/css" media="all">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $obj->baseUrlF();?>style/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo $obj->baseUrlF();?>style/responsive.css" type="text/css" media="all">
        <!-----calendar/-------->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="<?php echo $obj->baseUrlF();?>calendar/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Orbitron:500' rel='stylesheet' type='text/css'>
        <!--//web-fonts-->
        <!--Calender-->
        <script src="<?php echo $obj->baseUrlF();?>calendar/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo $obj->baseUrlF();?>calendar/css/clndr.css" type="text/css" />
        <script src="<?php echo $obj->baseUrlF();?>calendar/js/underscore-min.js"></script>
        <script src= "<?php echo $obj->baseUrlF();?>calendar/js/moment-2.2.1.js"></script>
        <script src="<?php echo $obj->baseUrlF();?>calendar/js/clndr.js"></script>
        <script src="<?php echo $obj->baseUrlF();?>calendar/js/main.js"></script>
        <!-- end calender -->
        <!-- digital clock starts here -->
        <link rel="stylesheet" href="<?php echo $obj->baseUrlF();?>calendar/css/flipclock.css">
        <script src="<?php echo $obj->baseUrlF();?>calendar/js/flipclock.js"></script>	
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
                            <?php
                              $newscategory = $obj->FlyQuery("SELECT name FROM category WHERE id='".$_GET['cid']."'");
                            ?>

                            <ul class="breadcrumbs">
                                <li class="home"><a href="index.php">Home</a></li>
                                <li class="current" style="font-size: 11px;"><?php echo $newscategory[0]->name; ?></li>
                                
                            </ul>
                            <section id="news_style1_body" class="news_body"> 

                                <?php 
                                $sqlcategory=$obj->FlyQuery("SELECT 
                                c.`id` as cid,
                                c.`name`,
                                cn.id,
                                cn.news_headding,
                                cn.news_thumble,
                                cn.news_short_details,
                                cn.news_date_time,
                                r.name as reporter
                                FROM `category` as c 
                                INNER JOIN compose_news as cn ON cn.select_category_news=c.`id` 
                                INNER JOIN reporter as r ON r.id=cn.reporter
                                WHERE 
                                c.`id`='".$_GET['cid']."' ORDER BY id DESC LIMIT 6");
                                
                                if(!empty($sqlcategory))
                                {
                                    foreach ($sqlcategory as $category):
                                ?>

                                <article>
                                    <div class="pic"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $category->id;?>/<?php echo $obj->CleanParam($category->news_headding); ?>" class="w_hover img-link img-wrap"><img src="<?php echo $obj->baseUrlF();?>news_thumble/<?= $category->news_thumble ?>"  alt="" > <span class="link-icon"></span> </a> </div>
                                    <h3><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $category->id;?>/<?php echo $obj->CleanParam($category->news_headding); ?>"><?php echo html_entity_decode($category->news_headding); ?></a></h3>
                                    <ul class="icons">
                                        <li><a href="#" class="post_date"><?php echo $category->news_date_time; ?></a></li>
                                        <li><a href="#" class="post_views"><?php echo $category->reporter; ?></a></li>
                                        
                                    </ul>
                                    <div class="text"><?php echo html_entity_decode($category->news_short_details); ?></div>
                                </article>
                                
                                <?php 
                                endforeach;
                                }
                                
                                ?>

                                <div id="nav_pages" class="nav_pages">
                                    <div class="prev_first"></div>
                                    <a href="#" class="next">Next</a>
                                    <div class="pages">
                                        <ul>
                                            <li class="current"><a href="#" title="1">1</a></li>
                                            <li><a href="#" title="2">2</a></li>
                                            <li><a href="#" title="2">3</a></li>
                                            <li><a href="#" title="2">4</a></li>
                                            <li><a href="#" title="2">5</a></li>
                                        </ul>
                                    </div>
                                    <div class="page_x_of_y">Page <span>1</span> of <span>5</span></div>
                                </div>

                            </section>
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
                            <div class="widget_subtitle"><a class="lnk_all_news" href="page-style1.php">All news</a></div>
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
                                </div><!-- tab content goes here -->
                                <?php include 'include/latest_news.php'; ?>
                                <!-- tab content goes here -->
                                <?php include 'include/popular_news.php'; ?>
                                
                            </div>
                        </div>
                    </aside>
                    
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
                                <form target="_blank" method="post" action="">
                                    <div class="field">
                                        <input type="text" placeholder="Enter Your E-mail address" class="w_def_text" title="Enter Your Email Address" name="email">
                                    </div>
                                    <input type="submit" value="Subscribe" class="button">
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
        <div class="popup"> <a class="close" href="#">×</a>
            <div class="content">
                <div class="title">Authorization</div>
                <div class="form">
                    <form name="login_form" method="post">
                        <div class="col1">
                            <label for="log">Login</label>
                            <div class="field">
                                <input type="text" id="log" name="log">
                            </div>
                        </div>
                        <div class="col2">
                            <label for="pwd">Password</label>
                            <div class="field">
                                <input type="password" id="pwd" name="pwd">
                            </div>
                        </div>
                        <div class="extra-col">
                            <ul>
                                <li><a class="register-redirect" href="#">Registration</a></li>
                            </ul>
                        </div>
                        <div class="column button">
                            <input type="hidden" value="" name="redirect_to">
                            <a class="enter" href="#"><span>Login</span></a>
                            <div class="remember">
                                <input type="checkbox" value="forever" id="rememberme" name="rememberme">
                                <label for="rememberme">Remember me</label>
                            </div>
                        </div>
                        <div class="soc-login">
                            <div class="section-title">Enter with social networking</div>
                            <div class="section-subtitle">Unde omnis iste natus error sit voluptatem.</div>
                            <ul class="soc-login-links">
                                <li class="tw"><a href="#"><em></em><span>With Twitter</span></a></li>
                                <li class="fb"><a href="#"><em></em><span>Connect</span></a></li>
                                <li class="gp"><a href="#"><em></em><span>With Google +</span></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login form --> 
    <!-- Registration form -->
    <div class="registration-popup popUpBlock">
        <div class="popup"> <a class="close" href="#">×</a>
            <div class="content">
                <div class="title">Registration</div>
                <div class="form">
                    <form name="registration_form" method="post">
                        <div class="col1">
                            <div class="field">
                                <div class="label-wrap">
                                    <label class="required" for="registration_form_username">Name</label>
                                </div>
                                <div class="input-wrap">
                                    <input type="text" id="registration_form_username" name="registration_form_username">
                                </div>
                            </div>
                        </div>
                        <div class="col2">
                            <div class="field">
                                <div class="label-wrap">
                                    <label class="required" for="registration_form_email">Email</label>
                                </div>
                                <div class="input-wrap">
                                    <input type="text" id="registration_form_email" name="registration_form_email">
                                </div>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="field">
                                <div class="label-wrap">
                                    <label class="required" for="registration_form_pwd1">Password</label>
                                </div>
                                <div class="input-wrap">
                                    <input type="password" id="registration_form_pwd1" name="registration_form_pwd1">
                                </div>
                            </div>
                        </div>
                        <div class="col2">
                            <div class="field">
                                <div class="label-wrap">
                                    <label class="required" for="registration_form_pwd2">Confirm Password</label>
                                </div>
                                <div class="input-wrap">
                                    <input type="password" id="registration_form_pwd2" name="registration_form_pwd2">
                                </div>
                            </div>
                        </div>
                        <div class="extra-col">
                            <ul>
                                <li><a class="autorization-redirect" href="#">Autorization</a></li>
                            </ul>
                        </div>
                        <div class="column button"> <a class="enter" href="#"><span>Register</span></a>
                            <div class="notice">* All fields required</div>
                        </div>
                        <div class="result sc_infobox"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Registration form --> 

    <!-- go Top--> 
    <a id="toTop" href="#"><span></span></a> </div>
<!--page--> 

<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery-ui-1.9.2.custom.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/superfish.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery.jclock.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery.flexslider-min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery.jcarousel.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/jquery.elastislide.js"></script> 
<!--<script type="text/javascript" src="js/googlemap_init.js"></script>--> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/mediaelement.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF();?>js/lib.js"></script>
</body>
</html> 
