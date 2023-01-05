<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path.'DBConnect.php';


if (isset($_POST['btncreatemember'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
 
  
 
  $query = "INSERT INTO employee (name, address,phone_no,age) VALUES ('$name','$address','$contact','$age')";
  
  if ($dbConn->executeQuery($query) === true) {
    echo "<script>alert('Database execute succeed..!');</script>";
    header('location: staffView.php');
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }	
}
?>


?>
<!DOCTYPE html>

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
      <?php include '../feature/sidebar.php' ?>
      <div class="col py-1">
        <div class="container-fluid">
          <form class="w-75" method="POST" action="">
            <fieldset enabled>
              <legend>Staff management</legend>
              <div class="mb-4 pt-5">
                <input type="text" name="name" class="form-control" placeholder="Employee Name">
              </div>
              <div class="mb-4">
                <input type="text" name="address" class="form-control" placeholder="Address">
              </div>
              <div class="mb-4">
                <input type="text" name="contact" class="form-control" placeholder="phonenumber">
              </div>
              <div class="mb-4">
                <input type="text" name="age" class="form-control" placeholder="age">
              </div>
              <div class="mb-4">
                <label for="disabledSelect" class="form-label">User Privilege</label>
                <select name="categoryId" class="form-select">
                  <option>Sales person</option>
                  <option>Stock Keeper</option>
                </select>
              </div>
              <div class="sizebtn">
                <button type="submit" name="btncreatemember" class="btn btn-warning">Create Member</button>
                <button type="submit" name="updbtn" class="btn btn-warning">Update Member</button>
                <button type="submit" class="btn btn-warning ">Reset</button>
              </div>
            </fieldset>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>




<?php
if (isset($_POST['createmember'])) {
  $dbConn1 = new DBConnect();

  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone_no'];
  $age = $_POST['age'];


  $sql = "INSERT INTO employee (name, address, phone_no,age)VALUES ('$name',  '$address', $phone,'$age')";
  $dbConn1->executeQuery($sql);
  if ($dbConn->$sql($query) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }
  $dbConn1->closeConn();
}

?>