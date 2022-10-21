<?php
    session_start();
    include "credentials.php";
    // $id=$_SESSION['id'];

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
            <form action="confirmuser.php" method="post" class="bg-white shadow p-4 text-center mb-5">
                <h3>Change Passwword</h3>

                <?php 
                    if (isset($_SESSION['signupSuc'])) {
                        
                        
                     echo $_SESSION['signupSuc']; 
                    }
            
                ?>
<div class="form-group pt-3 col">
                    <input type="text" placeholder="Email Address or Username" name="email" class="form-control">
                </div>
             
                <div class="form-group pt-3 col">
                <label class="float-left">Select Your prefered question </label>
                <div class="form-group">
          
          <select  name="question"  class="form-control">
          <option value="1">What is Your Favourite Dish</option>
          <option value="2">What was your Nickname in High School</option>
          <option value="3">What is your Best Subject in High School</option>
          <option value="4">What is your Hobby</option>
          </select>
      </div>
            
            
            
            
            
            
            
            </div>
                <div class="form-group pt-2 col">
                    <input type="answer" name="answer" placeholder="Type you Answer"  class="form-control">
                </div>
                <div class="d-flex justify-content-center container pb-2">
                    <button type="submit" name="submit" class="btn btn-warning btn-block">Verify</button>
                </div>
              </form>
        </div>
    </div>
</body>
</html>

<?php
    session_unset();
?>