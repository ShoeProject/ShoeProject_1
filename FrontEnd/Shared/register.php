<?php
// Include config file
$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1'; 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path.'DBConnect.php';
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";


$connection = $dbConn->getConnection();
 
// Processing form data when form is submitted
if(isset($_POST['SubmitUser'])){
    

    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $address = $_POST["address"];
    $phoneNumber = trim($_POST["phone"]);
    $email= $_POST["email"];
    $password = base64_encode($_POST["password"]);

    $customerInsert = "insert into customer(name, age, address, phone_no) values('$name','$age','$address','$phoneNumber');";
    $searchCustomerId = "select id from customer where name='$name' and age='$age' and address='$address' and phone_no='$phoneNumber'";
    echo "<script>console.log('".$searchCustomerId."')</script>";
    if($dbConn->executeQuery($customerInsert)){
    //if($mysqli_query($dbConn->getConnection(),$customerInsert)){
        echo "true";
        $result = $dbConn->executeQuery($searchCustomerId);
        if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $CustomerId = $row['id'];
            $userSql = "insert into users (customer_id,email,password) values('$CustomerId','$email','$password')";
            if($dbConn->executeQuery($userSql)){
                echo `<div class="alert alert-success" role="alert"> You are sucessfully registered. </div>`;
                header('location: /ShoeProject_1/login.php');
            }
            else{
                echo `<div class="alert alert-success" role="alert"> Something goes wrong try again </div>`;   
            }
        }    
        

        echo "     id is ".$CustomerId."";
    }

    
    
        //echo '<script>alert("Oops!")</script>';
    

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered.";
                    echo '<script>alert("This email is already registerd.")</script>';
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                echo '<script>alert("Oops! Something went wrong. Please try again later.")</script>';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty($CustomerId)){
        $customerId = null;
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password,customer_id) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        if($stmt){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss",$param_email, $password,$CustomerId);
            
            // Set parameters
            $param_email = $email;
            //$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: $server/login.php");
            } else{
                echo "Something went wrong. Please try again later.\n";
                print_r($stmt->error_list);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($connection);
}
?>
 
<?php require('header.php') ?>


<div class="container mt-5 w-50">
    <form method="POST">
      <div class="form-group ">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
      </div>  
      <div class="form-group mb-2">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age" placeholder="Enter your age" required>
      </div>
      <div class="form-group mt-2">
        <label for="address">Address</label>
        <textarea class="form-control" name="address" rows="3" placeholder="Enter your address" required></textarea>
      </div>
      <div class="form-group mb-2">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
      </div>
      <div class="form-group mb-2 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter the email"class="form-control" value="<?php echo $email; ?>" required>
        <span class="help-block text-danger"><?php echo $email_err; ?></span>
      </div> 
      <div class="form-group mb-2 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter the password"class="form-control" value="<?php echo $password; ?>" required>
        <span class="help-block"><?php echo $password_err; ?></span>
     </div>
     <div class="form-group mb-2 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="confirm_password" class="form-control" placeholder="Retype the password"value="<?php echo $confirm_password; ?>" required>
        <span class="help-block"><?php echo $confirm_password_err; ?></span>
     </div>
      <button  type="submit" name="SubmitUser" class="btn btn-primary">Submit</button>
    </form>
  </div>
    
    <?php require('footer.php') ?>
    
    

