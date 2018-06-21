<?php
$table="compose_news"; ?><?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
?>
<!doctype html>
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
		 ?>
    </head>
    <body class="">
		<?php 
		include('include/topnav.php'); 
		include('include/mainnav.php'); 
		?>
        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Compose News Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="compose_news.php">Create New Compose News</a></li>
                    <li class="active"><a href="#">Compose News Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="compose_news_35"></div>
            </div>
        </div>
        <!-- // Compose News END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Compose News wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_compose_news" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="compose_news.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_compose_news" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(compose_news_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./json_data/banner_list.php",
                            data: {id: compose_news_id,table:"compose_news",acst:3},
                            success: function (result) {
							if(result==1)
							{
								location.reload();
							}
							else
							{
								$(".k-i-refresh").click();
							}
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
					var postarray={"id":1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 5,
                        transport: {
                            read: {
                                url: "./json_data/banner_list.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"compose_news_view",
									"cond":0,
									"multi":postarray
									
								}
                            }
                        },
                        autoSync: false,
                        schema: {
                            data: "data",
                            total: "data.length",
                            model: {
                                id: "id",
                                fields: {
                                    id: {nullable: true},news_headding: {type: "string"},news_sub_headding: {type: "string"},reporter: {type: "string"},news_thumble: {type: "string"},news_short_details: {type: "string"},news_long_details: {type: "string"},home_page: {type: "string"},breaking_news: {type: "string"},tab_lead_news: {type: "string"},slider_image: {type: "string"},news_publish: {type: "string"},news_status: {type: "string"},news_date_time: {type: "string"},news_robot: {type: "string"},
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#compose_news_35").kendoGrid({
                        dataSource: dataSource,
                        filterable: true,
                        pageable: {
                            refresh: true,
                            input: true,
                            numeric: false,
                            pageSizes: true,
                            pageSizes: [5, 10, 20, 50],
                        },
                        sortable: true,
                        groupable: true,
                        columns: [{field: "id", title: "#"},
                            {field: "news_headding", title: "News Headding"},
                            {field: "reporter", title: "Reporter"},
                            {field: "news_publish", title: "News Publish"},
                            {field: "news_date_time", title: "News Date Time"},
			    {field: "date", title: "Record Added", width: "150px"},
			    {
                                title: "Edit",
                                template: kendo.template($("#edit_compose_news").html())
                            },
			    {
                                title: "Delete",
                                template: kendo.template($("#delete_compose_news").html())
                            }
                        ]
                    });
                });

            </script>    
    <?php 
	echo $plugin->TableJs(); 
	echo $plugin->KendoJS(); 
	?>
    
</body>
</html>