<div class="home_category_news_small clearboth">
    <div class="border-top"></div>
    <h2 class="block-title">খেলা</h2>
    <div class="items-wrap">
        <?php
        $sqlCategoryNews = $obj->FlyQuery("SELECT 
                                            cn.id,
                                            cn.news_headding,
                                            r.name AS reporter,
                                            cn.news_thumble,
                                            TRIM(Replace(Replace(Replace(cn.news_short_details,'\t',''),'\n',''),'\r','')) AS news_short_details,
                                            cn.news_long_details,
                                            cn.news_date_time
                                            FROM compose_news as cn
                                            INNER JOIN reporter AS r ON r.id=cn.reporter
                                            WHERE `select_category_news`='13' ORDER BY id DESC LIMIT 6");
        if (!empty($sqlCategoryNews)) {
            $i = 1;
            foreach ($sqlCategoryNews as $CategoryNews):
                if ($i == 1) {
                    $pp = ' class="block_home_post first-post"  ';
                    $pq='style="display: run-in;"';
                    
                } elseif ($i == 2) {
                    $pp = ' class="block_home_post"';
                   $pq='id="blockpost"';
                  
                } elseif ($i == 3) {
                    $pp = ' class="block_home_post"';
                   $pq='id="blockpost"';
                   
                }elseif ($i == 4) {
                    $pp = ' class="block_home_post"';
                    $pq='id="blockpost"'; 
                   
                }elseif ($i == 5) {
                    $pp = ' class="block_home_post"';
                    $pq='id="blockpost"';
                  
                }elseif ($i == 6) {
                    $pp = ' class="block_home_post"';
                    $pq='id="blockpost"';
                   
                    $i = 0;
                }
                
                ?>
        <div <?php echo $pp;?>>
            <div class="post-image"><a class="img-link img-wrap w_hover"  href="post-standart.php"> <img  alt="news_thumble/<?php echo $CategoryNews->news_thumble ?>"  src="news_thumble/<?php echo $CategoryNews->news_thumble ?>"> <span class="link-icon"></span> </a> </div>
                    <div class="post-content">
                        <div class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $CategoryNews->id;?>/<?php echo $obj->CleanParam($CategoryNews->news_headding); ?>"><?php echo html_entity_decode($CategoryNews->news_headding); ?></a></div>
                    </div>
                    <div class="post-info">
                        <div class="post_date"><?php echo $CategoryNews->news_date_time; ?></div>
                        <a class="comments_count" href=""><?php echo $CategoryNews->reporter; ?></a> </div>
                    <div class="post-body font13" <?php if (!empty($pq)) {
                                echo $pq;
                            }  else {
                                echo '';
                            }
                            ?>>
                        <?php echo $obj->custom_echo(html_entity_decode($CategoryNews->news_short_details), 600); ?></div>
                </div>
                <?php
                $i++;
            endforeach;
        }
        ?>

<!--        <div class="block_home_post">
            <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Voluptatem accusantium doloremque laudantium."  src="images/12-170x126.jpg"> <span class="link-icon"></span> </a> </div>
            <div class="post-content">
                <div class="title"><a href="post-standart.php">Voluptatem accusantium doloremque laudantium.</a></div>
            </div>
            <div class="post-info">
                <div class="post_date">May 28, 2013</div>
                <a class="comments_count" href="post-standart.php">0</a> </div>
        </div>-->
        <!--                                        <div class="block_home_post last">
                                                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Cras tincidunt enim non metus ultricies."  src="images/22-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                    <div class="post-content">
                                                        <div class="title"><a href="post-standart.php">Cras tincidunt enim non metus ultricies.</a></div>
                                                    </div>
                                                    <div class="post-info">
                                                        <div class="post_date">April 19, 2013</div>
                                                        <a class="comments_count" href="post-standart.php">0</a> </div>
                                                </div>-->
    </div>
    <!--<div class="view-all"><a href="page-style1.php">View all Music News</a></div>-->
</div>