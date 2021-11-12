<?php 
session_start();
include("db.php");
include("includes/navbar.php");

if(!isset($_SESSION['login'])){
    header("Location:auth/login.php");
}

if(isset($_GET['edit'])){

    $row['id'] = $_GET['edit'];
    $id = $row['id'];
    $sql = "SELECT * FROM student WHERE id={$id}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $age = $row['age'];
    $roll = $row['roll'];
}

?>
    <main class="">
        <div class="container">
            <br>
            <div class="card">
           
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
                    <div class="card-title text-muted fw-bold fs-2">Update Student Data</div>
                    <a href="index.php" class="btn btn-success btn-sm fw-bold shadow">Show Data</a>
                    
                    <form action="update.php?edit=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="forn-label">Name :</label>
                            <input type="text" name="name" class="form-control" placeholder="Student Name" value="<?php if(isset($name)) echo $name; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="forn-label">Age :</label>
                            <input type="number" name="age" class="form-control" placeholder="Student Age" value="<?php if(isset($age)) echo $age; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="roll" class="forn-label">Roll :</label>
                            <input type="number" name="roll" class="form-control" placeholder="Student Roll" value="<?php if(isset($roll)) echo $roll; ?>">
                        </div>
                        <button type="submit" name="updateBtn" class="btn btn-success" >Update</button>
                      
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
<?php 
include("includes/footer.php");
?>   


