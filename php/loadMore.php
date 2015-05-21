<?php
include 'getDeviations.php';
$start = $_GET['start'];
$page  = $_GET['page'];
switch($page) {
    case 'threed':
        $album = 27123361;
        break;
    case 'artdesign':
        $album = 27123352;
        break;
    case 'photography':
        $album = 54555081;
        break;
}
$html = getDeviations("http://backend.deviantart.com/rss.xml?q=gallery:fu51on/$album", 8, $start, true);
session_start();
$_SESSION["loaded-$page"] = $_SESSION["loaded-$page"] + 8;
echo $html;