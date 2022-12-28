<?php 
    $id = $_GET['id'];
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/ShoeProject_1";
    $db_path = $path . "/Logic/DataAccess/";

    include $db_path.'DBConnect.php';
    $id = $_GET['id'];
    include_once("../Shared/header.php");

    $sql = "select * from product where id='$id';";
    $res = $dbConn->executeQuery($sql);

    $r =$res->fetch_assoc();


    
?>

<div class="row m-5">
    <div class="col-lg-5">
        <img class="img-fluid h-100" src="<?php echo $server; ?>clientapp/asset/images/products/<?php echo $r['image_name']; ?> ?>" alt="Card Image Caption">
    </div>
    <div class="col-lg-5">
        <div><?php echo $r['name'] ?></div>
        <div><?php echo $r['item_price'] ?></div>
        <div><?php echo $r['item_color'] ?></div>
        <div><?php echo $r['item_size'] ?></div>
    </div>
    <div></div>


</div>