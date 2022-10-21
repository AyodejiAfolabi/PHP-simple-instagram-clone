<?php
    session_start();
    include "credentials.php";
    

    $email=$_POST['email'];
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    
    $exist="SELECT * from users where email='$email' OR userName='$email' ";
    $exist=$con->query($exist);
    $a=$exist->fetch_assoc();
    
    if($a){
   if($question==$a['question']){
if($answer==$a['answer']){
    header('location:newpass.php?id='.$a['user_id']);
    // $_SESSION['id']=$a['user_id'];
}
else{
    header('location:changepword.php');
    $_SESSION['signupSuc']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Incorrect Answer to the Chosen question</div>';

}

   }
   else{
    header('location:changepword.php');
    $_SESSION['signupSuc']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Incorrect Question</div>';

   }
  





    }
    else{
        header('location:login.php');
        $_SESSION['signupSuc']='<div class="alert alert-danger alert-dismissible text-danger fontz" >This Account doesn\'t match any user\'s record</div>';
    
    }
    











?>