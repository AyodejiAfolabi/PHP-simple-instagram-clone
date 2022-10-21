<?php
    session_start();
    include "credentials.php";
    $id=$_SESSION['id'];
    if(!($id)){
      header('location:login.php');
      $_SESSION['signupSuc']='<div class="alert alert-danger alert-dismissible text-danger fontz" >Your have Log Out</div>';

    };
    $online="SELECT * from users where user_id=$id";
    $online=$con->query($online);
    $a=$online->fetch_assoc();





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
    <a class="nav-link active" href="mypost.php"><i class="fa fa-home fa-lg"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="upload.php"><i class="fa fa-lg fa-instagram"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php"><i class="fa fa-lg fa-video-camera"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php"><i class="fa fa-lg fa-power-off"></i></a>
  </li>
</ul>
    </nav>

<div class="container border" style="height:150px; margin-left:40px; margin-right:40px;">

<div class="row bg-light jumbotoron border border-radius">
<div class="col-md-md-4 offset-2">
<img src="<?php
if(!empty($a['profile'])){
  echo 'images/'.$a['profile'];
}
else{
  echo 'images/gview.png';
}

?>" class="rounded-circle" style="width:180px; height:180px"></div>

<div class="col-md-4 offset-2 mt-2">
<div class="row">
<div class="col-md-4">
<p class="h4"><?php
 echo $a['userName'];
?>
</p>
</div>
<div class="col-md-6 ml-5">
<a href="profile.php"><button  class="btn btn-success">Edit Profile <i class="ml-3 fa fa-edit"></i></button></a>
</div>
</div><br>
<div class="row w-100">
<div class="col-md-3">
<p><b>10 </b>posts</p>
</div>
<div class="col-md-4">
<p><b>200 </b>followers</p>
</div>
<div class="col-md-4">
<p><b>300 </b>following</p>
</div>


</div>

<div class="ml-5"> <p><?php
 echo $a['firstName'].' '.$a['lastName'];
?></p>
 </div>
</div>




</div>

<?php
// $id=$_SESSION['id'];REAL
// $onlines="SELECT * from posts where uploader_id='$id'";
// $onlines=$con->query($onlines);
// $a=$onlines->fetch_all(MYSQLI_ASSOC);
// $myArr=$a;
// if(count($myArr)==0){
  $onlines="SELECT * from posts";
  $onlines=$con->query($onlines);
  $a=$onlines->fetch_all(MYSQLI_ASSOC);
  shuffle($a);
  $myArr=$a;
// }END
// print_r($myArr);
// $d=mktime(11-14-54-8-12-2014);
// echo "Created date is " . date("Y-m-d h:i:sa", $d);
 
