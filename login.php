<?php
session_start();
// if($_SESSION['id']){
//     header('location:dashboard.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram App</title>
    <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <style>
        .body-bg{
            background-color: #f2f2f2 !important;
        }  
        .form-bg{
            background-color: violet;
        }  
    </style>
</head>
<body>
    <div class="body-bg container-fluid w-100 h-100 pb-5">
        <div class="container w-50 p-5">
            <form action="loginProcess.php" method="post" class="bg-white shadow p-4 text-center mb-5">
                <h3>Log In</h3>

                <?php 
                    if (isset($_SESSION['signupSuc'])) {
                        
                        
                     echo $_SESSION['signupSuc']; 
                    }
            
                ?>

                <div class="form-group pt-3 col">
                    <input type="text" placeholder="Email Address or Username" name="email" class="form-control">
                </div>
                <div class="form-group pt-2 col">
                    <input type="password" placeholder="Password" name="pass" class="form-control">
                </div>
                <div class="d-flex justify-content-center container pb-2">
                    <button type="submit" name="submit" class="btn btn-warning btn-block">Log In</button>
                </div>
                <a href="changepword.php" class="">Forgotten Password?</a>
                <hr>
                <button class="btn btn-success"><a href="signup.php" class="text-white" style="text-decoration: none;">Create New Account</a></button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
session_unset()
?>