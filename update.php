<?php 
session_start();
include("db.php");

$row['id'] = $_GET['edit'];
$id = $row['id'];

if(isset($_POST['updateBtn'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $roll = $_POST['roll'];

    $sql = "UPDATE student SET name='$name',age='$age',roll='$roll' WHERE id={$id}";
    $updateData = mysqli_query($conn,$sql);
   
    if($updateData){
        $_SESSION['success'] = "<div class=\"alert alert-success\">Data Updated successfully</div>";
        header("Location:index.php");
    }else{
        $_SESSION['error'] = " <div class=\"alert alert-danger\">Data Not update</div>";
        header("Location:edit.php");
    }
        

    }



?>