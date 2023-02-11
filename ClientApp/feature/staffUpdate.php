<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path . 'DBConnect.php';


$id = $_GET['id'];

$SelSql = "SELECT e.id as empId,e.name as eName ,e.address as eAddress ,e.phone_no as ePhone,u.email as eEmail,u.password as ePassword
FROM employee as e,users as u where e.id = u.employee_id";
$res = $dbConn->executeQuery($SelSql);
$r =$res->fetch_assoc();


if(isset($_POST) & !empty($_POST)){
	$name = ($_POST['name']);
	$address = ($_POST['address']);
    $contact = ($_POST['contact']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    //$Nusername = ($_POST['Nusername']);
	
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
	$editquery = "UPDATE employee as e ,users as u SET e.name='$name',e.address ='$address',e.phone_no='$contact',u.email='$email',u.password='$password' WHERE e.id='$id' AND e.id=u.employee_id";
	
	$res = $dbConn->executeQuery($editquery);
    echo "<script>alert('Database execute succeed..!');</script>";
	if($res){
		header('location: staffView.php');
	}else{
		$fmsg = "Failed to Insert data.";
		print_r($res->error_list);
	}
}
?>


<head>
  <title>Staff Page</title>
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



	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">UPDATE Member</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label>Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo $r['eName'];?>" required/>
            </div> 
            <div class="form-group">
                <label>Address</label>
				<input type="text" class="form-control" name="address" value="<?php echo $r['eAddress'];?>" required/>
            </div> 

            <div class="form-group">
                <label>Phone Number</label>
				<input type="text" class="form-control" name="contact" value="<?php echo $r['ePhone'];?>" required/>
            </div> 
            <div class="form-group">
                <label>Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo $r['eEmail'];?>" required/>
            </div> 
            <div class="form-group">
                <label>Password</label>
				<input type="text" class="form-control" name="password" value="<?php echo $r['ePassword'];?>" required/>
            </div> 
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
</div>
    </div>
    </div>
</div>

	
