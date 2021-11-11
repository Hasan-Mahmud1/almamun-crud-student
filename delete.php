<?php 
 session_start();
 include("db.php");
 if(isset($_GET['delete'])){
    $row['id'] = $_GET['delete'];
    $id = $row['id'];
    $sql = "DELETE FROM student WHERE id={$id}";
    $deleteData = mysqli_query($conn,$sql);
    if($deleteData){
        $_SESSION['success'] = "<div class=\"alert alert-success\">Data Deleted successfully</div>";
        header("Location:index.php");
    }
 }      