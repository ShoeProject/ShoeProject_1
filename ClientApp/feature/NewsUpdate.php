<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';



$id = $_GET['id'];

$SelSql = "SELECT * FROM news_and_notification WHERE id='$id'";
$res = $dbConn->executeQuery($SelSql);
$r =$res->fetch_assoc();


if(isset($_POST) & !empty($_POST)){
	$news_heading = ($_POST['newsHeading']);
	$news_content = ($_POST['newsBody']);
	
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
	$editquery = "UPDATE news_and_notification SET newsHeading='$news_heading',newsBody ='$news_content' WHERE id='$id'";
	
	$res = $dbConn->executeQuery($editquery);
    echo "<script>alert('Database execute succeed..!');</script>";
	if($res){
		header('location: NewsView.php');
	}else{
		$fmsg = "Failed to Insert data.";
		print_r($res->error_list);
	}
}
?>


<head>
  <title>News & Notify Page</title>
  <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="asset/css/style.css" />
  <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="../../vendor/components/jquery.slim.min.js"></script>
  <script src="asset/js/main.js"></script>
</head>
	<div>
	<div class="container-fluid">
    <div><?php include '../shared/header.php'; ?></div>
    <div class="row flex-nowrap">
      <?php include 'sidebar.php' ?>



	<div class="container mx-4">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">UPDATE News</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group mb-4">
                <label>Name</label>
				<input type="text" class="form-control" name="newsHeading" value="<?php echo $r['newsHeading'];?>" required/>
            </div> 
            <div class="form-group mb-4">
                <label>Serial Number</label>
				<input type="text" class="form-control" name="news_content" value="<?php echo $r['newsBody'];?>" required/>
            </div> 
           

           
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
</div>
    </div>
    </div>
</div>

	
