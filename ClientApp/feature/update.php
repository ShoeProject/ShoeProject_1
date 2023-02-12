<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';



$id = $_GET['id'];

$SelSql = "SELECT * FROM product WHERE id='$id'";
$res = $dbConn->executeQuery($SelSql);
$r =$res->fetch_assoc();


$ReadSql1 = "SELECT * FROM product_categories";
$res1 = $dbConn->executeQuery($ReadSql1);

$ReadSql2 = "SELECT * FROM product_sub_categories";
$res2 = $dbConn->executeQuery($ReadSql2);


if(isset($_POST) & !empty($_POST)){
	$name = ($_POST['name']);
	$code = ($_POST['code']);
	$item_price = ($_POST['item_price']);
    $item_color =($_POST['item_color']);
    $item_size =($_POST['item_size']);
    $categoryId = $_POST['categoryId'];
    $itemQty = $_POST['itemQty'];
    $subCatergoryId = $_POST['subCatergoryId'];
	// store n upload image
    // $image = $_FILES['image']['name']; 
    // $dir="../img/products/";
    // $temp_name=$_FILES['image']['tmp_name'];
    // if($image!="")
    // {
    //     if(file_exists($dir.$image))
    //     {
    //         $image= time().'_'.$image;
    //     }
    //     $fdir= $dir.$image;
    //     move_uploaded_file($temp_name, $fdir);
    // }else {
    // 	$image = $r['image'];
    // }

    // Execute query
	$editquery = "UPDATE product SET name='$name',code ='$code',item_price=$item_price, item_color='$item_color', item_size=$item_size , item_qty=$itemQty WHERE id='$id'";
	
	$res = $dbConn->executeQuery($editquery);
    echo "<script>alert('Database execute succeed..!');</script>";
	if($res){
		header('location: view.php');
	}else{
		$fmsg = "Failed to Insert data.";
		print_r($res->error_list);
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



	<div class="container mx-3">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Update Product</h2>
		<form method="post" enctype="multipart/form-data" >
			<div class="form-group mb-4">
                <label>Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo $r['name'];?>" required/>
            </div> 
            <div class="form-group mb-4">
                <label>Product Code</label>
				<input type="text" class="form-control" name="code" value="<?php echo $r['code'];?>" required/>
            </div> 
            <div class="form-group mb-4">
                <label>Item Price</label>
				<input type="text" class="form-control" name="item_price" value="<?php echo $r['item_price'];?>"required/>
            </div> 
            <div class="form-group mb-4">
                <label>Item Color</label>
				<input type="text" class="form-control" name="item_color" value="<?php echo $r['item_color'];?>"required/ >
            </div>

            <div class="form-group mb-4">
                <label>Item Size</label>
				<input type="text" class="form-control" name="item_size" value="<?php echo $r['item_size'];?>"required/>
            </div>
            <div class="mb-4">
            <label>Item Quantity</label>
                <input type="text" name="itemQty" class="form-control" value="<?php echo $r['item_qty'];?>" required>
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
						        if ($res1->num_rows > 0) {
							      while ($r1 = $res1->fetch_assoc()) {
						    ?>  
                    <option value="<?php echo $r['id']; ?>"><?php echo $r1['name']; ?></option>
                  <?php }
						      } ?>
            
                </select>
              </div>
              <div class="mb-4">
                <label for="disabledSelect" class="form-label">Sub Category Id</label>
                <select name="subCatergoryId" class="form-select" required>
                <?php
						        if ($res2->num_rows > 0) {
							      while ($r2 = $res2->fetch_assoc()) {
						    ?>  
                    <option value="<?php echo $r['id']; ?>" ><?php echo $r2['name']; ?></option>
                  <?php }
						      } ?>
                </select>
              </div> 
           
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
</div>
    </div>
    </div>
    </body>
</html>
	
