<?php 
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/";

$db_path = $path . "/Logic/DataAccess/";
include $db_path.'DBConnect.php';



 
// Initialize the session
session_start();

$id = $_SESSION['id'];

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	$url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
    $url .= "/ShoeProject_1/login.php";
	header('Location: ' . $url, TRUE, 302);
}

$sql = "select * from cart where customer_id ='$id' ";
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
						<th>Title</th> 
						<th>Quantity</th> 
						<th>Price</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php 
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()) {
							echo "<tr>"."<td>".$row['product_id']."</td>"."</tr>";
						}
					}
					?>
				</tbody>
			</table>
        </div> 
        <button type="button" class="btn btn-danger btn-checkout">
			<span>
				<i class="fa fa-shopping-cart"></i> 
				Checkout
			</span>
		</button>
    </div>    

<!-- <?php require($path . 'templates/footer.php') ?> -->