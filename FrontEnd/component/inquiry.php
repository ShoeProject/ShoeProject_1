<?php
// Include config file
$server = 'http://' . $_SERVER['SERVER_NAME'] . '/Shoeproject_1';
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path . 'DBConnect.php';


$connection = $dbConn->getConnection();
// Initialize the session
if (session_status() == PHP_SESSION_NONE) {
    // There is no active session
    session_start();
} 

$customerId = $_SESSION['customer_id'];
echo "<script>console.log('$customerId')</script>";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$name = ($_POST["name"]);
    //$contact = ($_POST["contact"]);
    //echo '<script> console.log('$cusId'); </script>';
    $inquirySubject = ($_POST["inquirySubject"]);
    $message = ($_POST["message"]);
    $sql = "INSERT INTO inquiry (inquiry_subject, inquiry,customer_id) VALUES (?,?,?)";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $inquirySubject, $message,$customerId);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location: /ShoeProject_1/FrontEnd/index.php");
        } else {
            echo "Something went wrong. Please try again later.\n";
            print_r($stmt->error_list);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }



    // Close connection
    mysqli_close($connection);
}
?>

<?php require('../Shared/header.php') ?>

<section class="p-5">
    <div class="container">
    <h2>Inquiry </h2>
    <p class="mt-4 ">SEND A MESSAGE</p>
        <div class="d-md-flex justify-content-between align-items-center">        
            <form method="post">
                <div class="form-group mb-4">
                    <label>Inquiry Subject</label>
                    <input type="text" name="inquirySubject" class="form-control" value="" size ="50" placeholder="Enter the inquiry Subject" required>
                </div>
                <div class="form-group">
                    <label>Inquiry Message</label>
                    <textarea class="form-control" rows="5" cols="30" name="message"value="" placeholder="Enter the inquiry in brief"size ="50" required></textarea>

                    <div>
                        &nbsp;
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send Message">
                        <!--   <input type="reset" class="btn btn-default" value="Reset Me">  -->
                    </div>
            </form>
        </div>
       
        <div class="mt-4 text-end ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.524669482761!2d79.99932505045464!3d6.827513195041341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251357aac4dab%3A0x190ed0b026ee611a!2sMount%20Clifford%20Range!5e0!3m2!1ssi!2slk!4v1675655996152!5m2!1ssi!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


<div>



    <?php require('../Shared/footer.php') ?>
</div>