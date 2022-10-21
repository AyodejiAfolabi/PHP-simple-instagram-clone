
<?php
session_start();
    include "credentials.php";
    $id=$_SESSION['id'];

    $online="SELECT * from users where user_id=$id";
    $online=$con->query($online);
    $a=$online->fetch_assoc();


$chars='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU() ';
$uploadId=str_shuffle($chars);
echo $uploadId.'<br>';
$capture=$_POST['capture'];

$thisFiles= $_FILES['myFiles']['name'];	
print_r($thisFiles);
$tmp= $_FILES['myFiles']['tmp_name'];	
echo	count($thisFiles);	
// print_r ($thisFiles)['name'];

for ($i=0; $i <count($tmp) ; $i++) { 
    if($tmp[$i]){
   $fileName=$thisFiles[$i];
   echo $fileName;
    $moveds=move_uploaded_file($tmp[$i], 'images/'.$fileName);
    if($moveds){
   
      
        $saveToImages=" INSERT into images (image_name,sender_id,post_id)values('$fileName','$id','$uploadId')";
        $checks=$con->query($saveToImages);
    
        if($checks){
            echo "yessss";
        }
        if(!$checks){
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
$date='Posted on '.$day.', '. date("d").' of '. $months[date("m")-1]. ' at '.date("h:i").' '.$meri;
   
    }





}
if($checks){
$saveToPost=" INSERT into posts (upload_id,uploader_id,date,caption)values('$uploadId','$id','$date','$capture')";


$changes=$con->query($saveToPost);
if($changes){
    echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx".'<br>';
}

$_SESSION['lastUploadId']=$uploadId;
header('location:upload.php');


}

?>