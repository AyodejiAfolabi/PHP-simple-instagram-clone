
<?php
    session_start();
    include "credentials.php";
    $id=$_GET['uploadId'];
    if(!$_SESSION['id']){
        header('location:login.php');
            }
    $ids=$_SESSION['id'];
    // echo $id;

    if($id=='all'){
        $onlines="SELECT * from images where sender_id='$ids'";
        $onlines=$con->query($onlines);
        $a=$onlines->fetch_all(MYSQLI_ASSOC);
        $myArrs=$a;
    }
    else{
    $onlines="SELECT * from images where post_id='$id'";
$onlines=$con->query($onlines);
$a=$onlines->fetch_all(MYSQLI_ASSOC);
$myArrs=$a;
    }
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
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
    <a class="nav-link active" href="dashboard.php"><i class="fa fa-home fa-lg"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="upload.php"><i class="fa fa-lg fa-instagram"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php"><i class="fa fa-lg fa-power-off"></i></a>
  </li>
</ul>
    </nav>



<br><br>
<h4 style="font-family:cursive;">All Photos</h4>
<!-- <a href="#" class="btn btn-primary">See All Photos</a> -->
<hr>
<div class="row container d-flex space-between bg-light" > 

<?php

for ($i=0; $i <count($myArrs) ; $i++) { 
    $link=$myArrs[$i]['image_id'];
    $tj=$myArrs[$i]['post_id'];
    $a="SELECT * from posts where upload_id='$tj'";
    $a=$con->query($a);
    $c=$a->fetch_assoc();
    $b=$c;
 ?>
<div class="col-4  mt-4  flex-wrap">
<img class=""  style="width:100%; height:300px; border-radius:10px;" src="<?php
echo 'images/'.$myArrs[$i]['image_name'];
?>
 " data-toggle="modal" data-target="<?php
  echo '#myModal'.$link
  ?>"/>
  <div class="modal" id="<?php
echo "myModal".$link;
  ?>" >
  
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 style="display:inline;" class="card-title ml-3">
  <?php
  echo $b['caption'];
?>
      </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  
  </div>
  
  <div class="modal-body">
  <img data-toggle="modal"  style="width:100%;height:400px;" class="mx-auto shadow w-100" src="<?php
  
 
  
    echo 'images/'.$myArrs[$i]['image_name'];

  
  ?>"/>
  <div class="modal-footer">
  <?php
  echo $b['date'];
  // echo $myArr[$k]['caption'];
  ?>
  
  </div>
  
  </div>


  
  </div>
  
  </div>
    
    </div>
<?php
  if($myArrs[$i]['sender_id']==$_SESSION['id']){

  ?>
<a href="delphoto.php?photoId=<?php

$_SESSION['link']=$id;
echo $link;?>"
  ><h4 style=" bg bg-white margin-left:100%;"><i class="fa fa-trash text-danger"></i></h4></a>
  <?php
  }?>
 
</div>



<?php
}
?>
</div>
<?php
  if($myArrs[0]['sender_id']==$_SESSION['id'] && $id!=='all'){

  ?>
<div class="container pl-2 mt-5"> 
    <form  class="justify-content-between pl-5" enctype="multipart/form-data" action="editprocess.php?editId=<?php echo $id;?>
    " method="post">
    <!-- <input class="d-block" name="myFile" type="file"/> -->
    <input class="" name="myFiles[]" type="file" multiple="multiple" />
    <textarea  name="capture" class="d-inline pl-2 ml-2 border border-none" style="width:40%;height:100px;">
<?php
 $onlines="SELECT * from posts where upload_id='$id'";
 $onlines=$con->query($onlines);
 $a=$onlines->fetch_all(MYSQLI_ASSOC);
 $myArrs=$a;
print_r( $myArrs[0]['caption']);
?>
</textarea>
    <button type="submit" class="btn btn-success ml-5" name="submit">Edit<i class="fa fa-upload"></i></button>
    </form>

</div>




<?php
  }
  ?>

</html>