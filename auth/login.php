<?php 
session_start();
include("../db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>  
<body>
    <header class="bg-primary bg-gradient py-3">
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <a href="../index.php" class="fw-bold fs-3 text-white navbar-brand">Home</a>
                </div>
                <div class="d-flex">
                    <a href="login.php" class="text-white nav-link">login</a>
                    <a href="register.php" class="text-white nav-link">register</a>        
                </div>
            </div>
    </header>

    <main class="" style="min-height: 87vh;">
        <div class="container">
            <br>
            <div class="card w-50 mx-auto">
           
            <?php 
                if(isset($_SESSION['error'])){

                    echo $_SESSION['error'];
                }
            ?>
            <?php 
                if(isset($_SESSION['error'])){

                    unset($_SESSION['error']);
                }
            ?>
          
                <div class="card-body">
                    <div class="card-title text-muted fw-bold fs-2">User Login</div>  
                        
                    <form action="check.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email" class="forn-label">email :</label>
                            <input type="email" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="forn-label">Password :</label>
                            <input type="text" name="password" class="form-control" placeholder=" password">
                        </div>
                        <button type="submit" name="login" class="btn btn-success" >Login</button>
                        <a href="register.php">register</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>

<?php 
include("../includes/footer.php");
?>   


