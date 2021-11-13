<?php 
session_start();
include("../db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

   if($row['role'] == 1){
         
    $_SESSION['name'] = $row['name'];

    $_SESSION['email'] = $email;
        $_SESSION['admin'] = true;
        header('Location:dashboard.php');
        
    }else if(($row['role'] == 0)){
        
        $_SESSION['name'] = $row['name'];

        $_SESSION['email'] = $email;
        $_SESSION['user'] = true;
        header('Location:../index.php');
    
    }else
    {
        $_SESSION['error']="<div class=\"alert alert-danger\">Invalit email or password</div>";
        header('Location:login.php');
    }

   


    

?>