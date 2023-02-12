
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
$customerId = $_SESSION['customer_id'];
?>
-----------------------------------

<?php
$SelSql = "Select c.*,p.item_price,p.name from cart as c,product as p where c.customer_id='$customerId' AND p.id = c.product_id";
$result = $dbConn->executeQuery($SelSql);
$totalprice = 0.00;
$productIds = array();
$qtys = array();
$prices = array();
if ($result->num_rows > 0) {
?>
<div class="container p-4">
<div class="row bg-dark mb-1">
    <div class="col text-light">Product Id</div>
    <div class="col text-light">Price</div>
    <div class="col text-light">Qty</div>
</div>
<?php
    // output data of each row
    while ($r = $result->fetch_assoc()) {
        $totalprice += $r['item_price'];        
        array_push($productIds,$r['product_id']);
        array_push($qtys,$r['qty']);
        array_push($prices,$r['item_price']);

    
?>


<div class="row mb-1">
    <div class="col bg-info"><?php echo $r['name'] ?></div>
    <div class="col bg-info"><?php echo $r['item_price'] ?></div>
    <div class="col bg-info"><?php echo $r['qty']?></div>
</div>
<?php
    }

    
} else {
    echo "<p>No Products Available</p>";
}


?>
<div class="row">
    <div class="col bg-success text-light">Total Price : <?php echo $totalprice ?></div>
</div>
</div>
<?php

$SelSql = "SELECT * FROM customer WHERE id='$customerId'";
$res = $dbConn->executeQuery($SelSql);
if($res->num_rows > 0 ){
$row =$res->fetch_assoc();


if(isset($_POST['ordersbt'])){
    foreach ($productIds as $x => $value) {
        $cartSql = "delete from cart where product_id ='$value'";
        $dbConn->executeQuery($cartSql);

        $qty = $qtys[$x];
        $prod = $productIds[$x];

        $orderSql = "insert into orders(customer_id,product_id,qty) values('$customerId','$prod','$qty')";
        $dbConn->executeQuery($orderSql);
        

        

    } 

    echo "<script>clearmyCartLocalStorage</script>";

    $url = $server."FrontEnd/component/order.php";
    header('Location: /ShoeProject_1/FrontEnd/component/order.php', TRUE, 302);
    exit();
}


?>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Confirm Delivery Information</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Customer Name</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $row['name'] ?>">
                    </div>
                   
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $row['phone_no'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $row['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['email'] ?>">
                    </div>  

                    <div class="text-center p-5">
                        <button name="ordersbt" class="btn btn-block btn-outline-primary " type="submit">Place Order</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>