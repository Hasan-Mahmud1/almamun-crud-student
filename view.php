<?php 
session_start();
include("includes/navbar.php");
include("db.php");

if(isset($_GET['view'])){

    $row['id'] = $_GET['view'];
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
               
                <div class="card-body">
                    <div class="card-title text-muted fw-bold fs-2">Student Data</div>
                    <a href="index.php" class="btn btn-success btn-sm fw-bold shadow">Show Data</a>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td><?php echo $id; ?></td>
                                </tr>
                                <tr>
                                    <th>NAME</th>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <th>AGE</th>
                                    <td><?php echo $age; ?></td>
                                </tr>
                                <tr>
                                    <th>ROLL</th>
                                    <td><?php echo $roll; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                        <img src="" alt="">
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </main>
<?php 
include("includes/footer.php");
?>   


