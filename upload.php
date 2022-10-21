<?php
    session_start();
    include "credentials.php";
$kk=$_SESSION['id'];
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/mystylecss">
    <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="./bootstrap-4.5.0-dist/fonts/font/css/all.css"> -->
    <link rel="stylesheet" href="
    https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav style="height:60px" class="navbar  navbar-light bg-light">
    <span class="navbar-brand ml-5 mb-0 h1 d-inline-flex">
        <div class="bg-white container w-100 rounded-circle mr-2"><i class="fa fa-user text-dark"></i></div>
        Instagram
    </span>
    <span class=" mt-1 mr-5"><input placeholder="Search" class="mr-5 border border-secondary rounded pl-2" style=" box-sizing:border-box background-color:#FAFAFA; height:20px;font-family:cursive; font-size:14px; "/>
    </span>
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <!-- <i class="fa fa-circle-times"></i> -->
    <a class="nav-link active" href="mypost.php"><i class="fa fa-home fa-lg"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="upload.php"><i class="fa fa-lg fa-instagram"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php"><i class="fa fa-lg fa-power-off"></i></a>
  </li>
</ul>
    </nav>

<div class="container pl-2 "> 
    <form  class="justify-content-between pl-5" enctype="multipart/form-data" action="uploadprocess.php" method="post">
    <!-- <input class="d-block" name="myFile" type="file"/> -->
    <input class="" name="myFiles[]" type="file" multiple="multiple" />
    <textarea  name="capture" class="d-inline pl-2 ml-2 border border-none" style="width:40%;height:100px;">
Add Caption.........

</textarea>
    <button type="submit" class="btn btn-success ml-5" name="submit">Upload<i class="fa fa-upload"></i></button>
    </form>

</div>




<?php
$id=$_SESSION['id'];

$onlines="SELECT * from posts where uploader_id='$id'";
$onlines=$con->query($onlines);
$a=$onlines->fetch_all(MYSQLI_ASSOC);
// print_r($a);
$myArr=$a;
if($myArr){
for ($k=0; $k <count($myArr) ; $k++) { 

$last=$myArr[$k];

// print_r($last);
if($last){
$id=$last['upload_id'];
// echo $id.'<br><br><br><br><br>';
$online="SELECT * from images where post_id='$id' ";
$online=$con->query($online);
// $last_id = $con->insert_id;
// echo $last_id;
$b=$online->fetch_all(MYSQLI_ASSOC);
$myArrs=$b;
// print_r($myArrs);


}

}

?>
<br><br>
<h4 style="font-family:cursive;">Photos from Your Last Post</h4><a href="allphotos.php?uploadId=all" class="btn btn-primary">See All Your Photos</a><hr>
<div class="row container d-flex space-between bg-light" > 

<?php

for ($i=0; $i <count($myArrs) ; $i++) { 

 ?>
<div class="col-4  mt-4  flex-wrap">
<img class=""  style="width:100%;height:300px; border-radius:10px;" src="<?php
echo 'images/'.$myArrs[$i]['image_name'];
?>
"/>

</div>
<?php
}


}


else{
  echo '<div class="card" style="width:400px;margin-top:100px; margin-left:20%; ">
  <div class="card-body">
    <h2 class="card-title" style="font-family:cursive;">
    
    No Recent Post</h2>
    <p class="card-text">Add to your Album above <i class="fa fa-hand-o-up"></i></p>
  </div>
  <img class="card-img-bottom" src="pics/img_avatar1.png" alt="Card image" style="height:200px;width:100%">
</div>
</div>
';
}
?>


</div>


</html>