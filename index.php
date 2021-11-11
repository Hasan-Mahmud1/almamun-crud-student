<?php 
session_start();
include("db.php");
include("includes/navbar.php");

$sql = "SELECT * FROM student ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

?>
    <main class="">
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
                    <a href="create.php" class="btn btn-success btn-sm fw-bold shadow">Add Data</a>
                    <table class="table">
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
                                <a href="view.php?view=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm shadow">View</a>
                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm shadow">Edit</a>
                                <a href="delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm shadow" onclick="return confirm('Are You Sure ?')">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        }else{
                            echo "No Data Found";
                        }
                        ?>
                    </table>
                   
                </div>
            </div>
        </div>
    </main>
<?php 
include("includes/footer.php");
?>   


