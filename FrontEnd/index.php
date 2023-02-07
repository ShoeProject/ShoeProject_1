<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path.'DBConnect.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: ".$path."/login.php");
    exit;
}
$user_logged = true;
// Initialize the session
session_start();
?>
<?php require('Shared/header.php') ?>
<div class="d-flex mt-4 mx-4 p-4">
    <h3>Welcome to Genius Shoes Store,
        <b><?php // check user login and output username
            
            if ($user_logged) {
                $user_id = ($_SESSION['id']);
                $select_sql = "SELECT name FROM `customer` WHERE id='$user_id'";
                $result = $dbConn->executeQuery($select_sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row["name"];
                    if (!$row["name"]) {
                        echo "Guest";
                    }
                }
            } else {
                echo "Guest";
            }
            ?></b>
    </h3>
</div>

<div class="d-flex my-2">
    <?php // output success or failed message.
    if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
    <?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>

<div class="row notify-section image-fluid">
    <?php 
    include('component/news&notification.php');
    ?>
</div>

<div class="row main-section">
    <?php 
    $SelSql = "SELECT * FROM product";
    $res = $dbConn->executeQuery($SelSql);
    $num_of_rows = mysqli_num_rows($res);
    if ($num_of_rows > 0) {
        // output data of each row
        while ($num_of_rows > 0) {
            $num_of_rows--;
            $r = mysqli_fetch_assoc($res);
            include('Shared/product.php');
        }
    } else {
        echo "<p>No Products Available</p>";
    }
    ?>
</div>

<?php require('Shared/footer.php') ?>