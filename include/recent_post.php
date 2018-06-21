<div class="widget_header">
                            <!--<div class="widget_subtitle"><a class="lnk_all_posts" href="page-blogs.php">all recent posts</a></div>-->
                            <h3 class="widget_title">Recent posts</h3>
                        </div>
                        <div class="widget_body">
                            <ul class="slides">
                               <li>
                                            <?php
                                            $sqlrecentnews = $obj->FlyQuery("SELECT 
                                            cn.id,
                                            cn.news_headding,
                                            r.name as reporter_name,
                                            cn.news_thumble,
                                            cn.news_sub_headding,
                                            TRIM(Replace(Replace(Replace(cn.news_short_details,'\t',''),'\n',''),'\r','')) AS news_short_details,
                                            cn.news_long_details,
                                            cn.home_page,
                                            cn.breaking_news,
                                            cn.tab_lead_news,
                                            cn.slider_image,
                                            cn.news_publish,
                                            cn.news_status,
                                            cn.news_date_time
                                            FROM compose_news as cn
                                            LEFT JOIN reporter as r ON r.id=cn.reporter ORDER BY id DESC LIMIT 5");
                                            if (!empty($sqlrecentnews)) {
                                                foreach ($sqlrecentnews as $recentnews):
                                                    ?>
                                                    <div class="article">
                                                        <div class="pic"> <a class="w_hover img-link img-wrap" href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $recentnews->id;?>/<?php echo $obj->CleanParam($recentnews->news_headding); ?>"><img  alt=""  src="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $recentnews->news_thumble; ?>"> </a> </div>
                                                        <div class="text">
                                                            <p class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $recentnews->id;?>/<?php echo $obj->CleanParam($recentnews->news_headding); ?>"><?php echo $recentnews->news_headding; ?></a></p>
                                                            <div class="icons">
                                                                <ul>
                                                                    <li><a class="views" href=""><?php echo $recentnews->reporter_name;?></a></li>
                                                                    <!--<li><a class="comments" href="post-standart.php">2</a></li>-->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                           
                                        </li>
                                        
                                    
                            </ul>
                            <!--<div class="pages_info"> <span class="cur_page">1</span> of <span class="all_pages">1</span> </div>-->
                        </div>