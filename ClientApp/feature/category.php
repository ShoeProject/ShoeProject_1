<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path.'DBConnect.php';


if (isset($_POST['btncategory'])) {
  $name = $_POST['categoryName'];
  $description = $_POST['description'];
 
  
  $query = "INSERT INTO product_categories (name, description) VALUES ('$name','$description')";
  
  if ($dbConn->executeQuery($query) === true) {
    echo "<script>alert('Database execute succeed..!');</script>";
    header('location: CategoryView.php');
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }	
}
?>
<html>

<head>
  <title>Category Page</title>
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
          <form action ="" method ="post">
            <fieldset enabled>
              <legend>Add Category</legend>
              <div class="mb-4 pt-5 w-50">

                <input type="text" id="disabledTextInput" name="categoryName" class="form-control" placeholder="Category Name">
              </div>
              <div class="mb-3 pb-4 w-50">
                <input type="text" id="disabledTextInput" name="description" class="form-control" placeholder="Description">

              </div>
              <div>
                <button type="submit" name="btncategory" class="btn btn-warning ">ADD</button>
                <button type="submit" class="btn btn-warning ms-3">Reset</button>
              </div>
            </fieldset>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>

</html>