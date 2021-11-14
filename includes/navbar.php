<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title;?></title>
        <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body> 
        <header class="bg-primary bg-gradient py-3">
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <a href="index.php" class="fw-bold fs-3 text-white navbar-brand">Home</a>
                </div>
                <div class="d-flex">
                    <?php if(isset($_SESSION['user_id'])){ ?>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" class="text-white navbar-light" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['name'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if(isset($_SESSION['admin'])){?>
                                <li><a class="dropdown-item" href="./auth/dashboard.php">Dashboard</a></li>
                                <?php }?>
                                <?php if(isset($_SESSION['user'])){?>
                                <li><a class="dropdown-item" href="./auth/dashboard2.php">Dashboard</a></li>
                                <?php }?>
                                <li><a class="dropdown-item" href="#">Profile</a></li>                      
                                <li><a class="dropdown-item" href="./auth/logout.php">logout</a></li>
                            </ul>
                        </li>
                    </ul>

                    <?php }else{?>

                    <a href="./auth/login.php" class="text-white nav-link">login</a>
                    <a href="./auth/register.php" class="text-white nav-link">register</a>

                    <?php }?>

                </div>

            </div>
        </header>
       