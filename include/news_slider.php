<div class="slider-wrapper">
                                    <div class="flexslider" id="home_slider1">
                                        <ul class="slides">

                                            <?php
                                            $sqlslider = $obj->FlyQuery("SELECT 
                                            a.id,
                                            cn.id as news_id,
                                            cn.news_headding,
                                            TRIM(Replace(Replace(Replace(cn.news_short_details,'\t',''),'\n',''),'\r','')) AS news_short_details,
                                            r.name as reporter,
                                            cn.news_thumble,
                                            cn.news_date_time
                                            FROM `news_slider` as a 
                                            INNER JOIN compose_news as cn ON cn.id=a.news_id
                                            INNER JOIN reporter AS r ON r.id=cn.reporter
                                            ORDER BY id DESC
                                            LIMIT 0,4");
                                            if (!empty($sqlslider)) {
                                                foreach ($sqlslider as $slider_image):
                                                    ?>
                                                    <li>
                                                        <div class="slide">
                                                            <a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $slider_image->news_id;?>/<?php echo $obj->CleanParam($slider_image->news_headding); ?>"><img  src="news_thumble/<?php echo $slider_image->news_thumble; ?>" alt="<?php echo $slider_image->news_headding; ?>"></a>
                                                            <div class="caption">
                                                                <p class="subj"><?php echo $slider_image->reporter; ?></p>
                                                                <p class="title"><a  style="color:#FFF !important" href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $slider_image->news_id;?>/<?php echo $obj->CleanParam($slider_image->news_headding); ?>"><?php echo html_entity_decode(strip_tags($slider_image->news_headding)); ?></a></p>
                                                                <p class="body"><?php echo html_entity_decode(strip_tags($slider_image->news_short_details)); ?></p>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <ul id="paging_controls">
                                        <?php
                                        if (!empty($sqlslider)) {
                                            foreach ($sqlslider as $slider_text):
                                                ?>
                                                <li>

                                                    <div class="inner">
                                                        <div class="slide-title"><?php echo html_entity_decode($slider_text->news_headding); ?></div>
                                                        <div class="post-date"><?php echo html_entity_decode($slider_text->news_date_time); ?></div>
                                                    </div>
                                                </li>
                                                <?php
                                            endforeach;
                                        }
                                        ?>
                                    </ul>
                                </div>