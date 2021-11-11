<?php 
session_start();
include("db.php");

    if(isset($_POST['insertBtn'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $roll = $_POST['roll'];
        if(!empty($name) && !empty($age) && !empty($roll)){
            $sql = "INSERT INTO student(id,name,age,roll) VALUES(NULL,'$name','$age','$roll')";
            $insertQuery = mysqli_query($conn,$sql);

            if($insertQuery){
                $_SESSION['success'] = "<div class=\"alert alert-success\">Data insert successfully</div>";
                header("Location:index.php");
            }else{
                $_SESSION['error'] = " <div class=\"alert alert-danger\">Data Not insert</div>";
                header("Location:create.php");
            }
        }else{
            $_SESSION['error'] = "<div class=\"alert alert-danger\">Empty Field</div>";
            header("Location:create.php");
        }  

    }
    
?>