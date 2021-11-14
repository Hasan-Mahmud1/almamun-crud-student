<?php 
 session_start();
 include("db.php");

if(isset($_SESSION['admin'])){
    if(isset($_GET['delete'])){
        $row['id'] = $_GET['delete'];
        $id = $row['id'];
        $sql = "DELETE FROM student WHERE id={$id}";
        $deleteData = mysqli_query($conn,$sql);
        if($deleteData){
            $_SESSION['msg'] = "Data Deleted successfully";
            $_SESSION['msg_code'] = "success";
           
            header("Location:index.php");
        }
     }      
}else{
    $_SESSION['msg'] = "No Permission";
    $_SESSION['msg_code'] = "error";
    
    header("Location:index.php");
}



 