<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path."/Logic/DataAccess/";

include $db_path.'DBConnect.php';
$ReadSql = "SELECT * FROM customer";
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
          <td><?php echo $r['name']; ?></td>
          <td><?php echo $r['address']; ?></td>
          <td>abc@gmail.com</td>
          <td><?php echo $r['phone_no']; ?></td>
    </tr>
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