<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=260070431060837";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php
$sqlsiteinfo = $obj->FlyQuery("SELECT * FROM site_basic_info");
?>
<section class="ft_section_1">
    <div class="footer-wrapper">
        <div class="col1">
            <div id="footer_logo"><a href="../../index.php"><img title="<?php echo $obj->baseUrlF(); ?><?php echo $sqlsiteinfo[0]->site_name; ?>" alt="<?php echo $obj->baseUrlF(); ?><?php echo $sqlsiteinfo[0]->site_name; ?>" src="<?php echo $obj->baseUrlF(); ?>cms-admin/upload/<?php echo $sqlsiteinfo[1]->site_logo; ?>"></a></div>
            <!--<div class="footer_text"> Perspiciatis unde omnis iste natus error sit voluptatem accusantium mque laudantium, totam rem aperiam, eaque ipsa quae ab illo. </div>-->
            <div class="block_social_footer">
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
        </div>
        <div class="col2">
            <div class="block_footer_widgets">
                <div class="column">
                    <div id="calendar_wrap">
                        <table>
                            <caption>
                                October 2013
                            </caption>
                            <thead>
                                <tr>
                                    <th title="Monday" scope="col">M</th>
                                    <th title="Tuesday" scope="col">T</th>
                                    <th title="Wednesday" scope="col">W</th>
                                    <th title="Thursday" scope="col">T</th>
                                    <th title="Friday" scope="col">F</th>
                                    <th title="Saturday" scope="col">S</th>
                                    <th title="Sunday" scope="col">S</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td id="prev" colspan="3"><a title="View posts for May 2013" href="#">« May</a></td>
                                    <td class="pad">&nbsp;</td>
                                    <td class="pad" id="next" colspan="3">&nbsp;</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td class="pad" colspan="1">&nbsp;</td>
                                    <td id="today">1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                    <td colspan="3" class="pad">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column">
                    <div class="widget_popular_footer">
                        <div class="widget_header">
                            <h3>Most Popular</h3>
                        </div>
                        <div class="widget_body">
                            <?php
                            $sqlrpopularnews = $obj->FlyQuery("SELECT
                                                                            COUNT(pn.news_id) AS news,
                                                                            cn.news_headding,
                                                                            cn.news_thumble,
                                                                            r.name as reporter,
                                                                            pn.news_id as id
                                                                            FROM popular_news as pn
                                                                            INNER JOIN compose_news as cn ON cn.id= pn.news_id
                                                                            INNER JOIN reporter as r ON r.id=cn.reporter
                                                                            GROUP BY cn.id
                                                                            ORDER BY news DESC LIMIT 3");
                            if (!empty($sqlrpopularnews)) {
                                foreach ($sqlrpopularnews as $popularnews):
                                    ?>
                                    <div class="article">
                                        <div class="pic"> <a class="w_hover" href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $popularnews->id;?>/<?php echo $obj->CleanParam($popularnews->news_headding); ?>"><img alt="news_thumble/<?php echo $popularnews->news_headding; ?>" src="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $popularnews->news_thumble; ?>"> </a> </div>
                                        <div class="text">
                                            <p class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $popularnews->id;?>/<?php echo $obj->CleanParam($popularnews->news_headding); ?>"><?php echo $popularnews->news_headding; ?></a></p>
                                            <div class="icons">
                                                <ul>
                                                    <li><a class="views" href=""><?php echo $popularnews->reporter; ?></a></li>
                                                    <!--<li><a class="comments" href="post-standart.php">4</a></li>-->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            }
                            ?>
                            <!--                            <div class="article">
                                                            <div class="pic"> <a class="w_hover" href="post-standart.php"><img alt="" src="images/23-112x80.jpg"> </a> </div>
                                                            <div class="text">
                                                                <p class="title"><a href="post-standart.php">Many desktop publishing packages and web page edit...</a></p>
                                                                <div class="icons">
                                                                    <ul>
                                                                        <li><a class="views" href="post-standart.php">909</a></li>
                                                                        <li><a class="comments" href="post-standart.php">1</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="article">
                                                            <div class="pic"> <a class="w_hover" href="post-standart.php"><img alt="" src="images/22-112x80.jpg"> </a> </div>
                                                            <div class="text">
                                                                <p class="title"><a href="post-standart.php">Tempor dolor nec lectus facilisis et consequat.</a></p>
                                                                <div class="icons">
                                                                    <ul>
                                                                        <li><a class="views" href="post-standart.php">746</a></li>
                                                                        <li><a class="comments" href="post-standart.php">1</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>
                </div>
                <div class="column last">
                    <h3>Facebook FunPage</h3>
                    <div class="block_flickr_footer">
<!--                        <div class="flickr_badge_image"> <a href="http://www.flickr.com/photos/we-are-envato/8954733698/"> <img title="Author Guilherme Salum (DD Studios) at work in his studio" alt="A photo on Flickr" src="http://farm4.staticflickr.com/3820/8954733698_a2646a7642_s.jpg"> </a> </div>
                        <div class="flickr_badge_image"><a href="http://www.flickr.com/photos/we-are-envato/8953389435/"><img title="Checking out the outdoor space" alt="A photo on Flickr" src="http://farm4.staticflickr.com/3685/8953389435_e5caf8d988_s.jpg"></a></div>
                        <div class="flickr_badge_image"><a href="http://www.flickr.com/photos/we-are-envato/8954585074/"><img title="The team listening to what the next few months holds for the company" alt="A photo on Flickr" src="http://farm4.staticflickr.com/3795/8954585074_a38ff86602_s.jpg"></a></div>
                        <div class="flickr_badge_image"><a href="http://www.flickr.com/photos/we-are-envato/8954585316/"><img title="Selina and Collis" alt="A photo on Flickr" src="http://farm3.staticflickr.com/2879/8954585316_60966c9a23_s.jpg"></a></div>-->
                        <div class="fb-page" data-href="https://www.facebook.com/bdNewsRobot/" data-tabs="timeline" data-width="400" data-height="220" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bdNewsRobot/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bdNewsRobot/">Bdnewsrobot</a></blockquote></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ft_section_2">
    <div class="footer-wrapper">
<!--        <ul id="footer_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>-->
        <div class="copyright">

            <div class="footer_text"> <?php echo date_default_timezone_get() . " &copy; " . date("Y"); ?>. All Rights Reserved. Created by <?php echo $sqlsiteinfo[0]->site_name; ?> </div>
        </div>
    </div>
</section>