<div class="widget_header">
                            <!--<div class="widget_subtitle"><a class="lnk_all_posts" href="media-photos.php">All photos</a></div>-->
                            <h3 class="widget_title">Recent photos</h3>
                        </div>
                        <div class="widget_body">
                            <div id="recent_photos_thumbs">
                                <div class="flex-viewport" >
                                    <ul class="slides">
                                        <?php
                                            $sqlrecentphoto = $obj->FlyQuery("SELECT * FROM compose_news ORDER BY id DESC limit 7");
                                            if (!empty($sqlrecentphoto)) {
                                                foreach ($sqlrecentphoto as $recentphoto):
                                                    ?>
                                        <li><img alt="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $recentphoto->news_thumble;?>" src="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $recentphoto->news_thumble;?>"></li>
                                        <?php
        endforeach;
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <ul class="flex-direction-nav">
                                    <li><a href="#" class="flex-prev flex-disabled"><span></span></a></li>
                                    <li><a href="#" class="flex-next"><span></span></a></li>
                                </ul>
                            </div>
                            <!--Recent photos-->
                            <div id="recent_photos_slider" >
                                <div class="flex-viewport" >
                                    <ul class="slides" >
                                        <?php
                                            $sqlrephoto = $obj->FlyQuery("SELECT * FROM compose_news ORDER BY id DESC limit 7");
                                            if (!empty($sqlrephoto)) {
                                                foreach ($sqlrephoto as $rephoto):
                                                    ?>
                                        <li><a class="gal_link w_hover img-link prettyPhoto" href="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $rephoto->news_thumble;?>"><img alt="" src="<?php echo $obj->baseUrlF();?>news_thumble/<?php echo $rephoto->news_thumble?>"> <span class="link-icon"></span> </a>
                                            <div class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $rephoto->id;?>/<?php echo $obj->CleanParam($rephoto->news_headding); ?>"><?php echo $rephoto->news_headding;?>.</a></div>
                                        </li>
                                         <?php
        endforeach;
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>