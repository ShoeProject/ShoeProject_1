<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';


$ReadSql = "SELECT * FROM inquiry";
$res = $dbConn->executeQuery($ReadSql);

?>


<html>

<head>
	<title>Inquiry Page</title>
	<link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
	<link rel="stylesheet" href="../asset/css/style.css" />
	<script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="../../vendor/components/jquery.slim.min.js"></script>
	<script src="../asset/js/main.js"></script>
</head>

<body>
	<div class="container-fluid">
		<div><?php include '../shared/header.php'; ?></div>
		<div class="row flex-nowrap">
			<?php include 'sidebar.php' ?>
			<div class="container-fluid my-4 w-75">
				<div class="row my-2">
					<h2> Shop - News & Notification Center</h2>
				</div> 
				<table class="table ">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Inquiry Subject </th>
							<th>Inquiry</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						        if ($res->num_rows > 0) {
							      while ($r = $res->fetch_assoc()) {
						    ?> 
    					<tr>
							<!-- customer name need here -->
							<td><?php echo $r['customer_id']; ?></td>
          					<td><?php echo $r['inquiry_subject']; ?></td>
         	 				<td><?php echo $r['inquiry']; ?></td>
						<td>
							<a href="#"><button type="button" class="btn btn-info">Reply</button></a></td>
						</tr>
						<?php }
						} ?>
					</tbody>
				</table>

</body>
</html>

