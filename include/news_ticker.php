<div id="flexslider-news" class="header_news_ticker">
                        <ul class="news slides" >
                            <?php
                            if (!empty($sqlBreakingNews)) {
                                foreach ($sqlBreakingNews as $BreakingNews):
                                    ?>
                                    <li><a href="<?php echo $obj->baseUrlF();?>newsdetail/<?php echo $BreakingNews->id;?>/<?php echo $obj->CleanParam($BreakingNews->news_headding); ?>"><?php echo html_entity_decode($BreakingNews->news_headding); ?></a></li>
                                    <?php
                                endforeach;
                            }
                            ?>
                        </ul>
                    </div>