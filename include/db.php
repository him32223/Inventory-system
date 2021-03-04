<?php
if ($_SERVER['SERVER_NAME']=='localhost') {
$servername = "localhost";
$username = "root";
$password ="";
$database ="sy_inventory";
	# code...
}else{
$servername = "aster.arvixe.com";
$username = "sales";
$password ="sales";
$database ="sy_inventory";
}
//Create connection
$conn = new mysqli($servername,$username,$password,$database);

//Check connection
if($conn -> connect_error){
	die("Connection failed:".$conn ->connect_erro);
}
?>
