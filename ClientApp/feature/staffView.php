<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';


$ReadSql = "SELECT id,name,address,phone_no,username FROM employee";
$res = $dbConn->executeQuery($ReadSql);

?>


<html>

<head>
	<title>Employee Page</title>
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
					<h2> Shop - Staff Members</h2>
					<a href="staff.php"><button type="button" class="btn btn-primary ml-4 pl-2">Add New</button></a>
				</div>
				<table class="table ">
					<thead>
						<tr>
							<th>Employee Name </th>
							<th>Address</th>
							<th>Phone Number</th>
                            <th> User Name</th>
                            <th> Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($res->num_rows > 0) {
							while ($r = $res->fetch_assoc()) {
						?>
								<tr>
									<!-- <th scope="row"></th>  -->
									<td><?php echo $r['name']; ?></td>
									<td> <?php echo $r['address']; ?></td>
                                    <td> <?php echo $r['phone_no']; ?></td>
                                    <td> <?php echo $r['username']; ?></td>
									
									
									<td>
										<a href="staffUpdate.php?username=<?php echo $r['username']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
										<button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#myModal">
  Delete
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Member</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Are You Sure?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		<a href="staffDelete.php?username=<?php echo $r['username']; ?>"><button type="button" class="btn btn-danger"> Yes, Delete</button></a>
      </div>

    </div>
  </div>
</div>
										<!-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Delete</button>

										Modal -->
										<!-- <div class="modal fade" id="myModal role="dialog">
											<div class="modal-dialog">

												
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Delete Product</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p>Are you sure?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
														<a href="delete.php?id=<button type="button" class="btn btn-danger"> Yes, Delete</button></a>
													</div>
												</div>

											</div>
										</div> -->

									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- <div id="confirm" class="modal hide fade">
	<div class="modal-body">
		Are you sure?
	</div>
	<div class="modal-footer">

		<button type="button" data-dismiss="modal" class="btn">Cancel</button>
	</div>
</div> -->
</body>

</html>

