
<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/";

$db_path = $path . "/Logic/DataAccess/";
include $db_path.'DBConnect.php';
// include database connection
// find checkout product detail using cart table
// check whether product quantity less than prodcut table quantity regarding to the product id
//  get the details from customer table using customer id in the sesssion
// show all details related to customer and product 
// show confirm button to confirm chekcout 
// if the confirm button clicked the product quantity and should be reduced in the cart as well

$cart_id = $_GET['cart_id'];

$sql = "select * from cart where id ='$cart_id'";
$result = $dbConn->executeQuery($sql);
$cart_qty;$prod_qty;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = $row['product_id'];
    $cart_qty = $row['qty'];

    $sql2 = "SELECT *FROM product where id='$data'";

    $result2 = $dbConn->executeQuery($sql2);
    if($result2->num_rows > 0){
        $row = $result2->fetch_assoc();
        // echo "<tr>"."<td>".$row['qty']."</td>"."</tr>";
        $prod_qty = $row['qty'];

        
    }

}


if($cart_qty >$prod_qty){
    
}

$customer_id = $_SESSION["customer_id"];

$SelSql = "SELECT * FROM cart WHERE customerid='$id'";
$res = $dbConn->executeQuery($SelSql);
$r =$res->fetch_assoc();


?>

<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                	<h3 class="text-white">Checkout</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
    </header>
    <div class="container">
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
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                    </div>  

                    <div class="text-center">
                        <button class="btn btn-block btn-outline-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>