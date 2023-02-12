<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/";

$db_path = $path . "/Logic/DataAccess/";
include $db_path.'DBConnect.php';


$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1/';
if (session_status() == PHP_SESSION_NONE) {
    // There is no active session
    session_start();
} 

include $path."FrontEnd/shared/header.php";




?>



