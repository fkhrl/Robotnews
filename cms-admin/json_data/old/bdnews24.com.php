<?php

include("../class/auth.php");
extract($_POST);
//bot engine
$postdata = http_build_query(
        array(
            'EID' => 1,
            'ID' => 1
        )
);

$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded'
    //'content' => $postdata
    )
);

$context = stream_context_create($opts);
//step1
$result = file_get_contents('http://bangla.bdnews24.com/', false, $context);
//echo $result;
//bot 1st step complete
//bot grab text start
//$sPattern="/<div class=\"homeTopLeadSlider\">(.*?)<\/div>/s";
//$sPattern = "/<div class=\"article \news-bn\ \first\ \default \">(.*?)<\/div>/s";
$sPattern='{<div\s+class="text"\s*>((?:(?:(?!<div[^>]*>|</div>).)++|<div[^>]*>(?1)</div>)*)</div>}si';
$sText = $result;
preg_match_all($sPattern, $sText, $aMatch);

//print_r($aMatch[0][0]);
//exit();

//Find out image
//step1
$imgsPattern="/<img src=\"(.*?)\"/s";
//$imgsPattern = "/<div class=\"newsTop\">(.*?)<\/div>/s";
$imgtext = $aMatch[0][0];
preg_match_all($imgsPattern, $imgtext, $imgMatch);


 $imgurltag =str_replace('"',"",str_replace('<img src="',"",$imgMatch[0][0]));



//Find out New Headding
//step2
$headingPattern = "/<h1 class=\"default\">(.*?)<\/h1>/s";
$headingtext = $aMatch[0][0];
preg_match_all($headingPattern, $headingtext, $headingMatch);

$news_heading=strip_tags($headingMatch[0][0]);

//print_r($news_heading);
//exit();


//Find out News Link
//step3

$detailPattern ="/<a\s[^>]*href=(\"??)(http[^\" >]*?)\\1[^>]*>(.*)<\/a>/siU";
$detailtext = $aMatch[0][0];
preg_match_all($detailPattern, $detailtext, $detailMatch);

//$detailtext_re=str_replace("a","",strip_tags($detailMatch));
//$detailtext_rep=str_replace("href=","",$detailtext_re);
//$detailpagelik=str_replace('"',"",$detailtext_rep);
$detailpagelik = $detailMatch[2][0];
//print_r($detailpagelik);
//exit();



//Find out News Short Details
//step4

//$detailPatternlink = '{<div\s+id="dtl"\s*>((?:(?:(?!<div[^>]*>|</div>).)++|<div[^>]*>(?1)</div>)*)</div>}si';
//$detaillinktext = file_get_contents($detailMatch[1][0], false, $context);
//preg_match_all($detailPatternlink, $detaillinktext, $detaillinkMatch);
//
//$detail_content = $detaillinkMatch[1][0];


$detailPatternlink = '/<p .*?\>(.*?)<\/p>/si';
$detaillinktext = $aMatch[0][0];
preg_match_all($detailPatternlink, $detaillinktext, $detaillinkMatch);

//$ddetailpagelik = $ddetailMatch[0][0];
//$shortdetailpage = str_replace("....","",strip_tags($detaillinkMatch[0][0]));
$shortdetailpage=strip_tags($detaillinkMatch[0][0]);

//print_r($shortdetailpage);
//exit();



//Find out News Long Details
//step4

//$detailPatternlink = '{<div\s+id="dtl"\s*>((?:(?:(?!<div[^>]*>|</div>).)++|<div[^>]*>(?1)</div>)*)</div>}si';
//$detaillinktext = file_get_contents($detailMatch[1][0], false, $context);
//preg_match_all($detailPatternlink, $detaillinktext, $detaillinkMatch);
//
//$detail_content = $detaillinkMatch[1][0];


$longdetailPatternlink ="/\<div class=\"wrappingContent \"\>(.*?)\<\/div\>/is";
$longdetaillinktext = file_get_contents($detailpagelik, false, $context);
preg_match_all($longdetailPatternlink, $longdetaillinktext, $longdetaillinkMatch);


//$longdetaillin=  str_replace('#<style type=\"text/css\">(.*?)</style>#', " ", strip_tags($longdetaillinkMatch[0][0]));
$longdetail_content = strip_tags($longdetaillinkMatch[0][0]);


//print_r($longdetail_content);
//exit();
//insert system
$exists_array = array("news_headding"=>$news_heading,"reporter"=>6,"news_thumble"=>$imgurltag);
if ($obj->exists_multiple("compose_news", $exists_array) == 0) {
    
    
    //echo $imgurl;
    $img = explode(".", basename($imgurltag));

    $extension=$img['1'];
    $newname_image="bdnews24_".time().".".$extension;
    
    copy($imgurltag, '../../news_thumble/'.$newname_image);
    
    $insertarray = array("news_headding" => $news_heading,
        "reporter" => 6,
        "news_thumble" => $newname_image,
        "news_short_details" => $shortdetailpage,
        "news_long_details" => $longdetail_content,
        "news_status" => 0,
        "news_date_time" => date('D d M Y'),
        "news_robot" => 1,
        "news_publish" =>'Pending',
        "date" => date('Y-m-d'),
        "status" => 1);
    $obj->insert("compose_news", $insertarray);

    echo "Grab Done";
} else {
    echo "Grab Failed";
}
?>