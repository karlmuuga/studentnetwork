<?php
$connect = mysql_connect('localhost','PHP','5qokYU0zhVASA1vq630L','studntwrk');
if(!$connect){
	die( 'Could not connect: '.mysql_error() );
}

$db_selected = mysql_select_db("studntwrk");
if(!$db_selected){
	die( ' Could not select database: '.mysql_error() );
}
mysql_set_charset('utf8', $connect);
?>
