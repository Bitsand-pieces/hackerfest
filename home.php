<?php
include('assets/dbConfig.php');
if ($_SESSION['is_logged_in'] == true) {
    include('assets/header.php');
    include('assets/navbar.php');
    require('functions.php');
    require('image_path.php');

    if (isset($_GET['type']) && $_GET['type'] != '') {
        $type = get_safe_value($conn, $_GET['type']);

        if ($type == 'delete') {
            $id = get_safe_value($conn, $_GET['id']);
            $delete_sql = "DELETE FROM posts WHERE id='$id'";
            mysqli_query($conn, $delete_sql);
        }
    }

    $sql = "SELECT * FROM posts WHERE id=id ORDER BY id desc";
    $res = mysqli_query($conn, $sql);

?>
<div class="home" style="background-color:#F2F3F4">

        

<div class="container" >
    <div class="row pt-60 pb-60">
    <?php
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <div class="col-md-4 ">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" height="250px" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['food_name'] ?></h5>
                    <div class="card-text">
                        <?php echo $row['short_description'] ?>
                        <p><a href="post__details.php?id=<?php echo $row['id'] ?>">more details..</a></p>
                    </div>
                    <div><b>Name:</b> <?php echo $row['name'] ?></div>
                    <div><b>Email :</b> <?php echo $row['email']  ?></div>
                    <div><b>Mobile no :</b> <?php echo $row['number'] ?></div>
                    <div><b>Address :</b> <?php echo $row['address'] ?>,
                    <?php echo $row['city'] ?><br><?php echo $row['state'] ?>, <?php echo $row['zip'] ?>
                    </div>
                    <?php echo "<a href='?type=delete&id=" . $row['id'] . "' class='btn btn-primary'>Delete</a>&nbsp;&nbsp;";
                        echo "<a href='post.php?id=" . $row['id'] . "' class='btn btn-secondary'>Edit</a>";
                        ?>                
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

</div>


    
   



<?php
    include('assets/footer.php'); ?>

<?php
} else {
    header("location:index.php?msg=not_allowed");
} ?>