<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1/Logic/DataAccess/";

include $path.'DBConnect.php';


if (isset($_POST['btnNews'])) {
  $news = $_POST['news_heading'];
  $news_content = $_POST['news_content'];
  $image_name = $_FILES['productImage']['name'];
  echo "<script>console.log(".$image_name.");</script>";
  $dir="../Asset/images/news/";
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
 
  
  $query = "INSERT INTO news_and_notification (newsHeading, newsBody,image_name) VALUES ('$news','$news_content','$image_name')";
  
  if ($dbConn->executeQuery($query) === true) {
    echo "<script>alert('Database execute succeed..!');</script>";
    header('location: NewsView.php');
  } else {
    echo "Error: " . $query . "<br>" . $dbConn->error;
  }	
}


?>
<html>

<head>
    <title>News & Notify Page</title>
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
                    
                   <form class="w-50" method="POST" action="" enctype="multipart/form-data">
                   <fieldset enabled>
                     <legend>News and Notification</legend>
                     <div class="mb-4 pt-5 w-50">
       
                       <input type="text" id="disabledTextInput" name="news_heading" class="form-control" placeholder="News Heading" required>
                     </div>
                     <div class="mb-3 pb-4 w-50">
                       <input type="text" id="disabledTextInput" name ="news_content"class="form-control" placeholder="news Body" required>
       
                     </div>

                     <div class="mb-4">
              <input type="file" name="productImage" class="form-control" accept=".jpeg,.png,.gif,.jpg,.webp" placeholder="Add Image" >
              </div>
                     <div>
                       <button type="submit" name ="btnNews"class="btn btn-primary ">Add News</button>
                       <button type="submit" class="btn btn-primary ms-3">Reset</button>
                     </div>
                   </fieldset>
                 </form>
                    
                </div>

            </div>
        </div>
    </div>

</body>

</html>