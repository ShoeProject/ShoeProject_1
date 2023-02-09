<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path.'DBConnect.php';


if (isset($_POST['btnOrder'])) {
  $orderDate = $_POST['order_date'];
  $orderTime = $_POST['order_time'];
  $customerId = $_POST['customer_id'];
  $productId = $_POST['product_id'];
 
 
  
  $query = "INSERT INTO orders (order_date, order_time,customer_id,product_id) VALUES ('$orderDate','$orderTime','$customerId','$productId')";
  
  if ($dbConn->executeQuery($query) === true) {
    echo "<script>alert('Database execute succeed..!');</script>";
    header('location: orderView.php');
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }	
}


?>
<html>

<head>
    <title>Orders Page</title>
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../vendor/components/jquery.slim.min.js"></script>
    <script src="asset/js/main.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div><?php include '../shared/header.php'; ?></div>
        <div class="row flex-nowrap">
            <?php include 'sidebar.php' ?>
            <div class="col py-1">
                <div class="container-fluid">
                    <!-- <form action="" method="post"><button type="submit" name="prodbtn">product</button></form> -->
                    
                   <form class="w-50" method="POST" action="" enctype="multipart/form-data">
                   <fieldset enabled>
                     <legend>Orders</legend>
                     <div class="mb-4 pt-5 w-50">
                        <label for="" class="mb-4">Select Order Date & Time</label>
                       <input type="datetime-local" id="disabledTextInput" name="news_heading" class="form-control" placeholder="Order Date">
                     </div>
                     

                     <div class="mb-3 pb-4 w-50">
                     
                       <input type="text" id="disabledTextInput" name ="news_content"class="form-control" placeholder="Customer Id">
       
                     </div>

                     <div class="mb-3 pb-4 w-50">
                       <input type="text" id="disabledTextInput" name ="news_content"class="form-control" placeholder="Product Id">
       
                     </div>

                     
                     <div>
                       <button type="submit" name ="btnOrder"class="btn btn-warning ">ADD</button>
                       <button type="submit" class="btn btn-warning ms-3">Reset</button>
                     </div>
                   </fieldset>
                 </form>
                    
                </div>

            </div>
        </div>
    </div>

</body>

</html>