<?php
  //$json = json_decode(file_get_contents('php://input'), true);
  if (session_status() == PHP_SESSION_NONE) {
    // There is no active session
    session_start();
  } 
  //access database connection
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/ShoeProject_1";
  $db_path = $path . "/Logic/DataAccess/";

  //$customerId=$_SESSION['customer_id'];
  
  include $db_path.'DBConnect.php';

  if (isset($_GET['data'])) {
    echo "<script>console.log('recieved')</script>";
    // Your PHP function logic here
    //write insert query
    $sql = "delete from cart where product_id='".$_GET['data']."'";

    $dbConn->executeQuery($sql);
    




  }else{
    echo "<script>alert('all set')</script>";
  }
?>
