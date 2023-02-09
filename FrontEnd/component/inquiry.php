<?php
// Include config file
$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1'; 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path.'DBConnect.php';


$connection = $dbConn->getConnection();
 // Initialize the session
session_start();
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = ($_POST["name"]);
    $contact = ($_POST["contact"]);
    $inquirySubject= ($_POST["inquirySubject"]);
    $message = ($_POST["message"]);
    $sql = "INSERT INTO inquiry (inquiry_subject, inquiry) VALUES (?,?)";
        $stmt = mysqli_prepare($connection, $sql);
        if($stmt){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$inquirySubject, $message);

            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
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


    <div class="mx-auto p-5">
        <h2  >Inqiry </h2>
        <p class="mt-4 ">SEND A MESSAGE</p>
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control col-sm-3" value="" required >
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contact" class="form-control" value="" required >
            </div>  
            <div class="form-group">
                <label>Inquiry Subject</label>
                <input type="text" name="inquirySubject" class="form-control" value="" required >
            </div> 
            <div class="form-group">
                <label>Inquiry Message</label>
                <input type="textarea" name="message" rows="4" cols="30" class="form-control" value="" required >
          
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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.524669482761!2d79.99932505045464!3d6.827513195041341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251357aac4dab%3A0x190ed0b026ee611a!2sMount%20Clifford%20Range!5e0!3m2!1ssi!2slk!4v1675655996152!5m2!1ssi!2slk" width="600" height="450" 
        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
<div>    
<?php require('../Shared/footer.php') ?>
</div>    
    

