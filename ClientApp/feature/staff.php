<?php
// namespace feature\staff;
// use ShoeApp\Logic\DBConnect;
require_once('../Logic/DataAccess/class.DBConnect.php');

?>
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

<?php
//if (isset($_POST['prodbtn'])) {

  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone_no'];
  $age = $_POST['age'];

  $sql = "INSERT INTO employee (name, address, phone_no,age)VALUES ('$name',  '$address', $phone,'$age')";
  $dbConn->executeQuery($sql);  
  $dbConn->closeConn();


?>