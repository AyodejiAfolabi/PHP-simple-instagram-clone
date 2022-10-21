<?php
    session_start();
    include "credentials.php";
    $id=$_SESSION['id'];

    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $email=$_POST['email'];
    $userName=$_POST['userName'];
    $phone=$_POST['phone'];
    $about=$_POST['about'];



    if( isset($_POST['submit']) and !empty($fName) ){
        $change="UPDATE users set firstName='$fName' where user_id='$id' ";
        $check=$con->query($change);
        if($check){
            header('location:profile.php');
        }
     }
     if( isset($_POST['submit']) and !empty($lName) ){
        $change="UPDATE users set lastName='$lName' where user_id='$id' ";
        $check=$con->query($change);
        if($check){
            header('location:profile.php');
        }


     }
     if( isset($_POST['submit']) and !empty($userName) ){
        $change="UPDATE users set userName='$userName' where user_id='$id' ";
        $check=$con->query($change);
        if($check){
            header('location:profile.php');
        }


     }
     if( isset($_POST['submit']) and !empty($about) ){
        $change="UPDATE users set about='$about' where user_id='$id' ";
        $check=$con->query($change);
        if($check){
            header('location:profile.php');
        }


     }



?>