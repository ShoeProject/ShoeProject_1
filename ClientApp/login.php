
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login Page</title>
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
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
                <img src="./Asset/images/shoe.png" class="img-fluid h-100" alt=""/>
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
            </div>
        </div>
    </div>
</section>    
</body>
</html>

<?php


?>
