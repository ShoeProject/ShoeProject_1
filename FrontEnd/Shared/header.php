<?php

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1/';

$user_logged = false;

?>
<!DOCTYPE html>
<html>

<head>
	<title>Online Shoes Shop</title>
	<!-- <script src="<?php echo $server; ?>vendor/twbs/bootstrap/js/src/popover.js"></script> -->
	<link href="<?php echo $server; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $server; ?>vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
	<link rel="stylesheet" href="asset/css/style.css" />
	<script src="<?php echo $server ?>FrontEnd/Asset/Js/cart.js"></script>
	<script src="<?php echo $server; ?>vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<!-- <script src="/asset/js/main.js"></script>	 -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo $server; ?>FrontEnd/asset/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

	<link href="<?php echo $server; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
	<style type="text/css">
		/* *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        } */

		.login-frame {
			background: rgb(219, 226, 226);
			border-top-right-radius: 30px;
			border-bottom-right-radius: 30px;
		}

		.footer-row {
			border-radius: 30px;
		}

		.login-image {
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;
		}

		.btn-1 {
			border: none;
			outline: none;
			height: 50px;
			width: 100%;
			background-color: black;
			color: white;
			border-radius: 4px;
			font-weight: bold;
		}

		btn-1:hover {
			background-color: black;
			border: 1px solid;
			color: black;
		}

		.footer-body {
			font: 14px sans-serif;

		}

		.wrapper {
			width: 350px;
			padding: 20px;

		}

		.no-underline {
			text-decoration: none;
		}
	</style>
</head>

<body>

	<header class="d-flex w-100">
		<nav class="navbar navbar-expand-lg w-100 bg-light text-white p-3" style="font-family: 'Poppins', sans-serif; background: #0f0c29;
   background: linear-gradient(to right, #24243e, #302b63, #0f0c29);">
			<div class="navbar-collapse collapse justify-content-between">
				<ul class="navbar-nav" id="navbar">
					<li class="nav-item active">
						<a class="text-white no-underline" href="<?php echo $server; ?>FrontEnd/index.php"> Genius Shoes</a>
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
					<li class="nav-item cart">
						<a class="nav-link btn bg-warning" href="<?php echo $server; ?>FrontEnd/Shared/cart.php">
							<span class="text-white">0 </span>
							<i class="fa fa-shopping-cart text-white" style="font-size: 18px;"></i>
						</a>
					</li>
					<li>&nbsp;</li>


					<?php
					if ($user_logged) { ?>
						<li class="nav-item mr-sm-2 ml-2">
							<a class="nav-link btn btn-dark text-white" href="<?php echo $server; ?>logout.php"><span><i class="fa fa-sign-out text-white"></i></span>Sign Out</a>
						</li>
					<?php } else { ?>
						<li class="nav-item mr-sm-2 ml-2">
							<a class="nav-link btn btn-primary text-white" href="<?php echo $server; ?>login.php"><span><i class="fa fa-sign-in text-white"></i></span> Sign In</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</header>

	<div class="container-fluid page-container">