<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram App</title>
    <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./mystyle.css">
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
    <div style="width:60%" class="body-bg container-fluid">
        <div class="container w-60 p-5">
            <form action="signupProcess.php" method="post" class="bg-white shadow p-5 text-center mb-5 pb-5" enctype="multipart/form-data">
                <h3 class="text-success">
                <?php 
                    if (isset($_SESSION['signupError'])) {
                        
                        
                     echo $_SESSION['signupError']; 
                    }
                    // elseif (isset($_SESSION['emailError'])) {
                    //     echo $_SESSION['emailError'];
                    // }
                    // elseif (isset($_SESSION['regError'])) {
                    //     echo $_SESSION['regError'];
                    // }
                    // elseif (isset($_SESSION['regSuccess'])) {
                    //     echo $_SESSION['regSuccess'];
                    // }
                ?>
                </h3>
                <h3>Sign Up</h3>
                <div class="form-row pt-2 col">
                    <div class="form-group col-lg-6">
                        <input type="text" placeholder="First Name" name="fName" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" placeholder="Last Name" name="lName" class="form-control">
                    </div>
                </div>
                <div class="form-row pt-2 col">
                <div class="form-group  col-lg-6">
                    <input type="email" placeholder="Email Address" name="email" name="Email" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" placeholder="Username" name="userName"  class="form-control">
                </div>

</div>

                <div class="form-group pt-2 col">
                    <input type="text" placeholder="Phone Number" name="phone" class="form-control">
                </div>
                <div class="form-group pt-2 col">
                    <input type="password" placeholder="Create Password" name="pass" class="form-control">
                </div>
                <div class="form-group pt-2 col">
                    <input type="password" placeholder="Confirm Password" name="conpass" class="form-control">
                </div>
                <label>Select Your prefered question </label>
                <div class="form-row pt-2 col">
            
                <div class="form-group  col-lg-6">
          
                    <select  name="question"  class="form-control">
                    <option value="1">What is Your Favourite Dish</option>
                    <option value="2">What was your Nickname in High School</option>
                    <option value="3">What is your Best Subject in High School</option>
                    <option value="4">What is your Hobby</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" placeholder="Type your answer Here" name="answer"  class="form-control">
                </div>

</div>

                <button type="submit" name="submit" class="btn btn-success btn-block">Create New Account</button>
                <a href="login.php" class="float-right pt-2 pb-3">Already have an account?</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    session_unset();
?>