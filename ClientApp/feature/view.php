<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path.'DBConnect.php';


$ReadSql = "SELECT * FROM product";
$res = $dbConn->executeQuery($ReadSql);

?>
	

<html>
<head>
  <title>Login Page</title>
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
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2> Shop - Products</h2>	
			<a href="product.php"><button type="button" class="btn btn-primary ml-4 pl-2">Add New</button></a>
		</div>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>Prod No.</th> 
				<th>Brand</th> 
				<th>Price</th> 
				<th>Item Size</th>
                <th>Item Color</th>
				<th>Action</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php 
		if ($res->num_rows > 0){
		while($r = $res->fetch_assoc()){
		?>
			<tr> 
				<!-- <th scope="row"></th>  -->
				<td><?php echo $r['name']; ?></td> 
				<td>$ <?php echo $r['item_price']; ?></td> 
				<td><?php echo $r['item_size']; ?></td> 
                <td><?php echo $r['item_color']; ?></td> 
				<td>
					<a href="update.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a>

					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>">Delete</button>

					<!-- Modal -->
					  <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
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
					          <a href="delete.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger"> Yes, Delete</button></a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

				</td>
			</tr> 
		<?php } }?>
		</tbody> 
		</table>
	</div>
		


  



		</div>
		</div>
		</div>
		</body>

	</html>

	<div id="confirm" class="modal hide fade">
  <div class="modal-body">
    Are you sure?
  </div>
  <div class="modal-footer">
    
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>

