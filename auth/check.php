<?php 
session_start();
include("../db.php");
include("function.php");


if(isset($_POST['loginBtn']) && isset($_SESSION['token']) && $_SESSION['token']==$_POST['token']){
    
        $token = $_POST['token'];
        $email = $_POST['email'];
        $password = hash('sha1',$_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        $rowcount = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if(!empty($email) && !empty($password)){
           
            if($rowcount == 1 && $row['email'] = $email &&  $row['password'] = $password){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                
                if($row['role'] == 1){
                    $_SESSION['admin'] = "admin";                 
                    header('Location:dashboard.php');

                }else if(($row['role'] == 0)){
                   
                    $_SESSION['user'] = "user";
                    header('Location:../index.php');
                }
            }else{

                $_SESSION['msg'] = "No Data";
                $_SESSION['msg_code'] = "error";
                header('Location:login.php');
            }
            
    }else{
     
        $_SESSION['msg'] = "Field Should not Eampty";
        $_SESSION['msg_code'] = "error";
         header('Location:login.php');
    }
    // if($row['role'] == 1){
            
    //     $_SESSION['name'] = $row['name'];

    //     $_SESSION['email'] = $email;
    //         $_SESSION['admin'] = true;
    //         header('Location:dashboard.php');
            
    //     }else if(($row['role'] == 0)){
            
    //         $_SESSION['name'] = $row['name'];

    //         $_SESSION['email'] = $email;
    //         $_SESSION['user'] = true;
    //         header('Location:../index.php');
        
    //     }else
    //     {
    //         $_SESSION['error']="<div class=\"alert alert-danger\">Invalit email or password</div>";
    //         header('Location:login.php');
           
    //     }

    

}

$_SESSION['token'] = get_random_string(60);

?>