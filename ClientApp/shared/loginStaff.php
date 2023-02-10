<?php

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/Shoeproject_1'; 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path.'DBConnect.php';
$connection=$dbConn->getConnection();

if(isset($_POST["btnsubmit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    $query = "SELECT * FROM employee WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
  
    if (mysqli_num_rows($result) > 0) {
        // Start a session
        session_start();
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;
  
        // Redirect to the dashboard page
        header("location: /ShoeProject_1/ClientApp/feature/home.php");
        
    } else {
        echo "<script>
            alert('Invalid username or password');
            window.location.href='loginStaff.php';
            </script>";
    }
  
    // Close connection
    mysqli_close($connection);
  }
  
?></b>
</h3>

<?php require($path."/FrontEnd/Shared/header.php") ?>


<div class="d-flex mt-4 mx-4 p-4">
    <h3>Welcome to Genius Shoes Store,
</div>
<section class="Form pt-5 ">
    <div class="container">
        <div class="row justify-content-center align-items-center">            
            
            <div class="col-md-5 ">
             
                <h4>Log into your account</h4>
                <form class="loginS" method="POST" >
                    <div class="form-row" >
                        <div class="col-lg-7">
                            <input name="username" type="text" placeholder="Enter the Username" class="form-control my-3 p-4" required/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input name="password" type="password" placeholder="Enter the Password" class="form-control my-3 p-4" required/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button  class="btn-1 mt-3 mb-5" name="btnsubmit" type="submit" >Login</button>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</section>
<?php require($path."/FrontEnd/Shared/footer.php") ?>