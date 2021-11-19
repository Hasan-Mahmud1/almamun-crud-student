<?php 
$title = "Home";
session_start();
session_regenerate_id(true);

include("db.php");
include("includes/navbar.php");

//permision
if(!isset($_SESSION['user_id'])){
    header("Location:auth/login.php");
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$limit = 3;
$start = ($page - 1) * $limit;
$sql = "SELECT * FROM student ORDER BY id DESC LIMIT $start,$limit";
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
                <div class="d-flex justify-content-between">
                    <a href="create.php" class="btn btn-success btn-sm fw-bold shadow">Add Data</a>
                    <form class="d-flex">
                        <input class="form-control me-2" id="myinput" type="search" placeholder="Search"
                            aria-label="Search">
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
                            <a href="view.php?view=<?php echo $row['id']; ?>" class="btn btn-sm shadow"><i
                                    class="fa-regular fa-eye"></i></a>
                            <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm shadow"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm shadow"
                                onclick="return confirm('Are You Sure ?')"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php 
                            }
                        }else{
                            echo "No Data Found";
                        }
                        ?>
                </table>
                <?php 
                $sql2 = "SELECT * FROM student";
                $result2 = mysqli_query($conn,$sql2);
                if($rows = mysqli_num_rows($result2)>0){
                    
                   $total_record = mysqli_num_rows($result2);
                   $total_page = ceil($total_record / $limit);  

                ?>
	<div>Showing <?php echo $page;?> of <?php echo $total_page;?></div>	
                <!-- paginasion -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <?php if($page>1){ ?>
                            <a class="page-link" href="index.php?page=<?php echo $page-1;?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            <?php }?>
                        </li>
                        <?php 
                         for($i = 1; $i<= $total_page; $i++){ 
                             $class = "";
                             if($i == $page){
                                $class = "active";
                             }
                             
                             ?>

                        <li class="page-item <?php echo $class;?>" aria-current="page"><a class="page-link" href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>

                        <?php }?>
                        <li class="page-item">
                            <?php if($i>$page){ ?>

                            <a class="page-link" href="index.php?page=<?php echo $page+1;?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>

                            <?php } ?>
                        </li>
                    </ul>
                </nav>
                <?php }?>
                <!-- <i class="myicon"></i> -->
            </div>
        </div>
    </div>
</main>
<?php 
include("includes/footer.php");
?>