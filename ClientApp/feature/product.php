<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path."/Logic/DataAccess/";

include $db_path.'DBConnect.php';
$ReadSql = "SELECT * FROM product_categories";
$res = $dbConn->executeQuery($ReadSql);

$ReadSql2 = "SELECT * FROM product_sub_categories";
$res2 = $dbConn->executeQuery($ReadSql2);

if (isset($_POST['prodbtn'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $code = $_POST['code'];
  $itemSize = $_POST['itemSize'];
  $itemColor = $_POST['itemColor'];
  $categoryId = $_POST['categoryId'];
  $itemQty = $_POST['itemQty'];
  /*$sql = "SELECT id FROM product_categories where name='$categoryId'";
  $result = $dbConn->executeQuery($sql);
  if ($row = $result->fetch_row()) {
    $catName = $row[0];
  }*/
  $subCatergoryId = $_POST['subCatergoryId'];
  $image_name = $_FILES['productImage']['name'];
  echo "<script>console.log(".$image_name.");</script>";
  $dir="../Asset/images/products/";
  $temp_name=$_FILES['productImage']['tmp_name'];
  if($image_name!="")
  {
      if(file_exists($dir.$image_name))
      {
          $image_name= time().'_'.$image_name;
      }
      $fdir= $dir.$image_name;
      move_uploaded_file($temp_name, $fdir);
  }
  
  $query = "INSERT INTO product (name, item_price,code,item_color,item_size,category_id,sub_category_id,image_name,item_qty) VALUES
    ('$name',$price,'$code','$itemColor',$itemSize,'$categoryId','$subCatergoryId','$image_name','$itemQty')";

  if ($dbConn->executeQuery($query) === true) {
    echo "<script>alert('Database execute succeed..!');</script>";
    header('location: view.php');
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }	
}

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
          <form class="w-75" method="POST" action="" enctype="multipart/form-data">
            <fieldset enabled>
              <legend>Add Products</legend>              
              <div class="mb-4 pt-5">
                <input type="text" name="name" class="form-control" placeholder="Brand Name" required>
              </div>
              <div class="mb-4">
                <input type="text" name="code" class="form-control" placeholder="Product Code" required>
              </div>
              <div class="mb-4">
              <input type="file" name="productImage" class="form-control" accept=".jpeg,.png,.gif,.jpg,.webp" placeholder="Add Image" required>
              </div>
              <div class="mb-4">
                <input type="text" name="price" class="form-control" placeholder="Item Price" required>
              </div>
              <div class="mb-4">
                <input type="text" name="itemSize" class="form-control" placeholder="Item Size" required>
              </div>
              <div class="mb-4">
                <input type="text" name="itemQty" class="form-control" placeholder="Item Qunatity" required>
              </div>
              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Item Color</label>
                <select name="itemColor" class="form-select" required>
                  <option>Red</option>
                  <option>Green</option>
                  <option>Blue</option>
                  <option>Black</option>
                  <option>White</option>
                  <option>Navy Blue</option>
                  <option>Orange</option>
                  <option>Brown</option>
                  <option>Pink</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Category Id</label>
                <select name="categoryId" class="form-select" required>
                <?php
						        if ($res->num_rows > 0) {
							      while ($r = $res->fetch_assoc()) {
						    ?>  
                    <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                  <?php }
						      } ?>
            
                </select>
              </div>
              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Sub Category Id</label>
                <select name="subCatergoryId" class="form-select" required>
                <?php
						        if ($res2->num_rows > 0) {
							      while ($r = $res2->fetch_assoc()) {
						    ?>  
                    <option value="<?php echo $r['id']; ?>" ><?php echo $r['name']; ?></option>
                  <?php }
						      } ?>
                </select>
              </div>          
              <button type="submit" name="prodbtn" class="btn btn-primary">Submit</button>
              <button type="submit" class="btn btn-primary">Reset</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>