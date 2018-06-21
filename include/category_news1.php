<div class="border-top"></div>
<h2 class="block-title">শিক্ষাঙ্গন</h2>
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
                                    WHERE `select_category_news`='7' ORDER BY id DESC LIMIT 5");
    if (!empty($sqlCategoryNews)) {
        $i=1;
        foreach ($sqlCategoryNews as $CategoryNews):
            if ($i == 1) {
                    $pp = ' class="block_home_post first-post" ';
                    $pq='style="display: run-in;"';
                     $ppp='class="post-image"';
                } elseif ($i == 2) {
                    $pp = ' class="block_home_post" style="padding-bottom: 8px; border-bottom: 1px solid #e3e3e3;margin-bottom: 15px;"';
                   $pq='id="blockpost"';
                   $ppp='class="post-image custom_img"';
                }elseif ($i == 3) {
                    $pp = ' class="block_home_post" style="padding-bottom: 8px; border-bottom: 1px solid #e3e3e3;margin-bottom: 15px;"';
                   $pq='id="blockpost"';
                   $ppp='class="post-image  custom_img"';
                }elseif ($i == 4) {
                    $pp = ' class="block_home_post"  ';
                   $pq='id="blockpost"';
                   $ppp='class=" post-image custom_img"';
                }elseif ($i == 5) {
                    $pp = ' class="block_home_post"';
                    $pq='id="blockpost"';
                    $ppp='class="post-image custom_img "';
                    $i = 0;
                }
                ?>
    <div <?php echo $pp;?> style="margin-bottom: 20px; overflow: hidden">
        <div <?php echo $ppp?> ><a class="img-link img-wrap w_hover" href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $CategoryNews->id;?>/<?php echo $obj->CleanParam($CategoryNews->news_headding); ?>"> <img  alt=""  src="news_thumble/<?php echo $CategoryNews->news_thumble ?>"> <span class="link-icon"></span> </a> </div>
                <div class="post-content">
                    <div class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $CategoryNews->id;?>/<?php echo $obj->CleanParam($CategoryNews->news_headding); ?>"><?php echo html_entity_decode($CategoryNews->news_headding); ?></a></div>
                </div>
                <div class="post-info">
                    <div class="post_date"><?php echo $CategoryNews->news_date_time;?></div>
                    <a class="comments_count" href=""><?php echo $CategoryNews->reporter;?></a> </div>
                <div class="post-body font13" <?php if (!empty($pq)) {
                                echo $pq;
                            }  else {
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
    
    
    <?php
       /* $SqlSubNews = $obj->FlyQuery("SELECT 
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
                                            cn.news_date_time
                                            FROM compose_news as cn
                                            LEFT JOIN reporter as r ON r.id=cn.reporter ORDER BY id DESC LIMIT 2");
        if (!empty($SqlSubNews)) {
            foreach ($SqlSubNews as $SubNews):
        
    ?>
    <div class="block_home_post" style="margin: 0px; margin-right: 20px;">
        <div class="post-image"><a class="img-link img-wrap w_hover" href="post-standart.php"> <img alt="news_thumble/<?php echo $SubNews->news_thumble;?>"  src="news_thumble/<?php echo $SubNews->news_thumble;?>"> <span class="link-icon"></span> </a> </div>
            <div class="post-content">
                <div class="title"><a href="post-standart.php"><?php echo html_entity_decode($SubNews->news_headding);?></a></div>
            </div>
            <div class="post-info">
                <div class="post_date"><?php echo $SubNews->news_date_time;?></div>
                    <a class="comments_count" href="post-standart.php"><?php echo $SubNews->reporter_name;?></a> </div>
        </div>
    <?php
endforeach;
        }*/
    ?>
</div>
<!--<div class="view-all"><a href="page-style1.php">View all Business News</a></div>-->