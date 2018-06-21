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
<div class="main_content single ">
    <?php
    //$newscategory = $obj->FlyQuery("SELECT name FROM category WHERE id='" . $_GET['cid'] . "'");
    //$newssubcategory = $obj->FlyQuery("SELECT name FROM sub_category WHERE id='" . $_GET['scid'] . "'");
    $newscompose = $obj->FlyQuery("SELECT 
                                    cn.news_headding,
                                    c.name AS category_name,
                                    sc.name AS sub_category_name
                                    FROM compose_news as cn 
                                    LEFT JOIN category as c ON c.id=cn.select_category_news
                                    LEFT JOIN sub_category as sc ON sc.id=cn.select_subcategory_news
                                    WHERE cn.id='" . $_GET['id'] . "'");
    ?>
    <ul class="breadcrumbs">
        <li class="home"><a href="index.php">Home</a></li>
        <li class="all"><a href=""><?php echo $newscompose[0]->category_name; ?></a></li>
        <?php if(!empty($newscompose[0]->sub_category_name)){?><li class="cat_post"><a href=""><?php  echo $newscompose[0]->sub_category_name; ?></a></li><?php } ?>
        <li class="current" style="font-size: 11px;"><?php echo $newscompose[0]->news_headding; ?></li>
    </ul>

    <?php
    $news_id = $_GET['id'];
    $sqlNewsDetails = $obj->FlyQuery("SELECT 
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
                                            cn.news_source,
                                            cn.news_date_time
                                            FROM compose_news as cn
                                            LEFT JOIN reporter as r ON r.id=cn.reporter WHERE cn.id='" . $news_id . "'");
    if (!empty($sqlNewsDetails)) {
        foreach ($sqlNewsDetails as $NewsDetails):
            ?>
            <h2 class="page-title"><?php echo html_entity_decode($NewsDetails->news_headding); ?></h2>
            <div id="post_content" class="post_content" role="main">
                <article class="type-post hentry">
                    <div class="post-info">
                        <div class="post_date"><?php echo $NewsDetails->news_date_time; ?></div>
                        <a href="" class="post_format"><?php echo $NewsDetails->reporter_name; ?></a> 
                        <!--<a href="post-standart.php" class="comments_count">0</a>-->
                        <!--<div class="post_views">1045</div>-->
                    </div>
                    <div class="pic post_thumb"> <img src="<?php echo $obj->baseUrlF(); ?>news_thumble/<?php echo $NewsDetails->news_thumble; ?>" alt="<?php echo $obj->baseUrlF(); ?>news_thumble/<?php echo $NewsDetails->news_thumble; ?>" > </div>
                    <div class="post_content">
                        <p><?php echo html_entity_decode($NewsDetails->news_long_details); ?></p>
                        <a target="_blank" href="<?php echo html_entity_decode($NewsDetails->news_source); ?>">News Source</a>
                    </div>
                    <?php
                endforeach;
            }
            ?>
            <div class="block-social">
                <div class="soc_label">recommend to friends</div>
                <div class="fb-share-button" 
                     data-href="http://bdnewsrobot.com/<?php echo $obj->filename(); ?>" 
                     data-layout="button_count" 
                     data-size="small" 
                     data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" 
                       href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fbdnewsrobot.com%2Fpost-standart.php&amp;src=sdkpreparse">Share
                    </a>
                </div>

                <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="true">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                <!-- Place this tag where you want the share button to render. -->
                <div class="g-plus" data-action="share" data-annotation="none" data-href="http://bdnewsrobot.com/<?php echo $obj->filename(); ?>"></div>

                <!-- Place this tag after the last share tag. -->
                <script type="text/javascript">
    (function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();
                </script>

            </div>
        </article>
        <!--            <div id="post_author">
                      <h3>About the Author</h3>
                      <div class="photo"><a href="page-author.php"><img alt="" src="images/b5a37fca93d6cc2e271d7866d896a785.png"/></a></div>
                      <div class="extra_wrap">
                        <h4><a href="page-author.php">admin</a></h4>
                        <div class="description">Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi. architecto. Beatae vitae dicta sunt.</div>
                        <ul class="socialShareSquare">
                          <li><a target="_blank" href="https://twitter.com/share?text=#" class="twitter_link">Twitter</a> </li>
                          <li><a target="_blank" href="http://www.facebook.com/share.php?u=#" class="facebook_link">Facebook</a></li>
                          <li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?url=#" class="gplus_link">Google+</a></li>
                        </ul>
                      </div>
                    </div>-->
        <!--            <div id="recent_posts">
                      <h3 class="section_title"> Recent articles </h3>
                      <div class="posts_wrapper">
                        <article class="item_left">
                          <div class="pic"> <a href="post-standart.php" class="w_hover img-link img-wrap"> <img src="<?php //echo $obj->baseUrlF(); ?>images/13-170x126.jpg" alt="" ></a> </div>
                          <h3><a href="post-standart.php">Curabitur enim dui, euismod convallis.</a></h3>
                          <div class="post-info"> <a href="post-standart.php" class="post_date">May 30, 2013</a> <a href="post-standart.php" class="comments_count">2</a> </div>
                        </article>
                        <article class="item_right">
                          <div class="pic"> <a href="post-standart.php" class="w_hover img-link img-wrap"> <img src="<?php //echo $obj->baseUrlF(); ?>images/23-170x126.jpg" alt=""/></a> </div>
                          <h3><a href="post-standart.php">Fermentum erat, vitae tincidunt quam.</a></h3>
                          <div class="post-info"> <a href="post-standart.php" class="post_date">May 30, 2013</a> <a href="post-standart.php" class="comments_count">1</a> </div>
                        </article>
                      </div>
                      <div class="posts_wrapper">
                        <article class="item_left">
                          <div class="pic"> <a href="post-standart.php" class="w_hover img-link img-wrap"> <img src="<?php //echo $obj->baseUrlF(); ?>images/18-170x126.jpg" alt="" ></a> </div>
                          <h3><a href="post-standart.php">Perfect For Your Business</a></h3>
                          <div class="post-info"> <a href="post-standart.php" class="post_date">May 30, 2013</a> <a href="post-standart.php" class="comments_count">0</a> </div>
                        </article>
                        <article class="item_right">
                          <div class="pic"> <a href="post-standart.php" class="w_hover img-link img-wrap"> <img src="<?php //echo $obj->baseUrlF(); ?>images/53-170x126.jpg" alt="" ></a> </div>
                          <h3><a href="post-standart.php">Praesent at erat eu metus luctus blandit.</a></h3>
                          <div class="post-info"> <a href="post-standart.php" class="post_date">May 30, 2013</a> <a href="post-standart.php" class="comments_count">1</a> </div>
                        </article>
                      </div>
                    </div>-->
        <div id="comments" class="post_comments">
            <div id="respond">
                <!--                <h3 class="comments_title">Comments</h3>
                                <ol class="comment-list">
                                  <li class="comment">
                                    <div class="photo"><img src="<?php //echo $obj->baseUrlF();       ?>images/b5a37fca93d6cc2e271d7866d896a785.png" alt=""></div>
                                    <div class="extra_wrap">
                                      <h5><a href="page-author.php">admin</a></h5>
                                      <div class="comment_info">
                                        <div class="comment_date">June 2, 2013 at 6:40 am</div>
                                        <div class="comment_reply_link"><a class="comment-reply-link">Reply</a></div>
                                      </div>
                                      <div class="comment_content">
                                        <p>Curabitur pellentesque viverra mollis.</p>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="comment">
                                    <div class="photo"><img src="<?php //echo $obj->baseUrlF();       ?>images/b5a37fca93d6cc2e271d7866d896a785.png" alt=""></div>
                                    <div class="extra_wrap">
                                      <h5><a href="page-author.php">admin</a></h5>
                                      <div class="comment_info">
                                        <div class="comment_date">June 2, 2013 at 6:44 am</div>
                                        <div class="comment_reply_link"><a class="comment-reply-link">Reply</a></div>
                                      </div>
                                      <div class="comment_content">
                                        <p>Sed vel nisi a ante consequat fermentum nec vel massa.</p>
                                      </div>
                                    </div>
                                  </li>
                                </ol>-->
                <h3 id="reply-title">Leave comment</h3>
                <!--                <form method="post" id="commentform" action="">
                                  <p class="comment-form-author">
                                    <input id="author" name="author" type="text" value="" size="30"  />
                                    <label for="author" class="required">Name</label>
                                  </p>
                                  <p class="comment-form-email">
                                    <input id="email" name="email" type="text" value="" size="30"  />
                                    <label for="email" class="required">Email</label>
                                  </p>
                                  <p class="comment-form-url">
                                    <input id="url" name="website" type="text" value="" size="30" />
                                    <label for="url">Website</label>
                                  </p>
                                  <p class="comment-form-comment">
                                    <textarea id="comment" name="comment" cols="45" rows="8" ></textarea>
                                  </p>
                                  <p class="form-submit">
                                    <input name="submit" type="submit" id="submitComm" value="Post comment" />
                                  </p>
                                </form>-->
                <div id="disqus_thread"></div>
                <script>

                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                     var disqus_config = function () {
                     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                     };
                     */
                    (function () { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = '//bdnewsrobot-com.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            </div>
            <!-- /#respond -->
            
            <!----
                  <div id=vuukle-emote></div>
                  <div id=vuukle_div></div>
                  <script src=http://vuukle.com/js/vuukle.js type=text/javascript></script>
                  <script type=text/javascript>
                    var VUUKLE_CUSTOM_TEXT = '{ "rating_text": "Give a rating:", "comment_text_0": "Leave a comment", "comment_text_1": "comment", "comment_text_multi": "comments", "stories_title": "Talk of the Town" }';
                    var UNIQUE_ARTICLE_ID = "Please pass the unique article id of the article";
                    var SECTION_TAGS = "tag1, tag2, tag3";
                    var ARTICLE_TITLE = "Please pass the title or heading of the story";
                    var GA_CODE = "UA-123456";
                    var VUUKLE_API_KEY = "f72e5fbe-37b8-444a-9305-b9ac82b4ec4d";
                    var TRANSLITERATE_LANGUAGE_CODE = "en";
                    var VUUKLE_COL_CODE = "148aa3";
                    var ARTICLE_AUTHORS = btoa(encodeURI('[{"name": "name one", "email":"some_mail@site.com","type": "internal"}, {"name":"name two", "email":"some_other_mail@site.com","type": "external"}]'));
                    create_vuukle_platform(VUUKLE_API_KEY, UNIQUE_ARTICLE_ID, "0", SECTION_TAGS, ARTICLE_TITLE, TRANSLITERATE_LANGUAGE_CODE, "1", "", GA_CODE, VUUKLE_COL_CODE, ARTICLE_AUTHORS);
                  </script>
                --->
            <div class="nav_comments"></div>
        </div>
    </div>
</div>
