<div class="tab_content" id="tabs2">
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
                                                                            ORDER BY news DESC LIMIT 10");
                                            if (!empty($sqlrpopularnews)) {
                                                foreach ($sqlrpopularnews as $popularnews):
                                                    ?>
                                    <div class="block_home_news_post" >
<!--                                        <div class="info">
                                            <div class="date">07:29</div>
                                        </div>-->
                                        <p class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $popularnews->id;?>/<?php echo $obj->CleanParam($popularnews->news_headding); ?>"><?php echo $popularnews->news_headding; ?></a></p>
                                    </div>
          <?php
        endforeach;
    }
    ?>
<!--                                    <div class="block_home_news_post">
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
                                    </div>-->
                                </div>