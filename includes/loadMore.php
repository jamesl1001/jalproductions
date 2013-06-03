<?php
include 'getDeviations.php';
$start = $_GET['start'];
$page  = $_GET['page'];
switch($page) {
	case threed:
		$album = 27123361;
		break;
	case artdesign:
		$album = 27123352;
		break;
	case photography:
		$album = 27123391;
		break;
}
$html  = getDeviations("http://backend.deviantart.com/rss.xml?q=gallery:fu51on/$album", 8, $start);
$_SESSION['loaded'] = $_SESSION['loaded'] + 8;
// var_dump($_SESSION['loaded']);
echo $html;