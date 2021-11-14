<?php 
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:login.php");
}



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body>
        <div class="container">
            <br>
            <div class="card">
                <div class="card-body">
                    <a href="../index.php" class="btn btn-sm btn-success">Home</a>
                    <a href="logout.php" class="btn btn-sm btn-danger">logout</a>
                    <hr>
                    <h1>Admin Dashboard</h1>
                    <hr>
                    <h2><span class="fw-bold" style="color: salmon;">Congratulations</span>
                        <span><?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?></span></h2>
                </div>
            </div>
        </div>
    </body>

</html>