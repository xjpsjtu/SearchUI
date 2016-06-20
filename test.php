<!DOCTYPE html> 
<html> 
<head>
	<meta charset="utf-8">
	<title>SEARCH-RESULT</title>
</head>
<body> 
<?php 
$url = 'http://localhost:81/search/data.html';
$jsonstr = file_get_contents($url);
echo($jsonstr);
str_replace("@", "<em>", $jsonstr);
echo($jsonstr);
?>

</body> 
</html>