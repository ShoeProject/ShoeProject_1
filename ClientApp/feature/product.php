<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path."/Logic/DataAccess/";

include $db_path.'DBConnect.php';


if (isset($_POST['prodbtn'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $serialNo = $_POST['serialNo'];
  $itemSize = $_POST['itemSize'];
  $itemColor = $_POST['itemColor'];
  $categoryId = $_POST['categoryId'];
  $subCatergoryId = $_POST['subCatergoryId'];
  $image_name = $_FILES['productImage']['name'];
  echo "<script>alert('".$image_name."18');</script>";
  //if(isset($_FILES['productImage']['name']))
  //
  echo "<script>alert('".$image_name."21');</script>";

  //if($image_name!=""){
  //echo "yes";
  //$productImage = $_POST['productImage'];
  
  echo "<script>alert('".$image_name."');</script>";
  $eml = end(explode('.',$image_name));
  $image_name="shoe_".rand(000,999).'.'.$eml;
  
  $source_path=$_FILES['productImage']['tmp_name'];
  $destination_path= "../Asset/images/".$image_name;

  $upload = move_uploaded_file($source_path,$destination_path);
  if($upload==false)
  {
      $_SESSION['upload'] ="<b><p style='color:green'>Failed to upload image.</p></b>";
      header('location: view.php');
      die();      
  }
  else
  {
      $image_name="";
  }
  //}
// }else{
//   echo "<script>alert('image not aded..!');</script>";
// }
$query = "INSERT INTO product (name, item_price,serial_no,item_color,item_size,category_id,sub_category_id,image_name) VALUES
  ('$name',$price,'$serialNo','$itemColor',$itemSize,null,null,'$image_name')";

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
          <form class="w-75" method="POST" action="">
            <fieldset enabled>
              <legend>Add Products</legend>              
              <div class="mb-4 pt-5">
                <input type="text" name="name" class="form-control" placeholder="Product Name">
              </div>
              <div class="mb-4">
                <input type="text" name="serialNo" class="form-control" placeholder="Serial Number">
              </div>
              <div class="mb-4">
              <input type="File" name="productImage" class="form-control" placeholder="Add Image" >
              </div>
              <div class="mb-4">
                <input type="text" name="price" class="form-control" placeholder="Item Price">
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