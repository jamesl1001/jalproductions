<?php
if( $_SERVER["REQUEST_URI"] == "/" ) {
	echo "index";
} else if( $_SERVER["REQUEST_URI"] == "/3d.php" || $_SERVER["REQUEST_URI"] == "/3dmodellingmech.php" || $_SERVER["REQUEST_URI"] == "/3dmodellingrace.php" || $_SERVER["REQUEST_URI"] == "/dt1.php" || $_SERVER["REQUEST_URI"] == "/dt2.php" || $_SERVER["REQUEST_URI"] == "/dt3.php" ) {
	echo "threed";
} else {
	$removeslash = substr($_SERVER["REQUEST_URI"], 1);
	$removevars = explode("?", $removeslash);
	$removefiletype = explode(".", $removevars[0]);
	echo $removefiletype[0];
}
?>