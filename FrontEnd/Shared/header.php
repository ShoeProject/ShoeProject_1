<?php

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1/';

$user_logged = false;

?>
<!DOCTYPE html>
<html>

<head>
	<title>Online Shoes Shop</title>
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../vendor/components/jquery.slim.min.js"></script>
    <script src="asset/js/main.js"></script>
    <script src="../../vendor/twbs/bootstrap/js/src/popover.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $server; ?>FrontEnd/asset/css/style.css">

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<style type="text/css">
		body {
			font: 14px sans-serif;
		}

		.wrapper {
			width: 350px;
			padding: 20px;
		}
	</style>
</head>

<body>
	<header class="d-flex w-100">
		<nav class="navbar navbar-expand-lg w-100 bg-light">
			<div class="navbar-collapse collapse justify-content-between">
				<ul class="navbar-nav" id="navbar">
					<li class="nav-item active">
						<a class="nav-link text-dark" href="<?php echo $server; ?>index.php"><i class="fa fa-shopping-bag text-dark"></i> GeneShoes</a>
					</li>

					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
						$user_logged = true;
						if ($_SESSION['role'] == 'admin') { ?>
							<li class="nav-item">
								<a class="nav-link text-dark" href="<?php echo $server; ?>clientapp/feature/view.php">Products</a>
							</li>
					<?php }
					} ?>

				</ul>
				<ul class="navbar-nav">
					<div class="d-flex my-2 my-lg-0">
						<input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button id="searchBtn" class="btn btn-outline-light m-2 my-sm-0" type="button">Search</button>
					</div>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item cart mr-4">
						<a class="nav-link btn bg-warning" href="<?php echo $server; ?>templates/cart.php">
							<span class="text-white">0 </span>
							<i class="fa fa-shopping-cart text-white" style="font-size: 18px;"></i>
						</a>
					</li>

					<?php
					if ($user_logged) { ?>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-dark text-white" href="<?php echo $server; ?>components/user/logout.php"><span><i class="fa fa-sign-out text-white"></i></span>Sign Out</a>
						</li>
					<?php } else { ?>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-primary text-white" href="<?php echo $server; ?>login.php"><span><i class="fa fa-sign-in text-white"></i></span> Sign In</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</header>

	<div class="container-fluid page-container">