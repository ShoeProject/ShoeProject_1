<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path.'DBConnect.php';


if (isset($_POST['btncreatemember'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  
 
  $query = "INSERT INTO employee (name, address,phone_no) VALUES ('$name','$address','$contact')";
  
  if ($dbConn->executeQuery($query) === true) {
    $employeeSearch = "select id from employee where name='$name' and address='$address' and phone_no='$contact'";
    $result = $dbConn->executeQuery($employeeSearch);
    if($result->num_rows > 0 ){
      $row = $result->fetch_assoc();
      $employee_id = $row['id'];
      $userSql = "insert into users (employee_id, email,password) values('$employee_id','$email','$password')";
      if($dbConn->executeQuery($userSql)){
        echo `<div class="alert alert-success" role="alert"> employee add successfull </div>`;
        header('location: staffView.php');
      }
    }
    
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }	
}
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
              <legend>Shop - Staff management</legend>
              <div class="mb-4 pt-5">
                <input type="text" name="name" class="form-control" placeholder="Enter the Employee Name" required>
              </div>
              <div class="mb-4">
                <input type="text" name="address" class="form-control" placeholder="Enter the Employee Address" required>
              </div>
              <div class="mb-4">
                <input type="text" name="contact" class="form-control" placeholder="Enter the Employee Phone Number" required>
              </div>
              <div class="mb-4">
                <input type="email" name="email" class="form-control" placeholder="Enter the Employee Email" required>
              </div>
              <div class="mb-4">
                <input type="password" name="password" class="form-control" placeholder="Enter the Employee Password" required>
              </div>
              <!--<div class="mb-4">
                <label for="disabledSelect" class="form-label">User Privilege</label>
                <select name="categoryId" class="form-select">
                  <option>Sales person</option>
                  <option>Stock Keeper</option>
                </select> -->
              </div>
              <div class="sizebtn p-3">
                <button type="submit" name="btncreatemember" class="btn btn-primary">Create Member</button>
                <!-- <button type="submit" name="updbtn" class="btn btn-warning">Update Member</button> -->
                <button type="reset" class="btn btn-primary mx-3">Reset</button>
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