<?php
session_start();
include "credentials.php";


$email=$_POST['email'];
$pass=$_POST['pass'];


$exist="SELECT * from users where email='$email' OR userName='$email' ";
$exist=$con->query($exist);
$a=$exist->fetch_assoc();

if($a){
   $password=$a['password'];
$verify=password_verify($pass,$password);
if($verify){
    $_SESSION['id']=$a['user_id'];
    header('location:mypost.php');
}

else{
    header('location:login.php');
    $_SESSION['signupSuc']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Wrong Password</div>';

}


}
else{
    header('location:login.php');
    $_SESSION['signupSuc']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Your information doesnt Match Our Record</div>';

}





?>