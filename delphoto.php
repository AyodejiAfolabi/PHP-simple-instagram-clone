<?php

    session_start();
    include "credentials.php";
    // $id=$_SESSION['id'];
    $id=$_GET['photoId'];
    $link=$_SESSION['link'];
    // $onlines="DELETE  from posts where upload_id='$id'";
    // $onlines=$con->query($onlines);
    // $a=$onlines->fetch_all(MYSQLI_ASSOC);
    // $myArr=$a;

    $online="DELETE  from images where image_id='$id' ";
$online=$con->query($online);
if($online){

    header('location:allphotos.php?uploadId='.$link);
}
else{
echo "eded";
}

    ?>