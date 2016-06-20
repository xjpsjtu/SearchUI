<!DOCTYPE html> 
<html> 
<head>
	<meta charset="utf-8">
	<title>SEARCH-RESULT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
<div class="main2">
<a href="search.html" class="back"><p class="Text2">&lt;&lt; Back</p></a>
<div>
<?php 
$url = 'http://localhost:81/search/data.html';
$jsonstr = file_get_contents($url);

$json = json_decode($jsonstr,true);
$titlearray = $json["response"]["docs"];
$higharray = $json["highlighting"];
$contentarray = array();
$j = 0;
foreach($higharray as $key){
	foreach($key as $content => $val){
		$contentarray[$j] = $val[0];
		$j++;
	}
}
$doc_num = count($titlearray);
$page_item=5;
$max_page=ceil($doc_num/$page_item);
$page = $_GET['page'];
$next_page = min($page + 1,$max_page);
if($page > 1)$former_page=$page-1;
else $former_page=$page;
echo('<div class="page" >');
echo('<a href="result.php?page=' .$former_page .'" class="page" style="float:left"><p class="Text3">&lt;&lt; Prev Page&nbsp;&nbsp;</p></a>'  .'<p style="float:left">' .$page .'</p>'   .'<a href="result.php?page=' .$next_page .'" class="page" ><p class="Text3">&nbsp;&nbsp;Next Page &gt;&gt;</p></a>');
echo('</div>');
echo("<br>");

for($i = max(0,($page-1)*$page_item); $i < min($doc_num,$page*$page_item); $i++){
	echo "<div class=" .'"search"' .">";
	$doc_title = $titlearray[$i]["title"];
	$doc_url = $titlearray[$i]["url"];
	echo('&bull;&raquo;<a href="' . $doc_url . '">' . $doc_title .'</a><br>');
	echo "<p class=" .'"url"' .">" .$doc_url ."</p>" ;
	echo "<p class=" .'"content"' .">..." .$contentarray[$i] ."...</p>";
	echo "</div>";
	echo "<br>";
}















?> 

</body> 
</html>