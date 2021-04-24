<?php
include('assets/dbConfig.php');
if($_SESSION['is_logged_in']==true){
    include('assets/header.php');
    include('assets/navbar.php');


?>




        <?php
include('assets/footer.php');?>

<?php
}else{
    header("location:index.php?msg=not_allowed");
} ?>