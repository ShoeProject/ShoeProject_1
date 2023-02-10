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

<!-- <div class="row m-5">
    <div class="col-lg-5">
        <img class="img-fluid h-100" src="<?php echo $server; ?>clientapp/asset/images/products/<?php echo $r['image_name']; ?> ?>" alt="Card Image Caption">
    </div>
    <div class="col-lg-5">
        <div class="font-weight-bold py-3"><?php echo $r['name'] ?></div>
        <div ><?php echo $r['item_price'] ?></div>
        <div><?php echo $r['item_color'] ?></div>
        <div><?php echo $r['item_size'] ?></div>
    </div>
    <div></div>


</div> -->

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img class="img-fluid h-100z" src="<?php echo $server; ?>clientapp/asset/images/products/<?php echo $r['image_name']; ?>" alt="Card Image Caption" width="250"> </div>
                            <!-- <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70"> </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $r['name'] ?></span>
                                <h5 class="text-uppercase"><?php //echo $r['name'] ?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">Rs<?php echo $r['item_price'] ?></span>
                                    <!-- <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div> -->
                                </div>
                            </div>
                            <p class="about">FILA is a leading international sportswear brand that designs footwear and clothing. Browse through our collection of FILA shoes for men, women and kids and stay on top of the latest trends.</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">
                                    Size:<?php echo $r['item_size'] ?>
                                </h6> 
                                <!-- <label class="radio"> 
                                    <input type="radio" name="size" value="S" checked> <span>S</span> 
                                    </label> 
                                    <label class="radio"> 
                                    <input type="radio" name="size" value="M"> <span>M</span> </label> 
                                    <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label>
                                    <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> 
                                    <input type="radio" name="size" value="XXL"> <span>XXL</span> 
                                </label> -->
                            </div>
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> 
                            <!-- <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>