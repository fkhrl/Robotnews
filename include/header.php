<?php
include("bangla_date/bangladate.php");
$sqlBreakingNews = $obj->FlyQuery("SELECT * FROM compose_news ORDER BY id DESC LIMIT 12");
?>
<section class="top">
    <div class="inner clearboth">
        <div class="top-right">
<!--            <ul id="user-links">
                <li><a href="#">Features</a></li>
                <li><a class="login-popup-link" href="#login">Login</a></li>
                <li><a class="registration-popup-link" href="#registration">Registration</a></li>
            </ul>-->
        </div>
        <div class="top-left">
            <!--<div id="jclock1" class="simpleclock"></div>-->
            ঢাকা, <?php echo $convertedDATE . " | " . $bengali_date?>
        </div>
<!--        <div class="top-center">
            <div class="block_top_menu">
                <ul id="top-left-menu" class="top-left-menu">
                    <li class="red"><a href="index.php">Home</a></li>
                    <li><a href="page-about.php">About us</a></li>
                    <li class="nomobile"><a href="#">Dropdown</a>
                        <ul>
                            <li><a href="#">Drop Menu1</a></li>
                            <li><a href="#">Drop Menu2</a></li>
                            <li><a href="#">Drop Menu3</a></li>
                        </ul>
                    </li>
                    <li><a href="shortcodes-typography.php">Typography</a></li>
                    <li><a href="page-contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>-->
    </div>
</section>
<section class="section2">
    <div class="inner">
        <div class="section-wrap clearboth">
            <div class="block_social_top">
                <div class="icons-label">Follow us:</div>
                <ul>
                    <li><a class="tw" href="#" title="Twitter">Twitter</a></li>
                    <li><a class="fb" href="#" title="Facebook">Facebook</a></li>
                    <li><a class="rss" href="#" title="RSS">RSS</a></li>
                    <li><a class="gplus" href="#" title="Google+">Google+</a></li>
                    <li><a class="vim" href="#" title="Vimeo">Vimeo</a></li>
                    <li><a class="tmb" href="#" title="Tumblr">Tumblr</a></li>
                    <li><a class="pin" href="#" title="Pinterest">Pinterest</a></li>
                </ul>
            </div>
            <div class="form_search">
                <form role="search" class="searchform" id="searchform" method="post" action="<?php echo $obj->baseUrlF(); ?>search">
                    <input type="search" placeholder="Search …" id="search" value="" name="search" class="field">
                    <input type="submit" value="Search" name="search1" id="submit" class="submit">
                </form>
            </div>
            <div class="newsletter">
                <div class="newsletter-title">Subscribe to our newsletter</div>
                <div class="newsletter-popup"> <span class="bg"><span></span></span>
                    <div class="indents">
                        <form method="post" action="">
                            <div class="field">
                                <input type="email" class="w_def_text" title="Enter Your Email Address" name="email" placeholder="Enter Your E-mail addres">
                            </div>
                            <input type="submit" value="Subscribe" name="subscribe" class="button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section3">
    <div class="section-wrap clearboth">
        <div class="banner-block">
            <!--<div class="banner"> <a href="#"><img alt="banner" src="images/banner.jpg"></a> </div>-->
        </div>
        <div class="name-and-slogan">
            <?php
                $sqlsiteinfo=$obj->FlyQuery("SELECT * FROM site_basic_info");
            ?>
            <div>
                <a rel="home" title="Robot News" href="<?php echo $obj->baseUrlF();?>home"> 
                    <img alt="logo" src="<?php echo $obj->baseUrlF();?>cms-admin/upload/<?php echo $sqlsiteinfo[0]->site_logo; ?>"> 
                </a>
            </div>
            <!--<h2 class="site-description">Responsive CMS Theme</h2>-->
        </div>
    </div>







