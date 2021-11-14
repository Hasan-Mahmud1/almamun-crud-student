<?php 
session_start();
include("../db.php");

$nameErr = $emailErr = $cpassError = "";
$name = $email = $password = $confirm_password = "";

if(isset($_POST['registerBtn'])){

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);

    if($password != $confirm_password){
        $cpassError = "Password Not Match";
    }

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      
       
        if(!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password)){

            if(empty($nameErr) && empty($emailErr) && empty($cpassError)){

                if($password != $confirm_password){
                    $cpassError = "Password Does Not Match";
                    $_SESSION['msg'] = "Password Does Not Match";
                    $_SESSION['msg_code'] = "error";
                }else{

                    $sql2 = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                    $result = mysqli_query($conn,$sql2);
                    
                    if(mysqli_num_rows($result)==1){
                        $_SESSION['msg'] = "This Email Alredy Taken.Please Try Another One.";
                        $_SESSION['msg_code'] = "error";
                    }else{

                        $sql = "INSERT INTO users(id,name,email,password,confirm_password) VALUES(NULL,'$name','$email','$password','$confirm_password')";
                        $insertQuery = mysqli_query($conn,$sql);

                        if($insertQuery){
                            $_SESSION['msg'] = "Congrats! Registered successfully";
                            $_SESSION['msg_code'] = "success";
                        
                        }else{
                            $_SESSION['msg'] = "Error";
                            $_SESSION['msg_code'] = "error";
                            
                        
                        }
                    }

                }
                
            }else{
                $_SESSION['msg'] = "Error";
                $_SESSION['msg_code'] = "error";
            }

        }else{
            $_SESSION['error'] = "<div class=\"alert alert-danger\">Error or Empty Field</div>";
            
        }  

}

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="forn-label">name :</label>
                            <input type="name" name="name" class="form-control" placeholder="name" value="<?php echo $name;?>">
                            <span class="text-danger"><?php echo $nameErr;?></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="forn-label">email :</label>
                            <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email;?>">
                            <span class="text-danger"><?php echo $emailErr;?></span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="forn-label">Password :</label>
                            <input type="text" name="password" class="form-control" placeholder="password" value="<?php echo $password;?>">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="forn-label">Confirm Password :</label>
                            <input type="text" name="confirm_password" class="form-control" placeholder="Confirm password" value="<?php echo $confirm_password;?>">
                            <span class="text-danger"><?php echo $cpassError;?></span>
                        </div>
                        <button type="submit" name="registerBtn" class="btn btn-success" >Signup</button>

                        <a href="login.php">login</a>
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


