<?php

// use ShoeApp\Logic\ProductLogic;

// //$dbConnection = (new DatabaseConnector())->getConnection(); if you need use this code
// if (isset($_POST['prodbtn'])) {

//   $name = $_POST('name');
//   $serialNo = $_POST('serialNo');
//   $itemName = $_POST('itemName');
//   $itemSize = $_POST('itemSize');
//   $itemColor = $_POST('itemColor');
//   $categoryId = $_POST('categoryId');
//   $subCatergoryId = $_POST('subCatergoryId');

//   $input = array($name, $serialNo, $itemName, $itemSize, $itemColor, $categoryId, $subCatergoryId);
// }


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
          <form class="w-75" method="" action="POST">
            <fieldset enabled>
              <legend>Add Products</legend>
              <div class="mb-4 pt-5">
                <input type="text" name="name" class="form-control" placeholder="Product Name">
              </div>
              <div class="mb-4">
                <input type="text" name="serialNo" class="form-control" placeholder="Serial Number">
              </div>
              <div class="mb-4">
                <input type="text" name="itemName" class="form-control" placeholder="Item Price">
              </div>

              <div class="mb-4">
                <input type="text" name="itemSize" class="form-control" placeholder="Item Size">
              </div>
              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Item Color</label>
                <select name="itemColor" class="form-select">
                  <option>Red</option>
                  <option>Green</option>
                  <option>Blue</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Category Id</label>
                <select name="categoryId" class="form-select">
                  <option>Red</option>
                  <option>Green</option>
                  <option>Blue</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Sub Category Id</label>
                <select name="subCatergoryId" class="form-select">
                  <option>Red</option>
                  <option>Green</option>
                  <option>Blue</option>
                </select>
              </div>

              <div class="mb-4 pt-5">
                <input name="adedDate" type="date" class="form-control">
              </div>

              <div class="mb-4 pt-5">
                <input name="updatedDate" type="date" class="form-control">
              </div>

              <button type="submit" name="prodbtn" class="btn btn-warning">Submit</button>
              <button type="submit" class="btn btn-warning">Reset</button>
            </fieldset>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>

</html>