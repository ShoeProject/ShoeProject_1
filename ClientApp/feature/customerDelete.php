<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';

$id = $_GET['id'];
$DelSql = "DELETE FROM customer WHERE id='$id'";
$res =$dbConn->executeQuery($DelSql);
if($res){
	header('location: customerView.php');
}else{
	echo "Failed to delete";
}
?>