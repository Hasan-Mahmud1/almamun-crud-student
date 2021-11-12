<?php 
include("db.php");
include("includes/navbar.php");
session_start();

if(!isset($_SESSION['login'])){
    header("Location:auth/login.php");
}

$sql = "SELECT * FROM student ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

?>
    <main class="">
        <a href="./auth/logout.php" class="btn btn-sm btn-danger">logout</a>
    
        <div class="container">
            <div class="card mt-2">
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


                <div class="card-body">
   
                    <div class="card-title text-muted fw-bold fs-2">Student Data Table</div>
                    <div class="d-flex justify-content-between">
                        <a href="create.php" class="btn btn-success btn-sm fw-bold shadow">Add Data</a>
                        <form class="d-flex">
                            <input class="form-control me-2" id="myinput" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <table class="table" id="mytable">
                        <tr>
                            <th>S.L</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Roll</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                            $i=1;
                            if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['roll']; ?></td>                         
                            <td>
                                <a href="view.php?view=<?php echo $row['id']; ?>" class="btn btn-sm shadow"><i class="fa-regular fa-eye"></i></a>
                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm shadow"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm shadow" onclick="return confirm('Are You Sure ?')"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php 
                            }
                        }else{
                            echo "No Data Found";
                        }
                        ?>
                    </table>
                    <!-- <i class="myicon"></i> -->
                </div>
            </div>
        </div>
        
    </main>
<?php 
include("includes/footer.php");
?>   


