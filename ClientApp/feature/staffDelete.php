<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';

$username = $_GET['username'];
$DelSql = "DELETE FROM employee WHERE username='$username'";
$res =$dbConn->executeQuery($DelSql);
if($res){
	header('location: staffView.php');
}else{
	echo "Failed to delete";
}
?>