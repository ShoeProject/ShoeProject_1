<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path.'DBConnect.php';

$ReadSql = "SELECT count(*) as count FROM product";
$res = $dbConn->executeQuery($ReadSql);

$ReadSql2 = "SELECT count(*) as customerCount FROM customer";
$res2 = $dbConn->executeQuery($ReadSql2);

$ReadSql3 = "SELECT COUNT(*) as orderCount FROM orders";
$res3 = $dbConn->executeQuery($ReadSql3);

$ReadSql4 = "SELECT COUNT(*) as inquiryCount FROM inquiry";
$res4 = $dbConn->executeQuery($ReadSql4);

$ReadSql5 = "SELECT o.order_date as odate,c.name as cname,ct.qty as cqty FROM orders as o ,customer as c ,cart as ct where c.id=ct.customer_id AND c.id=o.customer_id";
$res5 = $dbConn->executeQuery($ReadSql5);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: ".$path."/loginStaff.php");
    exit;
}
$user_logged = true;
// Initialize the session
session_start();
?>

<html>

<head>
    <title>Home Page</title>
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../vendor/components/jquery.slim.min.js"></script>
    <script src="asset/js/main.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="mb-8"><?php include '../shared/header.php'; ?></div>
        <div class="row flex-nowrap">
            <?php include 'sidebar.php' ?>
            <div class="col py-1">
                <div class="container-fluid">
                   
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php
						        if (mysqli_num_rows($res) > 0) {
							        $row = mysqli_fetch_assoc($res);
                                    $count = $row["count"];
                                }?>
                                <h3 class="fs-2"><?php echo $count ?></h3>
                                <p class="fs-5">Products</p>
                             
                            </div>
                            <i class="fas bi bi-bag-fill primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
						        if (mysqli_num_rows($res2) > 0) {
							        $row2 = mysqli_fetch_assoc($res2);
                                    $count2 = $row2["customerCount"];
                                }?>
                                <h3 class="fs-2"><?php echo $count2 ?></h3>
                                <p class="fs-5">Customers</p>
                                </div>
                                    <i class="bi bi-people primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
						        if (mysqli_num_rows($res3) > 0) {
							        $row3 = mysqli_fetch_assoc($res3);
                                    $count3 = $row3["orderCount"];
                                }?>
                                <h3 class="fs-2"><?php echo $count3 ?></h3>
                                <p class="fs-5">Orders</p>
                                </div>
                                    <i class="bi bi-box primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
						        if (mysqli_num_rows($res4) > 0) {
							        $row4 = mysqli_fetch_assoc($res4);
                                    $count4 = $row4["inquiryCount"];
                                }?>
                                <h3 class="fs-2"><?php echo $count4 ?></h3>
                                <p class="fs-5">Inquiries</p>
                                </div>
                                    <i class="bi bi-question-circle primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $x=0;
						        if ($res5->num_rows > 0) {
							      while ($r = $res5->fetch_assoc()) {
						    ?> 
                                <tr>
                                    <th scope="row"><?php echo $x=$x+1; ?></th>
                                    <td><?php echo $r['odate']; ?></td>
                                    <td><?php echo $r['cname']; ?></td>
                                    <td><?php echo $r['cqty']; ?></td>
                                </tr>
                                <?php }
						      } ?>  
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>