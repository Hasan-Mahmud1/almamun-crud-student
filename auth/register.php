<?php 
include("../includes/navbar.php");
session_start();
include("../db.php");

if(isset($_POST['registerBtn'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
       

        if(!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password)){

        

            if($password != $confirm_password){
            
                $_SESSION['error'] = " <div class=\"alert alert-danger\">Password Not Match</div>";
            }else{

                $sql = "INSERT INTO users(id,name,email,password,confirm_password) VALUES(NULL,'$name','$email','$password','$confirm_password')";
                $insertQuery = mysqli_query($conn,$sql);

                if($insertQuery){
                    $_SESSION['success'] = "<div class=\"alert alert-success\">Register successfully</div>";
                
                }else{
                    $_SESSION['error'] = " <div class=\"alert alert-danger\">Error</div>";
                
                }
            }

        }else{
            $_SESSION['error'] = "<div class=\"alert alert-danger\">Empty Field</div>";
           
        }  

    }

?>
    <main class="" style="min-height: 87vh;">
        <div class="container">
            <br>
            <div class="card w-50 mx-auto">
           
            <?php 
                if(isset($_SESSION['success'])){

                    echo $_SESSION['success'];
                }
            ?>
            <?php 
                if(isset($_SESSION['success'])){

                    unset($_SESSION['success']);
                }
            ?>
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
                    <div class="card-title text-muted fw-bold fs-2">User Register</div>    

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="forn-label">name :</label>
                            <input type="name" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="forn-label">email :</label>
                            <input type="text" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="forn-label">Password :</label>
                            <input type="text" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="forn-label">Confirm Password :</label>
                            <input type="text" name="confirm_password" class="form-control" placeholder="Confirm password">
                        </div>
                        <button type="submit" name="registerBtn" class="btn btn-success" >Signup</button>

                        <a href="login.php">login</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
<?php 
include("../includes/footer.php");
?>   


