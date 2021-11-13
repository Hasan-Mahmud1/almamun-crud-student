<?php 
 session_start();
 include("db.php");

 if(!isset($_SESSION['email'])){

    header("Location:auth/login.php");

}else{


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

}


 