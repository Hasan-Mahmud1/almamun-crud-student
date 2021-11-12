<?php 
session_start();
include("../db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['name'] = $row['name'];
    if(mysqli_num_rows($result)==1){
        $_SESSION['login'] = true;
        header('Location:../index.php');
    }else{
        $_SESSION['error']="<div class=\"alert alert-danger\">Invalit email or password</div>";
        header('Location:login.php');
    }

    $_SESSION['name']=$name;

?>