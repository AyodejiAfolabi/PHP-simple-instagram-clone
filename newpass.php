<?php
    session_start();
    include "credentials.php";
    $id=$_GET['id'];
    echo $id;
    ?>
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
            <form action="savenewpass.php?id=<?php
    echo $id;
        
            ?>" method="post" class="bg-white shadow p-4 text-center mb-5">
                

                <?php 
                    if (isset($_SESSION['signupempty'])) {
                        
                        
                     echo $_SESSION['signupempty']; 
                    }
            
                ?>

                <div class="form-group pt-3 col">
                    <input type="password" placeholder="Password" name="pass1" class="form-control">
                </div>
                <div class="form-group pt-2 col">
                    <input type="password" placeholder="Confirm Password" name="pass2" class="form-control">
                </div>
                
                <?php 
                    if (isset($_SESSION['signupfail'])) {
                        
                        
                     echo $_SESSION['signup']; 
                    }
            
                ?>

                <div class="d-flex justify-content-center container pb-2">
                    <button type="submit" name="submit" class="btn btn-warning btn-block">Save Change<i class="ml-3 fa fa-edit"></i></button>
                </div>
                   </form>
        </div>
    </div>
</body>
</html>
<?php
session_unset();
?>