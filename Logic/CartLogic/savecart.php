<?php
  //$json = json_decode(file_get_contents('php://input'), true);

  //access database connection
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/ShoeProject_1";
  $db_path = $path . "/Logic/DataAccess/";

  $customerId="";
  
  include $db_path.'DBConnect.php';

  if (isset($_GET['data'])) {
    echo "<script>console.log('recieved')</script>";
    // Your PHP function logic here
    //write insert query
    $sql = "INSERT INTO cart (product_id,qty) values('".$_GET['data']."',1)";

    $dbConn->executeQuery($sql);
    




  }else{
    echo "<script>alert('all set')</script>";
  }
?>
