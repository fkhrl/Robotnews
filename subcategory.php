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
        <link rel="icon" type="image/png" href="favicon.png"/>
        <link rel="icon" type="image/png" href="favicon.png"/>
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
                            $newssubcategory =  $obj->FlyQuery("SELECT name FROM sub_category WHERE id='".$_GET['scid']."'");
?>


                            <ul class="breadcrumbs">
                                <li class="home"><a href="index.php">Home</a></li>
                                <li><?php echo $newscategory[0]->name; ?></li>
                                <li class="current" style="font-size: 11px;"><?php echo $newssubcategory[0]->name; ?></li>
                            </ul>


                            <section id="news_style1_body" class="news_body"> 

                                <!--tab all -->
                                
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
                                FROM sub_category as c 
                                INNER JOIN compose_news as cn ON cn.select_subcategory_news=c.`id` 
                                INNER JOIN reporter as r ON r.id=cn.reporter
                                WHERE 
                                c.`id`='".$_GET['scid']."' AND c.category='".$_GET['cid']."' order by id DESC limit 12");
                                
                                if(!empty($sqlcategory))
                                {
                                    foreach ($sqlcategory as $category):
                                ?>

                                <article>
                                    <div class="pic"><a href="#" class="w_hover img-link img-wrap"><img src="<?php echo $obj->baseUrlF();?>news_thumble/<?= $category->news_thumble ?>"  alt="" > <span class="link-icon"></span> </a> </div>
                                    <h3><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $category->id;?>/<?php echo $obj->CleanParam($category->news_headding); ?>"><?= html_entity_decode($category->news_headding); ?></a></h3>
                                    <ul class="icons">
                                        <li><a href="" class="post_date"><?= $category->news_date_time ?></a></li>
                                        <li><a href="" class="post_views"><?= $category->reporter ?></a></li>
                                        <li><a href="" class="comments_count">0</a></li>
                                    </ul>
                                    <div class="text"><?= html_entity_decode($category->news_short_details); ?></div>
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


                                <!-- tab popilar-->


                                <!-- Tab commented -->


                                <!-- Tab media -->


                                <!-- Tab tags -->

                            </section>






                            <!-- Homepage gallery -->
                            <!--                            <div class="homepage_gallery" id="home-gallery">
                                                            <div class="border-top"></div>
                                                            <h2>Galleries</h2>
                                                            <div id="home-gallery-wrapper" class="es-carousel-wrapper">
                                                                <div class="es-carousel">
                                                                    <ul class="slides">
                                                                        <li class="gallery-item"><a href="images/13.jpg" class="gal_link  prettyPhoto"><span class="link-icon"></span><img src="images/13-388x246.jpg"  alt="Curabitur enim dui, euismod convallis." /></a> </li>
                                                                        <li class="gallery-item"><a href="images/23.jpg" class="gal_link prettyPhoto"><span class="link-icon"></span><img src="images/23-388x246.jpg"  alt="Fermentum erat, vitae tincidunt quam." /></a> </li>
                                                                        <li class="gallery-item"><a href="images/18.jpg" class="gal_link prettyPhoto"><span class="link-icon"></span><img src="images/18-388x246.jpg"  alt="Perfect For Your Business" /></a> </li>
                                                                        <li class="gallery-item"><a href="images/53.jpg" class="gal_link prettyPhoto"><span class="link-icon"></span><img src="images/53-388x246.jpg"  alt="Praesent at erat eu metus luctus blandit." /></a> </li>
                                                                        <li class="gallery-item"><a href="images/61.jpg" class="gal_link prettyPhoto"><span class="link-icon"></span><img src="images/61-388x246.jpg"  alt="Fusce sagittis fermentum erat vitae." /></a> </li>
                                                                        <li class="gallery-item"><a href="images/18.jpg" class="gal_link prettyPhoto"><span class="link-icon"></span><img src="images/18-388x246.jpg"  alt="Audio post format" /></a> </li>
                                                                        <li class="gallery-item"><a href="images/33.jpg" class="gal_link prettyPhoto"><span class="link-icon"></span><img src="images/33-388x246.jpg"  alt="Nulla ullamcorper nisi odio, non tempor neque." /></a> </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>-->
                            <!-- /Homepage Gallery --> 

                            <!-- Recent Reviews -->
                            <!--                            <div class="home_reviews clearboth">
                                                            <div class="border-top"></div>
                                                            <h2 class="block-title">Reviews</h2>
                                                            <div class="items-wrap">
                                                                <div class="block_home_post first-post">
                                                                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Perspiciatis unde omnis iste natus voluptatem."  src="images/21-600x352.jpg"> <span class="link-icon"></span> </a> </div>
                                                                    <div class="post-content">
                                                                        <div class="title"><a href="post-standart.php">Perspiciatis unde omnis iste natus voluptatem.</a></div>
                                                                    </div>
                                                                    <div class="post-info">
                                                                        <div class="post_rating"><span class="points4 stars"></span></div>
                                                                        <div class="post_date">April 22, 2013</div>
                                                                        <a class="comments_count" href="post-standart.php">4</a> </div>
                                                                    <div class="post-body">Quisque non quam sit amet dolor venenatis eleifend quis ut lorem. Aenean venenatis massa dui, eget aliquam enim. Nunc et suscipit lectus. Suspendisse sit amet arcu...</div>
                                                                </div>
                                                                <div class="block_home_post bd-bot">
                                                                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Perspiciatis unde omnis iste natus voluptatem."  src="images/25-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                                    <div class="post-content">
                                                                        <div class="title"><a href="post-standart.php">Perspiciatis unde omnis iste natus voluptatem.</a></div>
                                                                    </div>
                                                                    <div class="post-info">
                                                                        <div class="post_rating"><span class="points5 stars"></span></div>
                                                                        <div class="post_date">April 22, 2013</div>
                                                                    </div>
                                                                </div>
                                                                <div class="block_home_post bd-bot">
                                                                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Perspiciatis unde omnis iste natus voluptatem."  src="images/24-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                                    <div class="post-content">
                                                                        <div class="title"><a href="post-standart.php">Perspiciatis unde omnis iste natus voluptatem.</a></div>
                                                                    </div>
                                                                    <div class="post-info">
                                                                        <div class="post_rating"><span class="points4 stars"></span></div>
                                                                        <div class="post_date">April 22, 2013</div>
                                                                    </div>
                                                                </div>
                                                                <div class="block_home_post">
                                                                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Perspiciatis unde omnis iste natus voluptatem."  src="images/22-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                                    <div class="post-content">
                                                                        <div class="title"><a href="post-standart.php">Perspiciatis unde omnis iste natus voluptatem.</a></div>
                                                                    </div>
                                                                    <div class="post-info">
                                                                        <div class="post_rating"><span class="points4 stars"></span></div>
                                                                        <div class="post_date">April 22, 2013</div>
                                                                    </div>
                                                                </div>
                                                                <div class="block_home_post">
                                                                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Many desktop publishing packages and web page editors now use."  src="images/23-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                                    <div class="post-content">
                                                                        <div class="title"><a href="post-standart.php">Many desktop publishing packages and web page...</a></div>
                                                                    </div>
                                                                    <div class="post-info">
                                                                        <div class="post_rating"><span class="points4 stars"></span></div>
                                                                        <div class="post_date">April 22, 2013</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="view-all"><a class="lnk_all_news fl" href="page-style1.php">View all Reviews</a> </div>
                                                        </div>-->
                            <!-- /Recent Reviews --> 
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
                                </div>












                                <!-- tab content goes here -->
                                <?php include 'include/latest_news.php'; ?>
                                <!-- tab content goes here -->
                                <?php include 'include/popular_news.php'; ?>
                                <!-- tab content goes here -->
                                <!--                                <div class="tab_content" id="tabs3">
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">17:57</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php">Beatae vitae dicta sunt.explicabo ipsam.</a></p>
                                                                    </div>
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">11:31</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php">Default model text, and search for'will.</a></p>
                                                                    </div>
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">14:20</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php">Totam rem aperiam, eaque ipsa quae ab illo inventore.</a></p>
                                                                    </div>
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">07:12</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php">Many desktop publishing packages and web.</a></p>
                                                                    </div>
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">07:29</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php"><span class="hot">Hot!</span>Perspiciatis unde omnis iste natus voluptatem.</a></p>
                                                                    </div>
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">17:56</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php">Ut enim ad minima veniam, quis nostrum.</a></p>
                                                                    </div>
                                                                    <div class="block_home_news_post">
                                                                        <div class="info">
                                                                            <div class="date">17:57</div>
                                                                        </div>
                                                                        <p class="title"><a href="post-standart.php">Dolorem ipsum quia dolor sit amet dolor laud.</a></p>
                                                                    </div>
                                                                </div>-->
                            </div>
                        </div>
                    </aside>
                    <!--                    <aside class="widget followers" id="followers-widget-2">
                                            <div class="block_subscribes_sidebar">
                                                <div class="service facebook_info"> <a class="fb" href="http://www.facebook.com/envato"> <span class="num">29076</span> <span class="people">Subs.</span> </a> </div>
                                                <div class="service twitter_info"> <a class="tw" href="http://www.twitter.com/envato"> <span class="num">0</span> <span class="people">Follow.</span> </a> </div>
                                                <div class="service"> <a class="rss" href="http://feeds.feedburner.com/envato"> <span class="num">300</span> <span class="people">Subs.</span> </a> </div>
                                            </div>
                                        </aside>-->
                    <!--Video Widget-->
                    <!--                    <aside class="widget widget_recent_video">
                                            <div class="widget_header">
                                                <div class="widget_subtitle"><a class="lnk_all_posts" href="media-videos.php">All videos</a></div>
                                                <h3 class="widget_title">Video Widget</h3>
                                            </div>
                                            <div class="widget_body">
                                                <div id="video_carousel" class="thumb_carousel jcarousel-container jcarousel-container-vertical">
                                                    <div class="jcarousel-container">
                                                        <div class="jcarousel-clip jcarousel-clip-vertical" >
                                                            <ul class="jcarousel-list">
                                                                <li> <a data-content="#" data-href="images/18-458x294.jpg" title="Video post example" href="http://www.youtube.com/watch?v=w5w0S13x2yQ"> <img alt="" src="images/18-90x66.jpg"> </a> </li>
                                                                <li> <a data-content="#" data-href="images/22-458x294.jpg" title="Perspiciatis unde omnis iste natus voluptatem." href="http://vimeo.com/67019026"> <img alt="" src="images/22-90x66.jpg"> </a> </li>
                                                                <li> <a data-content="#" data-href="images/24-458x294.jpg" title="Perspiciatis unde omnis iste natus voluptatem." href="http://vimeo.com/67019026"> <img alt="24" src="images/24-90x66.jpg"> </a> </li>
                                                                <li> <a data-content="#" data-href="images/25-458x294.jpg" title="Perspiciatis unde omnis iste natus voluptatem." href="http://vimeo.com/67019026"> <img alt="" src="images/25-90x66.jpg"> </a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="jcarousel-prev jcarousel-prev-vertical jcarousel-prev-disabled jcarousel-prev-disabled-vertical"><span></span></div>
                                                    <div class="jcarousel-next jcarousel-next-vertical" ><span></span></div>
                                                </div>
                                                <div id="carousel_target" class="video-thumb"> <a class="w_hover img-link img-wrap prettyPhoto" href="http://www.youtube.com/watch?v=w5w0S13x2yQ"><img alt="" src="images/18-458x294.jpg"><span class="v_link"></span></a>
                                                    <div class="post_title"><a class="post_name" href="post-youtube.php">Video post example</a></div>
                                                </div>
                                            </div>
                                        </aside>-->
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
                    <!--                    <aside class="widget twitter" >
                                            <div class="block_twitter_widget">
                                                <div class="widget_header blue">
                                                    <div class="lnk_follow widget_subtitle"><a target="_blank" href="https://twitter.com/envato">Follow on Twitter</a></div>
                                                    <h3 class="widget_title">Latest tweets</h3>
                                                </div>
                                                <div class="tweet widget_body">
                                                    <div class="tweetBody" >
                                                        <ul>
                                                            <li><a href="#">@wpspacethemes</a> How can our bank can get the corrected Name of the Receiver for our account, since it has not been specified correctly?</li>
                                                            <li><a href="#">@wpspacethemes</a> Check out this great #themeforest item 'PrimeTime - Clean, Responsive WP Magazine</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>-->
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
                    <!--Latest reviews-->
                    <!--                    <aside class="widget widget_recent_reviews" >
                                            <div class="widget_header">
                                                <div class="widget_subtitle"><a class="lnk_all_posts" href="reviews-all.php">All reviews</a></div>
                                                <h3 class="widget_title">Latest reviews</h3>
                                            </div>
                                            <div class="widget_body">
                                                <div class="recent_reviews">
                                                    <ul class="slides">
                                                        <li>
                                                            <div class="img_wrap"><a class="w_hover img_wrap" href="reviews-item-page.php"><img alt="" src="images/22-176x128.jpg"></a></div>
                                                            <div class="extra_wrap">
                                                                <div class="review-title"><a href="reviews-item-page.php">Tempor dolor nec lectus facilisis et consequat.</a></div>
                                                                <div class="post-info">
                                                                    <div class="post_rating"><span class="points4"></span></div>
                                                                    <a class="comments_count" href="reviews-item-page.php">1</a> </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="img_wrap"><a class="w_hover img_wrap" href="reviews-item-page.php"><img alt="" src="images/5-176x128.png"></a></div>
                                                            <div class="extra_wrap">
                                                                <div class="review-title"><a href="reviews-item-page.php">Lectus facilisis et consequat lectus malesuada.</a></div>
                                                                <div class="post-info">
                                                                    <div class="post_rating"><span class="points2"></span></div>
                                                                    <a class="comments_count" href="reviews-item-page.php">1</a> </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="img_wrap"><a class="w_hover img_wrap" href="reviews-item-page.php"><img alt="" src="images/7-176x128.png"></a></div>
                                                            <div class="extra_wrap">
                                                                <div class="review-title"><a href="reviews-item-page.php">Etiam sapien urna, mollis volutpat malesuada.</a></div>
                                                                <div class="post-info">
                                                                    <div class="post_rating"><span class="points5"></span></div>
                                                                    <a class="comments_count" href="reviews-item-page.php">1</a> </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="img_wrap"><a class="w_hover img_wrap" href="reviews-item-page.php"><img alt="" src="images/3-176x128.png"></a></div>
                                                            <div class="extra_wrap">
                                                                <div class="review-title"><a href="reviews-item-page.php">Nunc ut metus eu leo ornare sagittis non...</a></div>
                                                                <div class="post-info">
                                                                    <div class="post_rating"><span class="points5"></span></div>
                                                                    <a class="comments_count" href="reviews-item-page.php">1</a> </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </aside>-->
                    <!--Latest comments-->
                    <!--                    <aside class="widget widget_latest_comments" >
                                            <div class="widget_header">
                                                <h3 class="widget_title">Latest comments</h3>
                                            </div>
                                            <div class="widget_body">
                                                <ul class="comments">
                                                    <li>
                                                        <div class="comment_author"><a href="post-standart.php">admin</a></div>
                                                        <div class="comment_text">Nunc eros mi, cursus a semper vel, condimentum eu elit.</div>
                                                        <div class="comment_date">06:44 02.06.2013</div>
                                                    </li>
                                                    <li>
                                                        <div class="comment_author"><a href="post-standart.php">admin</a></div>
                                                        <div class="comment_text">Sed vel nisi a ante consequat fermentum nec vel massa.</div>
                                                        <div class="comment_date">06:44 02.06.2013</div>
                                                    </li>
                                                    <li class="last">
                                                        <div class="comment_author"><a href="post-standart.php">admin</a></div>
                                                        <div class="comment_text">Aliquam mollis orci nec ante mollis vulputate.</div>
                                                        <div class="comment_date">06:44 02.06.2013</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </aside>-->
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
