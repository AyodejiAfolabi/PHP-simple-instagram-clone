<?php
    session_start();
    include "credentials.php";
    $id=$_SESSION['id'];



// $pic=$_POST['ppic'];


$thisFile= $_FILES['myFile'];			
print_r($_FILES['myFile']).'<br>';
$fileName= $thisFile['name'];
$ext=pathinfo($fileName,PATHINFO_EXTENSION);
$moved=move_uploaded_file($thisFile['tmp_name'], 'images/'.$fileName.'.'.$ext);
$image=$fileName.'.'.$ext;
if($moved){
$change="UPDATE users set profile='$image' where user_id='$id' ";
$change=$con->query($change);
if($change){
header('location:profile.php');
}



}
else{
    header('location:profile.php');
}



// $change="UPDATE users set profile='$'"
// UPDATE users
// SET profile='mason.jpg'
// WHERE user_id=1;


    // echo "$id";
    // $online="SELECT * from users where user_id=$id";
    // $online=$con->query($online);
    // $a=$online->fetch_assoc();




?>
