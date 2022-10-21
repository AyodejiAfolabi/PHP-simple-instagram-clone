
<?php
session_start();
    include "credentials.php";
    $id=$_SESSION['id'];
$ids=$_GET['editId'];
    // $online="SELECT * from users where user_id=$id";
    // $online=$con->query($online);
    // $a=$online->fetch_assoc();


   
// $chars='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU() ';
// $uploadId=str_shuffle($chars);
// echo $uploadId.'<br>';
// $date= date("Y-m-d"). '--' . date("H:i:s");
$capture=$_POST['capture'];
$thisFile= $_FILES['myFile'];			
$fileName= $thisFile['name'];
$ext=pathinfo($fileName,PATHINFO_EXTENSION);
$moved=move_uploaded_file($thisFile['tmp_name'], 'images/'.$fileName.'.'.$ext);
$image=$fileName.'.'.$ext;

$thisFiles= $_FILES['myFiles']['name'];	
$tmp= $_FILES['myFiles']['tmp_name'];	
echo	count($thisFiles);	
for ($i=0; $i <count($tmp) ; $i++) { 
   $fileName=$thisFiles[$i];
   echo $fileName;
    $moveds=move_uploaded_file($tmp[$i], 'images/'.$fileName);
    if($moveds){
   
      
        $saveToImages=" INSERT into images (image_name,sender_id,post_id)values('$fileName','$id','$ids')";
        $checks=$con->query($saveToImages);
    
        if($check){
            echo "no";
        }
        if($checks){
            echo "nop";
        }
        
    }
    if(date("h")>11){
        $meri='AM';
    }
    else{
        $meri='PM';
    }
    $dat= date("Y-m-d");
    $unix=strtotime($dat);
    $day=date("l",$unix);
    $months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    // echo $months[date("Y")]
$date='Updated on '.$day.', '. date("d").' of '. $months[date("m")-1]. ' at '.date("h:i").' '.$meri;
    $saveToPos=" UPDATE posts set date='$date' where upload_id='$ids' ";
    // $saveToPost=" UPDATE posts set (date,caption)values($date','$capture')";
    $saveToPost=" UPDATE posts set caption='$capture' where upload_id='$ids' ";
    // $change="UPDATE users set firstName='$fName' where user_id='$id' ";

    $change=$con->query($saveToPos);

    $changes=$con->query($saveToPost);
    if($changes){
        echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    }





header('location:dashboard.php');





}

?>