<div class="home_category_news clearboth">
    <div class="border-top"></div>
    <h2 class="block-title">বিনোদন</h2>
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
                                            WHERE `select_category_news`='14' ORDER BY id DESC LIMIT 5");
        if (!empty($sqlCategoryNews)) {
            $i = 1;
            foreach ($sqlCategoryNews as $CategoryNews):
                if ($i == 1) {
                    $pp = ' class="block_home_post first-post" ';
                    $pq='style="display: run-in;"';
                } elseif ($i == 2) {
                    $pp = ' class="block_home_post bd-bot"';
                    $pq = 'id="blockpost"';
                } elseif ($i == 3) {
                    $pp = ' class="block_home_post bd-bot"';
                    $pq = 'id="blockpost"';
                } elseif ($i == 4) {
                    $pp = ' class="block_home_post bd-bot"';
                    $pq = 'id="blockpost"';
                } elseif ($i == 5) {
                    $pp = ' class="block_home_post bd-bot"';
                    $pq = 'id="blockpost"';
                    $i = 0;
                }
                ?>
                <div <?php echo $pp; ?>>
                    <div class="post-image"><a class="img-link img-wrap w_hover" href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $CategoryNews->id;?>/<?php echo $obj->CleanParam($CategoryNews->news_headding); ?>"> <img  alt="news_thumble/<?php echo $CategoryNews->news_thumble ?>"  src="news_thumble/<?php echo $CategoryNews->news_thumble ?>"> <span class="link-icon"></span> </a> </div>
                    <div class="post-content">
                        <div class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $CategoryNews->id;?>/<?php echo $obj->CleanParam($CategoryNews->news_headding); ?>"><?php echo html_entity_decode($CategoryNews->news_headding); ?></a></div>
                    </div>
                    <div class="post-info">
                        <div class="post_date"><?php echo $CategoryNews->news_date_time; ?></div>
                        <a class="comments_count" href=""><?php echo $CategoryNews->reporter; ?></a> </div>
                    <div class="post-body font13" <?php
                    if (!empty($pq)) {
                        echo $pq;
                    } else {
                        echo '';
                    }
                    ?>>
                        <?php echo $obj->custom_echo(html_entity_decode($CategoryNews->news_short_details), 1000); ?></div>
                </div>
                <?php
                $i++;
            endforeach;
        }
        ?>
        <!--                                    <div class="block_home_post bd-bot">
                                                <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Perspiciatis unde omnis iste natus."  src="images/12-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                <div class="post-content">
                                                    <div class="title"><a href="post-standart.php">Perspiciatis unde omnis iste natus.</a></div>
                                                </div>
                                                <div class="post-info">
                                                    <div class="post_date">April 18, 2013</div>
                                                    <a class="comments_count" href="post-standart.php">1</a> </div>
                                            </div>
                                            <div class="block_home_post bd-bot">
                                                <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Vaccusantium doloremque lau."  src="images/14-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                <div class="post-content">
                                                    <div class="title"><a href="post-standart.php">Vaccusantium doloremque lau.</a></div>
                                                </div>
                                                <div class="post-info">
                                                    <div class="post_date">April 18, 2013</div>
                                                    <a class="comments_count" href="post-standart.php">1</a> </div>
                                            </div>
                                            <div class="block_home_post">
                                                <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Totam rem aperiam, eaque ipsa quae ab illo inventore."  src="images/13-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                <div class="post-content">
                                                    <div class="title"><a href="post-standart.php">Totam rem aperiam, eaque ipsa quae ab illo...</a></div>
                                                </div>
                                                <div class="post-info">
                                                    <div class="post_date">April 18, 2013</div>
                                                    <a class="comments_count" href="post-standart.php">2</a> </div>
                                            </div>
                                            <div class="block_home_post">
                                                <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img  alt="Many desktop publishing packages and web page editors now use."  src="images/11-170x126.jpg"> <span class="link-icon"></span> </a> </div>
                                                <div class="post-content">
                                                    <div class="title"><a href="post-standart.php">Many desktop publishing packages and web page...</a></div>
                                                </div>
                                                <div class="post-info">
                                                    <div class="post_date">April 18, 2013</div>
                                                    <a class="comments_count" href="post-standart.php">1</a> </div>
                                            </div>-->
    </div>
    <!--<div class="view-all"><a href="page-style1.php">View all Lifestyle News</a></div>-->
</div>