<?php 

$conn = mysqli_connect('localhost','root','','sms');
if(!$conn){
    die("Connection Error").mysqli_connect_error($conn);
}


?>