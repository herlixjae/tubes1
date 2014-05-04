<?php
$basefolder="bolaportal";
$dbhost="localhost";
$dbuser="root";
$dbpass="root";
$dbname="portalboladb";
$base_url="http://localhost/".$basefolder."/";
$con=mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$rs=mysql_select_db($dbname);
$pathfolder =$_SERVER['DOCUMENT_ROOT']."/".$basefolder."/uploads/"; 
?>
