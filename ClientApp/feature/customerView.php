<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path."/Logic/DataAccess/";

include $db_path.'DBConnect.php';
$ReadSql = "SELECT c.id,c.name as cname,c.address as cAddress,u.email as cEmail,c.phone_no as cPhone
FROM customer as c ,users as u where c.id = u.customer_id";
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
            <div class="col py-1">
                <div class="container-fluid">
                    <!-- <form action="" method="post"><button type="submit" name="prodbtn">product</button></form> -->
                    
                   <form>
                   <fieldset enabled>
                     <legend>Customer Details</legend>
                     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
    </tr>
  </thead>
  <tbody>
  <?php  $x=0; ?>
  <?php
						        if ($res->num_rows > 0) {
							      while ($r = $res->fetch_assoc()) {
						    ?> 
    <tr>
    
    
          <th scope="row"><?php echo $x=$x+1; ?></th>
          <td><?php echo $r['cname']; ?></td>
          <td><?php echo $r['cAddress']; ?></td>
          <td><?php echo $r['cEmail']; ?></td>
          <td><?php echo $r['cPhone']; ?></td>
          <td>
          <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#myModal_<?php echo $r['id']; ?>">
  Delete
</button>
    </tr>
    <div class="modal" id="myModal_<?php echo $r['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Customer</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Are You Sure?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		<a href="customerDelete.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger"> Yes, Delete</button></a>
      </div>

    </div>
  </div>
</div>
    <?php }
						      } ?>
    
  </tbody>
</table>
                     <!--<div>
                       <button type="submit" class="btn btn-warning ">ADD</button>
                       <button type="submit" class="btn btn-warning ms-3">Reset</button>
                     </div>-->
                   </fieldset>
                 </form>
                    
                </div>

            </div>
        </div>
    </div>

</body>

</html>