
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header class="bg-primary bg-gradient">
        <div class="container">
            <div class="logo">
                <a href="index.php" class="fw-bold fs-3 text-white navbar-brand">Home</a>
            </div>
            <div>
                <?php if(isset($_SESSION['login'])){ ?>
                
                <a href="./auth/logout.php" class="btn btn-sm btn-danger">logout</a>

                <?php }else{?>

                    <a href="./auth/login.php" class="btn btn-sm btn-success">login</a>

                <?php }?>

            </div>
          
        </div>
    </header>