for ($k=0; $k <count($myArr) ; $k++) { 

$id=$myArr[$k]['upload_id'];
$online="SELECT * from images where post_id='$id' ";
$online=$con->query($online);
$b=$online->fetch_all(MYSQLI_ASSOC);
$myArrs=$b;
?>
<!-- START -->
<div class="row   d-flex space-between" style="width:100%;  margin-left:20%;" > 

   <div class="card col-7 ml-5 mt-3">
   <div class="card-body">
   
     <span>  <img  src="<?php
     $poster_id=$myArr[$k]['uploader_id'];
  $poster=" SELECT * from users where user_id= '$poster_id' " ;
  $post=$con->query($poster);
  $post=$post->fetch_assoc();
  if(empty($post['profile'])){
    echo 'images/gview.png';
  
  }
  else{
    echo 'images/'.$post['profile'];
  }
      // print_r( 'images/'.$post['profile']);
   ?>" data-toggle="modal" data-target="<?php
   echo "#mypro".$k;
    ?>
    "  alt="Card image" style="height:80px; cursor:pointer; width:80px; border-radius:100%;"> <span>
  


     </span> <h4 style="display:inline;" class="card-title ml-3">
<?php
    print_r( $post['userName']);
?>

      </h4></span>
      <div class="modal" id="<?php
echo "mypro".$k;
  ?>">>
  
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 style="display:inline;" class="card-title ml-3">
<?php
    print_r( $post['userName']);
?>

      </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  
  </div>
  
  <div class="modal-body">
  <img data-toggle="modal"  style="width:100%;height:400px; border-radius:100%;" class="mx-auto shadow w-100" src="<?php
  
  if(empty($post['profile'])){
    echo 'images/gview.png';
  
  }
  else{
    echo 'images/'.$post['profile'];
  }
  
  ?>"/>
  
  </div>


  
  </div>
  
  </div>
    
    </div>
      <h5 class="card-text mt-4"><?php
     $desc=$myArr[$k]['caption'];
       
     echo $desc;
 
      ?>



</h5>
    </div>
    <div class="d-flex row">
<!-- END -->
<?php
if(count($myArrs)>4){
  $length=count($myArrs);
 $myArrs=(array_slice($myArrs,$length-4, $length ,false));
//  print_r( count($myArrs));

  // echo "1234";
}

for ($i=0; $i <count($myArrs) ; $i++) { 

   

    ?>
   
 
  <img data-toggle="modal" data-target="<?php
  echo '#myModal'.$myArrs[$i]['image_id'];
  ?>" style="height:500px;cursor:pointer;" class="<?php
    if(count($myArrs)%2==1){
if($i==count($myArrs)-1){
  echo "card-img-bottom mt-2 col-12 h-50 flex-wrap";
}
else{
  echo "card-img-bottom mt-2 col-md-6 h-50 flex-wrap";
}
    }
    if(count($myArrs)==1){
      echo "card-img-bottom mt-2 h-100 flex-wrap";
    }
    if(count($myArrs)==2){
      echo "card-img-bottom mt-2 col-md-6  flex-wrap";
    }
    if(count($myArrs)==4){
      echo "card-img-bottom mt-2 col-md-6 h-50 flex-wrap";
    }
    ?>" src="<?php
   echo 'images/'.$myArrs[$i]['image_name'];
  
   ?>" alt="Card image" style="height:350px;">
   <div class="modal" id="<?php
  echo 'myModal'.$myArrs[$i]['image_id'];
  ?>">
  
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h6 class="modal-title">
  <span>  <img  src="<?php
  if(empty($post['profile'])){
    echo 'images/gview.png';
  
  }
  else{
    echo 'images/'.$post['profile'];
  }

   ?>" alt="Card image" style="height:80px; width:80px; border-radius:100%;"> 
   
   <span class="ml-2">
  <?php
 
 print_r( $post['userName']);
  ?>
  </span>
   </span>
  
   <br>
   
  </h6>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  
  </div>
  <h5><span style="margin-left:10%" class=" mt-1">
  <?php
 
 echo $myArr[$k]['caption'];
  ?>
  </span></h5>
  <div class="modal-body">
    <div>

    </div>
  <img data-toggle="modal"  style="width:100%;height:300px;" class="mx-auto shadow w-100" src="<?php
  
  echo 'images/'.$myArrs[$i]['image_name'];
  
  ?>"/>
  <div class="modal-footer">
  <?php
  echo $myArr[$k]['date'];
  // echo $myArr[$k]['caption'];
  ?>
  
  </div>
  </div>
  </div>
  
  </div>
    
    </div>
  
   <?php
// echo 
   }

  ?>
  
  </div>
  
   <div class="card-body">
      <!-- <h4 class="card-title">John Doe</h4> -->
      <p class="card-text mt-3" style="font-size:13px; float:right;">
        
        <?php
             $date=$myArr[$k]['date'];
             echo $date;
       
        ?>
      </p>
     <h6 style="cursor:pointer;clear:both;" class="mt-4"><span class="ml-4">Like<span> <i class="fa fa-thumbs-up text-primary"></i> <span class="ml-4">Dislike<span> <i class="fa fa-thumbs-down text-primary"></i>
  
     <span class="ml-4">Comment<span> <i class="fa fa-mail-reply text-blue"></i>
    </h6>
         <?php
        $link=$myArr[$k]['upload_id'];
      
          ?>    
         <a href="allphotos.php?uploadId=<?php echo $link;?>" class="btn btn-primary mt-3">See all Photos</a>
   
  <?php
  if($myArr[$k]['uploader_id']==$_SESSION['id']){

  ?>
<a href="delpost.php?uploadId=<?php echo $link;?>"
  ><h4 style="margin-left:100%;"><i class="fa fa-trash text-danger"></i></h4></a>
  <?php
  }?>
    </div>
  </div>

  
  

</div>
   

  <?php
  }

?>





























</body>
</html>