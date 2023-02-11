<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';



$id = $_GET['id'];

$SelSql = "SELECT * FROM product WHERE id='$id'";
$res = $dbConn->executeQuery($SelSql);
$r =$res->fetch_assoc();


if(isset($_POST) & !empty($_POST)){
	$name = ($_POST['name']);
	$code = ($_POST['code']);
	$item_price = ($_POST['item_price']);
    $item_color =($_POST['item_color']);
    $item_size =($_POST['item_size']);
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
	$editquery = "UPDATE product SET name='$name',code ='$code',item_price=$item_price, item_color='$item_color', item_size=$item_size WHERE id='$id'";
	
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
				<input type="text" class="form-control" name="item_price" value="<?php echo $r['item_price'];?>"/>
            </div> 
            <div class="form-group mb-4">
                <label>Item Color</label>
				<input type="text" class="form-control" name="item_color" value="<?php echo $r['item_color'];?>"/>
            </div>

            <div class="form-group mb-4">
                <label>Item Size</label>
				<input type="text" class="form-control" name="item_size" value="<?php echo $r['item_size'];?>"/>
            </div>

           
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
</div>
    </div>
    </div>
    </body>
</html>
	
