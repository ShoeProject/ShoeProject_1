<?php 
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/";
//require_once($path . 'connect.php');
 
// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	$url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
    $url .= "/ShoeProject_1/login.php";
	header('Location: ' . $url, TRUE, 302);
}

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
					<!-- fill using script -->
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