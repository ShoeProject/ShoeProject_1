<?php 

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/shoeproject_1/'; 

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ".$server."FrontEnd/index.php");
    exit;
}

//include database
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path.'DBConnect.php';

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password, role FROM customer WHERE email = '$email'";
        
        if($stmt = $dbConn->executeQuery($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if email exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $email, $hashed_password, $role);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["role"] = $role;                       
                            
                            // Redirect user to welcome page
                            $url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
                            $url .= "/ShoeProject_1/FrontEnd/";
                            header('Location: ' . $url, TRUE, 302);
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login Page</title>
    <link href="<?php echo $server; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background: rgb(219, 226, 226);
        }

        .row{
            background:white;
            border-radius: 30px;
            
        }

        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius:30px ;
        }

        .btn-1{
                border: none;
                outline: none;
                height: 50px;
                width: 100%;
                background-color: black;
                color: white;
                border-radius: 4px;
                font-weight: bold;
        }
        
        btn-1:hover{
            background-color: black;
            border: 1px solid;
            color: black;
        }
    </style>
    
</head>
<body>
<section class="Form my-4 mx-5">
    <div class="container">
        <div class="row no-gutters">            
            <div class="col-lg-5">
                <img src="<?php echo $server; ?>ClientApp/Asset/images/shoe.png" class="img-fluid h-100" alt=""/>
            </div>
            <div class="col-lg-5">
                <h1 class="font-weight-bold py-3">Login</h1>
                <h4>Sign into your account</h4>
                <form action="submit" method="POST">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="email" placeholder="Email Address" class="form-control my-3 p-4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Password" class="form-control my-3 p-4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button  class="btn-1 mt-3 mb-5" type="submit">Login</button>
                        </div>
                    </div>
                </form>
                <a href="<?php echo $server; ?>FrontEnd/Shared/register.php"><div class="">Register</div></a>
                
            </div>
        </div>
    </div>
</section>    
</body>
</html>


