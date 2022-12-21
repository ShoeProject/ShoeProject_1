<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';

$id = $_GET['id'];
$DelSql = "DELETE FROM product_sub_categories WHERE id='$id'";
$res =$dbConn->executeQuery($DelSql);
if($res){
	header('location: SubCategoryView.php');
}else{
	echo "Failed to delete";
}
?>