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
<div class="row" style="justify-content:center;align-items: center; ">

    <?php
        while ($row = mysqli_fetch_assoc($res)) {
            if ($_GET['id'] == $row['id']) {


        ?>
    <div class="column" style="width: 90%;">
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" class="img-fluid"
                    style="height: 200px;object-fit: contain;" />

            </div>
            <div class="card-body">

                <h4 class="card-title" style="color:green;font-weight:bold; font-size:20px">
                    <?php echo $row['food_name'] ?></h4>
                <br><br>
                <div class="card-text">
                    <div style="font-size:19px;color:red;"><u>Short Details</u></div><br>
                    <?php echo $row['short_description'] ?>
                </div><br><br>
                <div class="card-text">
                    <div style="font-size:19px;color:red;"><u>Complete Food Details</u></div><br>
                    <?php echo $row['description'] ?>
                </div>
                <h4><b style="color: red;">Name :</b> <?php echo $row['name'] ?></h4>
                <p><b style="color: red;">Email :</b> <?php echo $row['email']  ?></p>
                <p><b style="color: red;">Mobile no :</b> <?php echo $row['number'] ?></p>
                <p><b style="color: red;">Address :</b> <?php echo $row['address'] ?>,
                    <?php echo $row['city'] ?><br><?php echo $row['state'] ?>, <?php echo $row['zip'] ?>
                </p>

                <?php echo "<a href='?type=delete&id=" . $row['id'] . "' class='btn btn-primary'>Delete</a>&nbsp;&nbsp;";
                            echo "<a href='post.php?id=" . $row['id'] . "' class='btn btn-secondary'>Edit</a>";
                            ?>

            </div>
        </div>
    </div>
    <?php }
        } ?>
</div>





<?php
    include('assets/footer.php'); ?>

<?php
} else {
    header("location:index.php?msg=not_allowed");
} ?>