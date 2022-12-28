<?php 
    $id = $_GET['id'];
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/ShoeProject_1";
    $db_path = $path . "/Logic/DataAccess/";

    include $db_path.'DBConnect.php';

    include_once("../Shared/header.php");

    echo $id;
?>