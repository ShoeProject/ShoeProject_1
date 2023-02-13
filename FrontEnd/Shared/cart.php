<?php 
// Include config file
$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1/';
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/";

$db_path = $path . "/Logic/DataAccess/";
include $db_path.'DBConnect.php';



 
// Initialize the session
session_start();

$id = $_SESSION['id'];
$cus_id = $_SESSION['customer_id'];

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	$url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
    $url .= "/ShoeProject_1/login.php";
	header('Location: ' . $url, TRUE, 302);
}

$sql = "select * from cart where customer_id ='$cus_id'";
//$sql = "SELECT cart.*, product.* FROM cart INNER JOIN product ON cart.product_id = product.id
//WHERE cart.product_id = [specific_product_id];";
$result = $dbConn->executeQuery($sql);

?>
<?php require($path . 'FrontEnd/Shared/header.php') ?>

    <div class="wrapper mx-auto">
        <h2>Cart</h2>
        <div class="cart-products">
        	<table class="table "> 
				<thead> 
					<tr> 
						<th>Prod No.</th> 
						<th>quantity</th> 
						<th>--</th> 
						<th>Price</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php 
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()) {
					?>
							<tr>
								<td><?php echo $row['product_id'] ?> </td>
								<td><?php echo $row['qty']?> </td>
								<td><Button class='btn-danger'>+</Button> </td>
								<td><Button class='btn-danger'>-</Button></td>
								<td><button class="btn-danger"  onclick="removeFromCart('<?php echo $row['product_id'] ?>')">remove</button></td>
							</tr>                            
                        
					<?php 
						}
					}
					?>
				</tbody>
			</table>
        </div> 
		<a href="<?php echo $server ?>FrontEnd/component/checkout.php	">
			<button type="button" class="btn btn-danger btn-checkout">
				<span>
					<i class="fa fa-shopping-cart"></i> 
					Checkout
				</span>
			</button>
		</a>
    </div>    

<!-- <?php require($path . 'FrontEnd/shared/footer.php') ?> -->