</section>
<div class="headStyleMenu">
    <section class="section-nav">
        <nav role="navigation" class="navigation-main">
            <ul class="clearboth mainHeaderMenu">
                <li class="home"><a href="<?php echo $obj->baseUrlF();?>home"></a></li>
                <?php
                $sqlcategory = $obj->FlyQuery("SELECT * FROM category limit 12");

                if (!empty($sqlcategory)) {
                    $i = 1;
                    foreach ($sqlcategory as $category):
                        $page_id = $category->id;
                        $sqlsubcategory = $obj->FlyQuery("SELECT * FROM sub_category WHERE category='$page_id'");
                       //print_r($sqlsubcategory);
                        //$sqlsubmenulist = $obj->FlyQuery("SELECT * FROM sub_category WHERE id='$page_id'");
                        //$hassub = mysql_num_rows(mysql_query("SELECT * FROM sub_category WHERE id='$page_id'"));
                        
                        if ($i == 1) {
                            $pp = ' class="red" ';
                        } elseif ($i == 2) {
                            $pp = ' class="blue" ';
                        } elseif ($i == 3) {
                            $pp = ' class="sky-blue" ';
                        } elseif ($i == 4) {
                            $pp = ' class="purple" ';
                        } elseif ($i == 5) {
                            $pp = ' class="orange" ';
                        } elseif ($i == 6) {
                            $pp = ' class="blue" ';
                        } elseif ($i == 7) {
                            $pp = ' class="sky-blue" ';
                        } elseif ($i == 8) {
                            $pp = ' class="purple" ';
                        } elseif ($i == 9) {
                            $pp = ' class="orange" ';
                        } elseif ($i == 10) {
                            $pp = ' class="red" ';
                        } elseif ($i == 11) {
                            $pp = ' class="blue" ';
                        } elseif ($i == 12) {
                            $pp = ' class="orange" ';
                            $i = 0;
                        }
                        
                        ?>
                        <li <?php echo $pp; ?> ><a href="<?php echo $obj->baseUrlF();?>category/<?php echo $category->id; ?>/<?php echo $obj->CleanParam($category->name); ?>"><?php echo $category->name; ?></a>
                            
                                <ul>
                            <?php
                                 if(!empty($sqlsubcategory)){
                                     foreach ($sqlsubcategory as $subcategory):
                                ?>
                                        <li><a href="<?php echo $obj->baseUrlF();?>subcategory/<?php echo $category->id; ?>/<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a></li>
                                <?php
                            
                        endforeach;
                                 }
                            ?>
                                </ul>
                           
                        </li>
                        <?php
                        $i++;
                        endforeach;
                        }
                ?>

                <!--<li class="yellow"><a href="page-contact.php">Contact Us</a></li>-->
            </ul>
        </nav>
    </section>
    <!-- /#site-navigation --> 
    <!-- mobile menu -->
    <section class="section-navMobile">
        <div class="mobileMenuSelect"><span class="icon"></span>Home</div>
        <ul class="clearboth mobileHeaderMenuDrop">

            <?php
                $sqlcategory = $obj->FlyQuery("SELECT * FROM category limit 12");

                if (!empty($sqlcategory)) {
                    $i = 1;
                    foreach ($sqlcategory as $category):
                        $page_id = $category->id;
                        $sqlsubcategory = $obj->FlyQuery("SELECT * FROM sub_category WHERE category='$page_id'");
                    ?>
                        <li><a href="index.php"><?php echo $category->name; ?></a>
                            
                                <ul>
                            <?php
                                 if(!empty($sqlsubcategory)){
                                     foreach ($sqlsubcategory as $subcategory):
                                ?>
                                        <li><a href="<?php echo $obj->baseUrlF();?>/Home"><?php echo $subcategory->name; ?></a></li>
                                <?php
                            
                        endforeach;
                                 }
                            ?>
                                </ul>
                           
                        </li>
                        <?php
                        $i++;
                        endforeach;
                        }
                ?>
            
        </ul>
    </section>