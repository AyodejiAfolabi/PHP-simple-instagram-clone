<?php
session_start();
include "credentials.php";
$fName=$_POST['fName'];
$lName=$_POST['lName'];
$email=$_POST['email'];
$userName=$_POST['userName'];
$phone=$_POST['phone'];
$pass=$_POST['pass'];
$realpass=$pass;
$question=$_POST['question'];
$answer=$_POST['answer'];
$conpass=$_POST['conpass'];
$date= date("Y-m-d"). '--' . date("H:i:s");
echo "$date";
// $pass=password_hash($password);
$pass=password_hash($pass, PASSWORD_DEFAULT);

if($_POST['SUBMIT'] and  empty($fName) or empty($lName) or empty($email) or empty($userName) or empty($phone) or empty($pass) or empty($conpass)  ){

    header('location:signup.php');
    $_SESSION['signupError']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Please Fill in all inputs</div>';

}

else{
$save= "INSERT into users (firstName,lastName,email,userName,phone,Real_pass,password,date,question,answer)
 values ('$fName','$lName','$email','$userName','$phone','$realpass','$pass','$date','$question','$answer')";
// echo json_decode($save);




$check=$con->query($save);
// echo $check;
if($check){
    echo "REgistration Succesfful";
    header('location:login.php');
    $_SESSION['signupSuc']='<div class="alert alert-success bg-success alert-dismissible text-white fontz valid" >
    Registration Successful </div>';
}

else{
$exist="SELECT * from users where email='$email' ";
$exist=$con->query($exist);
if($exist->num_rows>0){
header('location:signup.php');
    $_SESSION['signupError']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Email Already Exists</div>';

}

$exist="SELECT * from users where phone='$phone' ";
$exist=$con->query($exist);

if($exist->num_rows>0){
    header('location:signup.php');
    $_SESSION['signupError']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Phone Number Already Exists</div>';

}

else{
    echo "Failed";
    header('location:signup.php');
    $_SESSION['signupError']='<div class="alert alert-danger alert-dismissible text-danger font" >
     Please fill in the fields properly or <br> Try again later </div>';
}


   
}

}

?>