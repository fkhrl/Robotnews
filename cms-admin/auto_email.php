<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin = new cmsPlugin();
$table = "automatic_grab_news";
?>
<?php

?><!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
        <?php
        echo $plugin->softwareTitle();
        echo $plugin->TableCss();
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>





        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Automatic Grab News</h1>
            <div class="innerAll spacing-x2">
                <?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                <!-- Widget -->
                <div class="widget widget-inverse">

                    <div class="row-fluid">
                        <?php
                        $sqlelist = $obj->FlyQuery("SELECT * FROM automatic_grab_news");
                        if (!empty($sqlelist)) {
                            $i = 1000;
                            foreach ($sqlelist as $el):
                                ?>
                                <div class="well-sm col-md-4 col-md-offset-1">
                                    <pre><?php echo $el->name; ?> <br>Status : <span id="<?php echo $i; ?>">Pending</span></pre>
                                </div>

                                <script>
                                    $(document).ready(function () {
                                        setTimeout(function () {
                                            $.post("<?php echo $obj->baseUrl(); ?>json_data/<?php echo $el->link; ?>", {'id': 1}, function (data) {
                                                            console.log('<?php echo $el->name; ?>');
                                                            var dd='';
                                                            if (data == "Grab Done")
                                                            {
                                                                dd='<label class="label label-success">'+data+'</label>';
                                                            }
                                                            else
                                                            {
                                                                dd='<label class="label label-danger">'+data+'</label>';
                                                            }

                                                            $("#<?php echo $i; ?>").html(dd);
                                                        });

                                                    },<?php echo $i; ?>);
                                                });
                                </script>
                                <?php
                                $i+=40000;
                                ?>
                                <?php
                            endforeach;
                        }
                        ?>
                        <script>
                            $(document).ready(function () {
                                setInterval(function () {
                                    window.location.href = "<?php echo $obj->filename(); ?>";
                                },<?php echo $i; ?>);
                            });
                        </script>    

                    </div>

                </div>
                <!-- // Widget END -->




                <!-- // Widget END -->
            </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->

    <?php echo $plugin->TableJs(); ?></body>
</html>