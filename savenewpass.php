<?php
    session_start();
    include "credentials.php";
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    $pass=password_hash($pass1, PASSWORD_DEFAULT);
    $id=$_GET['id'];
    echo $pass1;
    // $ids=$_SESSION['ids'];
    echo $id;


    // $answer=$_POST['answer'];
       if( isset($_POST['submit']) and !empty($pass1) ){
if($pass1==$pass2){
  
    $change="UPDATE users set `password`='$pass' where user_id='$id' ";
    $changes="UPDATE users set Real_pass='$pass1' where user_id= '$id' ";
    $check=$con->query($changes);
    if($check){
        echo "seen";
    }
    $change=$con->query($change);
    if($change){
echo 'YESS';
// echo $id;
    }
    // header('location:login.php');
    // $_SESSION['signupsuc']='<div class="alert alert-success alert-dismissible text-danger fontz" >You\'ve Successfully change your password</div>';

     
}else{
    
    header('location:newpass.php?id='.$id);
    $_SESSION['signupfail']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Password doesn\'t match</div>';

}
       }
       else{
      
        header('location:newpass.php?id='.$id);
        $_SESSION['signupempty']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Please fill in the inputs</div>';
    
    }
    
 
    ?>