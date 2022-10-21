<?php

    session_start();
    include "credentials.php";
    // $id=$_SESSION['id'];
    $id=$_GET['uploadId'];
    $onlines="DELETE  from posts where upload_id='$id'";
    $onlines=$con->query($onlines);
    // $a=$onlines->fetch_all(MYSQLI_ASSOC);
    // $myArr=$a;

    $online="DELETE  from images where post_id='$id' ";
$online=$con->query($online);
if($online && $onlines){

    header('location:dashboard.php');
}
else{
    header('location:dashboard.php');
}

    ?>