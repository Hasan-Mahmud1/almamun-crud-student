<footer class="py-2 bg-dark bg-gradien">
    <p class="container text-center text-white-50 m-0 fw-bold">
        &copy;2020-<?php echo date("Y");?>.Hasan Mahmud Khan.
    </p>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
if(isset($_SESSION['msg']) && $_SESSION['msg_code'] !=""){?>
<script>
swal({
    title: "<?php echo $_SESSION['msg'];  ?>",
    // text: "You clicked the button!",
    icon: "<?php echo $_SESSION['msg_code'];  ?>",
    button: "OK Done",
});
</script>
<?php unset($_SESSION['msg']); } ?>
<script src="./assets/js/main.js"></script>

</body>

</html>

<?php 
    unset($_SESSION['msg']);
    unset($_SESSION['msg_code']);
?>
<!-- // swal({
//         title: "Are you sure?",
//         text: "Once deleted, you will not be able to recover this imaginary file!",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//     })
//     .then((willDelete) => {
//         if (willDelete) {
//             swal("Poof! Your imaginary file has been deleted!", {
//                 icon: "success",
//             });
//         } else {
//             swal("Your imaginary file is safe!");
//         }
//     }); -->