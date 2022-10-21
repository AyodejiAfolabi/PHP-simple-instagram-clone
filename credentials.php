
<?php
$anythingHost='localhost';
$anyNameUserName='root';
$whateverPassword='';
$suggestionDbName='instagram';
$con=new mysqli($anythingHost,$anyNameUserName,$whateverPassword,$suggestionDbName);

if($con->connect_error){
	die('unable to connect'.'<br>');
}
?>