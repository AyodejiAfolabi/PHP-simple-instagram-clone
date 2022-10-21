<?php
    session_start();
    include "credentials.php";
    $id=$_SESSION['id'];
    // echo "$id";
    $online="SELECT * from users where user_id=$id";
    $online=$con->query($online);
    $a=$online->fetch_assoc();




?>





<!DOCTYPE html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="
    https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav style="height:60px" class="navbar  navbar-light bg-light">
        <span class="navbar-brand ml-5 mb-0 h1 d-inline-flex">
            <div class="bg-white container w-100 rounded-circle mr-2"><i class="fa fa-user text-dark"></i></div>
            Instagram
        </span>
        <!-- <span class=" mt-1 mr-5"><input placeholder="Search" class="mr-5 border border-secondary rounded pl-2" style=" box-sizing:border-box background-color:#FAFAFA; height:20px;font-family:cursive; font-size:14px; "/>
        </span> -->
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
      <li class="nav-item">
        <a class="nav-link" href="login.php"><i class="fa fa-lg fa-power-off"></i></a>
      </li>
    </ul>
        </nav>

    <div class=" w-100 bg-white" style="height: 500px;">

        <div class="row bg-light jumbotoron border border-radius" style="height: 200px;">
            <div class="col-md-md-4 offset-2">
            <img src="<?php
if(empty($a['profile'])){
  echo 'images/gview.png';

}
else{
  echo 'images/'.$a['profile'];
}

?>" class="rounded-circle" style="width:180px; height:180px"></div>
            
            <div class="col-md-4 offset-2 mt-2">
            <div class="row">
            <div class="col-md-4">
            <p class="h4"><?php
 echo $a['userName'];
?></p>
            </div>
            <div class="col-md-6 ml-5">
           
           <form method="post" class="inline-form row" style="width:450px;" action="profilepix.php" enctype="multipart/form-data">
<input type="file" name="myFile" style="display:inline-block;"/>
           <button class="btn btn-success  " style="margin-left:-80px;">Change Picture<i class="ml-3 fa fa-edit"></i> </button>
           </form>
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
            
<hr>

<div class="container w-100 mt-1" style="height: 60%;">

    <div style="width:100%" class="body-bg container-fluid">
        <div class="container w-60 p-5">
            <form action="editprofile.php" method="post" class="bg-white shadow p-5 text-center mb-5 pb-5" enctype="multipart/form-data">
          <h3 class="float-left" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Personal Informations</h3>
                <div class="form-row pt-2 col">
                    <div class="form-group col-lg-6">
                        <input value="<?php
 echo $a['firstName'];
?>" type="text" placeholder="First Name" name="fName" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <input value="<?php
 echo $a['lastName'];
?> "type="text" placeholder="Last Name" name="lName" class="form-control">
                    </div>
                </div>
                <h3 class="float-left" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Contact Informations</h3>
 
                <div class="form-row pt-2 col">
                <div class="form-group  col-lg-6">
                    <input value="<?php
 echo $a['email'];
?> "type="email" placeholder="Email Address" name="email" name="Email" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <input  value="<?php
 echo $a['userName'];
?>"type="text" placeholder="Username" name="userName"  class="form-control">
                </div>

</div>

                <div class="form-group pt-2 col">
                    <input value="<?php
 echo $a['phone'];
?>"type="text" placeholder="Phone Number" name="phone" class="form-control">
                </div>



                <h3 class="float-left" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Add Description</h3>
 
                <div class="form-group pt-2 col-8">
                    <textarea style="height: 100px; " name="about" type="text"  class=" form-control">
                    <?php
                    if(!empty($a['about'])){
 echo $a['about'];
}
 else{
   echo " Write about yourself so that your Friends and Family may Recognize you";
 }


?></textarea>
                </div>





                <button type="submit" name="submit" class="btn btn-success justify-content-end float-right">Submit<i class="ml-3 fa fa-edit"></i></button>
             
            </form>
        </div>
    </div>


</div>

</body>
</html>