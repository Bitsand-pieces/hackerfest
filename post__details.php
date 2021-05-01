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


<!-- Breadcrumb Section Start -->
<div class="breadcrumb-section section bg-black pt-75 pb-75 pt-sm-55 pb-sm-55 pt-xs-45 pb-xs-45">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="breadcrumb-title">
                    <h2>Food Details</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!--Product section start-->
<?php
    while ($row = mysqli_fetch_assoc($res)) {
        if ($_GET['id'] == $row['id']) {


    ?>
<div
    class="product-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-50 pb-lg-30 pb-md-20 pb-sm-10 pb-xs-0">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">

                    <div class="product-details col-12 mb-50 mb-sm-40 mb-xs-30">
                        <div class="product-inner row">
                            <div class="col-md-6 col-12 mb-xs-30">
                                <div class="product-image-slider">
                                    <div class="item"><a href="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>"
                                            class="gallery-popup"><i class="pe-7s-search"></i><img
                                                src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt=""></a>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="content">
                                    <h3 class="title"><?php echo $row['food_name'] ?></h4>
                                    </h3>


                                    <div class="product-meta">
                                        <span class="posted-in">Name : <?php echo $row['name'] ?></span>
                                        <span class="tagged-as">Email : <?php echo $row['email']  ?></span>
                                        <span class="tagged-as">Mobile no : <?php echo $row['number'] ?></span>
                                        <span class="tagged-as">Address : <?php echo $row['address'] ?>,
                                            <?php echo $row['city'] ?><br><?php echo $row['state'] ?>,
                                            <?php echo $row['zip'] ?></span>
                                    </div>



                                    <ul class="product-details-tab-list nav">
                                        <li><a class="active show" href="#product-description"
                                                data-toggle="tab">Complete-Description</a></li>
                                        <li><a href="#product-review" data-toggle="tab">Short-Description</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="product-description" class="tab-pane active show">
                                            <div class="product-description">
                                                <?php echo $row['description'] ?>
                                            </div>
                                        </div>
                                        <div id="product-review" class="tab-pane">
                                            <div class="product-review">

                                                <div class="review-form">
                                                    <?php echo $row['short_description'] ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <br><br>
                                    <hr>
                                    <?php echo "<a href='?type=delete&id=" . $row['id'] . "' class='btn btn-primary'>Delete</a>&nbsp;&nbsp;";
                                                echo "<a href='post.php?id=" . $row['id'] . "' class='btn btn-secondary'>Edit</a>";
                                                ?>

                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>
<?php }
    } ?>
<!--Product section end-->

<?php
    include('assets/footer.php'); ?>

<?php
} else {
    header("location:index.php?msg=not_allowed");
} ?>