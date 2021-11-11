<?php 
session_start();
include("db.php");
include("includes/navbar.php");

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
                    <div class="card-title text-muted fw-bold fs-2">Insert Student Data</div>
                    <a href="index.php" class="btn btn-success btn-sm fw-bold shadow">Show Data</a>
                    
                    <form action="store.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="forn-label">Name :</label>
                            <input type="text" name="name" class="form-control" placeholder="Student Name">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="forn-label">Age :</label>
                            <input type="number" name="age" class="form-control" placeholder="Student Age">
                        </div>
                        <div class="mb-3">
                            <label for="roll" class="forn-label">Roll :</label>
                            <input type="number" name="roll" class="form-control" placeholder="Student Roll">
                        </div>
                        <button type="submit" name="insertBtn" class="btn btn-success" >Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
<?php 
include("includes/footer.php");
?>   


