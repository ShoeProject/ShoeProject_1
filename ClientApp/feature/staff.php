<?php
// namespace feature\staff;
// //use Logic;
// use Logic\DataAccess\DBConnect;
include('DBConnect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="asset/css/style.css" />
  <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="/vendor/components/jquery.slim.min.js"></script>
  <script src="asset/js/main.js"></script>
</head>
<body>
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
      <input type="text" name="phone_no" class="form-control" placeholder="phonenumber">
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
      <button type="submit" name="prodbtn" class="btn btn-warning">Create Member</button>
      <button type="submit" name="updbtn" class="btn btn-warning">Update Member</button>
      <button type="submit" class="btn btn-warning ">Reset</button>
    </div>
  </fieldset>
</form>
</body>



<?php
//if (isset($_POST['prodbtn'])) {
  //$dbConn = new DBConnect();

  // $name = $_POST['name'];
  // $address = $_POST['address'];
  // $phone = $_POST['phone_no'];
  // $age = $_POST['age'];
 echo $dbConn;
  echo $dbConn->getName();

  // $sql = "INSERT INTO employee (name, address, phone_no,age)VALUES ('$name',  '$address', $phone,'$age')";
  // $dbConn->executeQuery($sql);  
  // $dbConn->closeConn();
  


?>