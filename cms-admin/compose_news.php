<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin = new cmsPlugin();
$table = "`compose_news`";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($news_headding) ) {

        include('class/uploadImage_Class.php');
        $imgclassget = new image_class();
        $news_thumble = $imgclassget->upload_fiximage("upload", "news_thumble", "news_thumble_upload_" . $table_name . "_" . time());
        $slider_image = $imgclassget->upload_fiximage("upload", "slider_image", "slider_image_upload_" . $table_name . "_" . time());

        $insert = array('news_headding' => $news_headding,
            'news_sub_headding' => $news_sub_headding,
            'reporter' => $reporter,
            'news_thumble' => $news_thumble,
            'news_short_details' => $news_short_details,
            'news_long_details' => $news_long_details,
            'home_page' => $home_page,
            'breaking_news' => $breaking_news,
            'tab_lead_news' => $tab_lead_news,
            'slider_image' => $slider_image,
            'news_publish' => $news_publish,
            'news_status' => $news_status,
            'news_date_time' => $news_date_time,
            'news_robot' => $news_robot,
            'select_category_news' => $select_category_news,
            'select_subcategory_news' => $select_subcategory_news,
            'date' => date('Y-m-d'),
            'status' => 1);
        if ($obj->insert($table, $insert) == 1) {
            $plugin->Success("Successfully Saved", $obj->filename());
        } else {
            $plugin->Error("Failed", $obj->filename());
        }
    } else {
        $plugin->Error("Fields is Empty", $obj->filename());
    }
} elseif (isset($_POST['update'])) {
    extract($_POST);

    if (!empty($select_category_news)) {
        $updatearray = array("id" => $id);



        include('class/uploadImage_Class.php');
        $imgclassget = new image_class();

        if (!empty($_FILES['news_thumble']['name'])) {
            $news_thumble_1 = $imgclassget->upload_fiximage("../news_thumble", "news_thumble", "news_thumble_upload_" . $table_name . "_" . time());
            $news_thumble = $news_thumble_1;
            @unlink("upload/" . $ex_news_thumble);
        } else {
            $news_thumble = $ex_news_thumble;
        }

        if (!empty($_FILES['slider_image']['name'])) {
            $slider_image_1 = $imgclassget->upload_fiximage("upload", "slider_image", "slider_image_upload_" . $table_name . "_" . time());
            $slider_image = $slider_image_1;
            @unlink("upload/" . $ex_slider_image);
        } else {
            $slider_image = $ex_slider_image;
        }

        $upd2 = array('news_headding' => $news_headding, 'news_sub_headding' => $news_sub_headding, 'reporter' => $reporter, 'news_thumble' => $news_thumble, 'news_short_details' => $news_short_details, 'news_long_details' => $news_long_details, 'home_page' => $home_page, 'breaking_news' => $breaking_news, 'tab_lead_news' => $tab_lead_news, 'slider_image' => $slider_image, 'news_publish' => $news_publish, 'news_status' => $news_status, 'news_date_time' => $news_date_time, 'news_robot' => $news_robot, 'select_category_news' => $select_category_news, 'select_subcategory_news' => $select_subcategory_news, 'date' => date('Y-m-d'), 'status' => 1);
        $update_merge_array = array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        } else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
} elseif (isset($_GET['del']) == "delete") {
    $delarray = array("id" => $_GET['id']);
    $photolink = $obj->SelectAllByVal($table, 'id', $_GET['id'], 'slider_image');
    @unlink("upload/" . $photolink);
    if ($obj->delete($table, $delarray) == 1) {
        $plugin->Success("Successfully Delete", $obj->filename());
    } else {
        $plugin->Error("Failed", $obj->filename());
    }
}
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
        echo $plugin->KendoCss();
        echo $plugin->FileUploadCss();
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>





        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Compose News</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Compose News</a></li>
                    <li><a href="compose_news_data.php">Compose News List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                <!-- Widget -->
                <div class="widget widget-inverse" >
                    <?php if (isset($_GET['edit'])) { ?>
                        <!-- Widget heading -->
                        <div class="widget-head">
                            <h4 class="heading">Update/Change - Compose News</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Headding </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='news_headding' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_headding"); ?>' placeholder='News Headding' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Sub Headding </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='news_sub_headding' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_sub_headding"); ?>' placeholder='News Sub Headding' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Reporter </label>

                                    <div class='col-sm-6'><!--
                                            <input type='text' id='form-field-1' name='reporter' placeholder='Reporter'  value='<?php //echo         ?>'  class='form-control' />-->
                                        <select id='form-field-1' name='reporter'class='form-control'>
                                            <option>Select A Reporter Name</option>
                                            <?php
                                            $reporter_id = $obj->SelectAllByVal($table, "id", $_GET['edit'], "reporter");
                                            $sqlreporter = $obj->FlyQuery("Select id,name from reporter");
                                            if (!empty($sqlreporter)) {
                                                foreach ($sqlreporter as $reporter):
                                                    ?>
                                                    <option <?php if ($reporter_id == $reporter->id) { ?> selected="selected"<?php } ?> value="<?php echo $reporter->id ?>"><?php echo $reporter->name ?></option>

                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Thumble </label>

                                    <div class='col-sm-3'>
                                            <!--<input type='file' id='id-input-file-1' name='news_thumble' placeholder='News Thumble' class='form-control' />
                                        --><?php
                                        $news_thumble = $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_thumble");
                                        echo $plugin->FileUploadBoxRobot("1", "$news_thumble", "news_thumble");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Short Details </label>

                                    <div class='col-sm-9'>
                                        <textarea id='editor' name='news_short_details' placeholder='News Short Details' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_short_details"); ?></textarea>
                                        <script>
                                            $(document).ready(function () {
                                                // create Editor from textarea HTML element with default set of tools
                                                $("#editor").kendoEditor({resizable: {
                                                        content: true,
                                                        toolbar: true
                                                    }});
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Long Details </label>

                                    <div class='col-sm-9'>
                                        <textarea id='editor1' name='news_long_details' placeholder='News Long Details' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_long_details"); ?></textarea>
                                        <script>
                                            $(document).ready(function () {
                                                // create Editor from textarea HTML element with default set of tools
                                                $("#editor1").kendoEditor({resizable: {
                                                        content: true,
                                                        toolbar: true
                                                    }});
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Home Page </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='home_page' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "home_page"); ?>' placeholder='Home Page' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Breaking News </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='breaking_news' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "breaking_news"); ?>' placeholder='Breaking News' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Tab Lead News </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='tab_lead_news' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "tab_lead_news"); ?>' placeholder='Tab Lead News' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Slider image </label>

                                    <div class='col-sm-3'>
                                            <!--<input type='file' id='id-input-file-1' name='slider_image' placeholder='Slider image' class='form-control' />
                                        --><?php
                                        $slider_image = $obj->SelectAllByVal($table, "id", $_GET['edit'], "slider_image");
                                        echo $plugin->FileUploadBox("1", "$slider_image", "slider_image");
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Publish </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='news_publish' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_publish"); ?>' placeholder='News Publish' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Status </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='news_status' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_status"); ?>' placeholder='News Status' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Date Time </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='datetime' name='news_date_time' placeholder='News Date Time' class='form-control' />
                                        <script>
                                        $(document).ready(function () {
                                            // create DateTimePicker from input HTML element
                                            $("#datetime").kendoDateTimePicker({
                                                value: '<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_date_time"); ?>'
                                            });
                                        });
                                    </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> News Robot </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='news_robot' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "news_robot"); ?>' placeholder='News Robot' class='form-control' />
                                    </div></div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Select Category News </label>

                                    <div class='col-sm-9'>
                                        <!--<input type='text' id='form-field-1' name='select_category_news' value='<?php //echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "select_category_news");     ?>' class='form-control' />-->
                                        <select name="select_category_news" id='category'class='form-control'>
                                            <option value="">Select A Category</option>
                                            <?php
                                            $category_id = $obj->SelectAllByVal($table, "id", $_GET['edit'], "select_category_news");
                                            $sqlcategory = $obj->FlyQuery("Select * from category");
                                            if (!empty($sqlcategory)) {
                                                foreach ($sqlcategory as $category):
                                                    ?>
                                                    <option <?php if ($category_id == $category->id) { ?> selected="selected"<?php } ?> value="<?php echo $category->id ?>"><?php echo $category->name ?></option>

                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Select SubCategory News </label>

                                    <div class='col-sm-9'>
                                        <!--<input type='text' id='form-field-1' name='select_subcategory_news' placeholder='Select SubCategory News' class='form-control' />-->
                                        <select name="select_subcategory_news" id='subcategory' class='form-control'>
                                            <option value="0">Select A Category</option>
                                            <?php
                                            $subcategory_id = $obj->SelectAllByVal($table, "id", $_GET['edit'], "select_subcategory_news");
                                            $sqlsubcategory = $obj->FlyQuery("Select * from sub_category");
                                            if (!empty($sqlsubcategory)) {
                                                foreach ($sqlsubcategory as $subcategory):
                                                    ?>
                                                    <option <?php if ($subcategory_id == $subcategory->id) { ?> selected="selected"<?php } ?> value="<?php echo $subcategory->id ?>"><?php echo $subcategory->name ?></option>

                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div><div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button  onclick="javascript:return confirm('Do You Want change/update These Record?')"  type="submit" name="update" class="btn btn-primary">Save Change</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } else { ?>
                    <!-- Widget heading -->
                    <div class="widget-head">
                        <h4 class="heading">Create New Compose News</h4>
                    </div>
                    <!-- // Widget heading END -->

                    <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Headding </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='news_headding' placeholder='News Headding' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Sub Headding </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='news_sub_headding' placeholder='News Sub Headding' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Reporter </label>

                                <div class='col-sm-6'>
                                    <select id='form-field-1' name='reporter'class='form-control'>
                                        <option>Select A Reporter Name</option>
                                        <?php
                                        $sqlreporter = $obj->FlyQuery("Select id,name from reporter");
                                        if (!empty($sqlreporter)) {
                                            foreach ($sqlreporter as $reporter):
                                                ?>
                                                <option value="<?php echo $reporter->id ?>"><?php echo $reporter->name ?></option>

                                                <?php
                                            endforeach;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Thumble </label>

                                <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='news_thumble' placeholder='News Thumble' class='form-control' />
                                    --><?php
                                    echo $plugin->FileUploadBox("0", "", "news_thumble");
                                    ?>
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Short Details </label>

                                <div class='col-sm-9'>
                                    <textarea id='editor' name='news_short_details' placeholder='News Short Details' class='form-control'></textarea>
                                    <script>
                                        $(document).ready(function () {
                                            // create Editor from textarea HTML element with default set of tools
                                            $("#editor").kendoEditor({resizable: {
                                                    content: true,
                                                    toolbar: true
                                                }});
                                        });
                                    </script>
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Long Details </label>

                                <div class='col-sm-9'>
                                    <textarea id='editor1' name='news_long_details' placeholder='News Long Details' class='form-control'></textarea>
                                    <script>
                                        $(document).ready(function () {
                                            // create Editor from textarea HTML element with default set of tools
                                            $("#editor1").kendoEditor({resizable: {
                                                    content: true,
                                                    toolbar: true
                                                }});
                                        });
                                    </script>
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Home Page </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='home_page' placeholder='Home Page' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Breaking News </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='breaking_news' placeholder='Breaking News' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Tab Lead News </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='tab_lead_news' placeholder='Tab Lead News' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Slider image </label>

                                <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='slider_image' placeholder='Slider image' class='form-control' />
                                    --> <?php
                                    echo $plugin->FileUploadBox("0", "", "slider_image");
                                    ?>
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Publish </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='news_publish' placeholder='News Publish' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Status </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='news_status' placeholder='News Status' class='form-control' />
                                </div>
                            </div><div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Date Time </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='datetimepicker' name='news_date_time' placeholder='News Date Time' class='form-control' />
                                    <script>
                                        $(document).ready(function () {
                                            // create DateTimePicker from input HTML element
                                            $("#datetimepicker").kendoDateTimePicker({
                                                value: new Date()
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> News Robot </label>

                                <div class='col-sm-9'>
                                    <input type='text' id='form-field-1' name='news_robot' placeholder='News Robot' class='form-control' />
                                </div>
                            </div>
                            <div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Select Category News </label>

                                <div class='col-sm-9'>
                                    <!--<input type='text' id='form-field-1' name='select_category_news' placeholder='Select Category News' class='form-control' />-->
                                    <select name="select_category_news" id='category'class='form-control'>
                                        <option value="">Select A Category</option>
                                        <?php
                                        $sql_category = $obj->FlyQuery("Select * from category");
                                        if (!empty($sql_category)) {
                                            foreach ($sql_category as $category):
                                                ?>
                                                <option value="<?php echo $category->id ?>"><?php echo $category->name; ?></option>

                                                <?php
                                            endforeach;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class='form-group'>
                                <label  for="inputEmail3" class="col-sm-2 control-label"> Select SubCategory News </label>

                                <div class='col-sm-9'>
                                    <!--<input type='text' id='form-field-1' name='select_subcategory_news' placeholder='Select SubCategory News' class='form-control' />-->
                                    <select name="select_subcategory_news" id='subcategory' class='form-control'>
                                        <option value="">Select A SubCategory</option>
                                        <?php
                                        $sql_subcategory = $obj->FlyQuery("Select * from sub_category WHERE category='category'");
                                        if (!empty($sql_subcategory)) {
                                            foreach ($sql_subcategory as $subcategory):
                                                ?>
                                                <option value="<?php echo $subcategory->id ?>"><?php echo $subcategory->name ?></option>

                                                <?php
                                            endforeach;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit"   onclick="javascript:return confirm('Do You Want Create/save These Record?')"  name="create" class="btn btn-info">Save</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
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

<script>
                                $(document).ready(function(){
                                    $('#category').change(function () {
                                    var cid = $(this).val();
                                    //alert(cid);
                                    $.post("ajax/compose_news.php", {cid:cid}, function(cat){
                                        $("#subcategory").html(cat);
                                    });
                                });
                                });
                                
                                                            
                            </script>

<?php
echo $plugin->TableJs();
echo $plugin->KendoJS();
echo $plugin->FileUploadJS();
?>
</body>
</html>