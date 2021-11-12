<?php 
session_start();
include("../db.php");
include("../includes/navbar.php");

?>
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
                            <input type="email" name="email" class="form-control" placeholder="Student email">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="forn-label">Password :</label>
                            <input type="text" name="password" class="form-control" placeholder="Student password">
                        </div>
                        <button type="submit" name="login" class="btn btn-success" >Login</button>
                        <a href="register.php">register</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
<?php 
include("../includes/footer.php");
?>   


