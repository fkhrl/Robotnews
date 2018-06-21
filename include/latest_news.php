
<div class="tab_content" id="tabs1">
                                    <?php
                                    $sqllatestnews = $obj->FlyQuery("SELECT * FROM compose_news ORDER BY id DESC LIMIT 10");
                                    if (!empty($sqllatestnews)) {
                                        foreach ($sqllatestnews as $latestnews):
                                            ?>
                                            <div class="block_home_news_post">
                                                <div class="info">
                                                    <!--<div class="date">17:04</div>-->
                                                </div>

                                                <p class="title"><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $latestnews->id;?>/<?php echo $obj->CleanParam($latestnews->news_headding); ?>"><?php echo $latestnews->news_headding; ?></a></p>

                                            </div>
                                            <?php
                                        endforeach;
                                    }
                                    ?>

                                </div>