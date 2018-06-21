<?php
include("cms-admin/class/db_Class.php");
$obj = new db_class();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" type="image/png" href="<?php echo $obj->baseUrlF(); ?>favicon.png"/>
        <title>Robot News</title>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="style/ie.css" type="text/css" media="all">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $obj->baseUrlF(); ?>style/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo $obj->baseUrlF(); ?>style/responsive.css" type="text/css" media="all">

        <!--custom share-->
        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-----fb------->
        <?php
        $news_id_share = $_GET['id'];
        $sqlNewsshare = $obj->FlyQuery("SELECT 
                                            cn.id,
                                            cn.news_headding,
                                            r.name as reporter_name,
                                            cn.news_thumble,
                                            cn.news_sub_headding,
                                            cn.news_short_details,
                                            cn.news_long_details,
                                            cn.home_page,
                                            cn.breaking_news,
                                            cn.tab_lead_news,
                                            cn.slider_image,
                                            cn.news_publish,
                                            cn.news_status,
                                            cn.news_source,
                                            cn.news_date_time
                                            FROM compose_news as cn
                                            LEFT JOIN reporter as r ON r.id=cn.reporter WHERE cn.id='" . $news_id_share . "'");
        if (count($sqlNewsshare) >= 1):
            foreach ($sqlNewsshare as $Newsshare):
                ?>
                        <!-- <meta property="og:title" content="<?php //echo html_entity_decode($nw->news_title);  ?>" />
                       <meta property="og:description" content="<?php //echo html_entity_decode($nw->news_long_description);     ?>" />

                        <meta property="og:image" content="<?php //echo $con->baseUrl($nw->news_photo);  ?>?resize=680%2C680" />

                        <meta property="og:type" content="article" />-->

                <meta property="og:url"           content="http://bdnewsrobot.com/<?php echo $obj->filename(); ?>" />
                <meta property="og:type"          content="website" />
                <meta property="og:title"         content="<?php echo html_entity_decode($Newsshare->news_headding); ?>" />
                <meta property="og:description"   content="<?php echo html_entity_decode($Newsshare->news_short_details);?>" />
                <meta property="og:image"         content="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $Newsshare->news_thumble;?>" />

                <?php
            endforeach;
        endif;
        ?>
                <!--custom end share-->
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
                    $obj->insert("popular_news", array("news_id" => $_GET['id']));
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

                <!--Post Format Standart begin-->
<?php include 'include/post_news.php'; ?>
                <!-- /.main_content --> 
                <!--/Post Format Standart end--> 

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
                                <?php include 'include/popular_news.php';?>
<!--                                <div class="tab_content" id="tabs2">
                                    <div class="block_home_news_post" >
                                        <div class="info">
                                            <div class="date">07:29</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Cras tincidunt enim non metus ultricies.</a></p>
                                    </div>
                                    <div class="block_home_news_post">
                                        <div class="info">
                                            <div class="date">07:12</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Many desktop publishing packages and web.</a></p>
                                    </div>
                                    <div class="block_home_news_post">
                                        <div class="info">
                                            <div class="date">17:57</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Dolorem ipsum quia dolor sit amet dolor laud.</a></p>
                                    </div>
                                    <div class="block_home_news_post">
                                        <div class="info">
                                            <div class="date">17:57</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Beatae vitae dicta sunt.explicabo ipsam.</a></p>
                                    </div>
                                    <div class="block_home_news_post">
                                        <div class="info">
                                            <div class="date">09:03</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Many desktop publishing packages and web page editors now use.</a></p>
                                    </div>
                                    <div class="block_home_news_post">
                                        <div class="info">
                                            <div class="date">17:56</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Ut enim ad minima veniam, quis nostrum.</a></p>
                                    </div>
                                    <div class="block_home_news_post">
                                        <div class="info">
                                            <div class="date">14:21</div>
                                        </div>
                                        <p class="title"><a href="post-standart.php">Many desktop publishing packages and web page editors now use.</a></p>
                                    </div>
                                </div>-->
                                <!-- tab content goes here -->

                            </div>
                        </div>
                    </aside>


                    <!--Video Widget-->
                    <aside class="widget widget_recent_blogposts">
<?php include 'include/recent_post.php'; ?>
                    </aside>
                    <!-- Recent posts -->
                    <aside class="widget widget_recent_photos">
<?php include 'include/recent_photo.php'; ?>
                    </aside>

                    <!-- newsletter -->
                    <aside class="widget feedburner_subscribe" >
                        <div class="block_newsletter">
                            <div class="widget_header">
                                <h3 class="widget_title">Subscribe to our newsletter</h3>
                            </div>
                            <div class="widget_body">
                                <div class="label">Subscribe to our email newsletter.</div>
                                <form target="_blank" method="post" action="http://feedburner.google.com/fb/a/mailverify?">
                                    <div class="field">
                                        <input type="text" placeholder="Enter Your E-mail address" class="w_def_text" title="Enter Your Email Address" name="email">
                                    </div>
                                    <input type="submit" value="Subscribe" class="button">
                                </form>
                            </div>
                        </div>
                    </aside>
                    <!--Latest reviews-->

                    <!--Latest comments-->

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
                    <form name="registration_form" method="post" action="#">
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

<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery-ui-1.9.2.custom.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/superfish.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery.jclock.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery.flexslider-min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery.jcarousel.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/jquery.elastislide.js"></script> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/googlemap_init.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/mediaelement.min.js"></script> 
<script type="text/javascript" src="<?php echo $obj->baseUrlF(); ?>js/lib.js"></script>
<script id="dsq-count-scr" src="//bdnewsrobot-com.disqus.com/count.js" async></script>
</body>
</html>
