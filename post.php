<?php
include('assets/dbConfig.php');
if ($_SESSION['is_logged_in'] == true) {
    include('assets/header.php');
    include('assets/navbar.php');
    require('functions.php');
    require('image_path.php');


    $name = '';
    $state = '';
    $city = '';
    $zip = '';
    $number = '';
    $image = '';
    $description = '';
    $address = '';
    $email = '';
    $food_name = '';
    $short_description = '';


    $image_required = 'required';
    $msg = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {

        $image_required = '';

        $id = get_safe_value($conn, $_GET['id']);
        $res = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            $state = $row['state'];
            $city = $row['city'];
            $zip = $row['zip'];
            $number = $row['number'];
            $description = $row['description'];
            $address = $row['address'];
            $email = $row['email'];
            $food_name = $row['food_name'];
            $short_description = $row['short_description'];
        } else {
            header('location:home.php');
            die();
        }
    }


    if (isset($_POST['submit'])) {
        $name = get_safe_value($conn, $_POST['name']);
        $state = get_safe_value($conn, $_POST['state']);
        $city = get_safe_value($conn, $_POST['city']);
        $zip = get_safe_value($conn, $_POST['zip']);
        $number = get_safe_value($conn, $_POST['number']);
        $description = get_safe_value($conn, $_POST['description']);
        $address = get_safe_value($conn, $_POST['address']);
        $email = get_safe_value($conn, $_POST['email']);
        $food_name = get_safe_value($conn, $_POST['food_name']);
        $short_description = get_safe_value($conn, $_POST['short_description']);

        // $file = $_FILES['image'];


        // $filename = $file['name'];
        // $filepath = $file['tmp_name'];
        // $fileerror = $file['error'];


        $res = mysqli_query($conn, "SELECT * FROM posts WHERE name='$name'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $getData = mysqli_fetch_assoc($res);
                if ($id == $getData['id']) {
                } else {
                    $msg = "already exist";
                }
            } else {
                $msg = "already exist";
            }
        }

        // if ($_FILES['image']['type'] != '' && ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg')) {
        //     $msg = "Please select only png, jpg or jpeg formet of image !!";
        // }



        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                // if ($fileerror == 0) {
                //     $destfile = 'media/' . $filename;
                //     move_uploaded_file($filepath, $destfile);
                //     mysqli_query($con, "INSERT INTO posts(name,state,city,zip,number,description,email,address,food_name,image)
                //               VALUES('$name','$state','$city','$zip','$number','$description','$email','$address','$food_name','$image')");
                // } else {
                //     echo "no file has been selected!";
                // }



                if ($_FILES['image']['name'] != '') {

                    $image = rand(111111, 999999) . '_' . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
                    $update_sql = "UPDATE posts SET name='$name',state='$state',city='$city',zip='$zip',
            number='$number',description='$description',address='$address',email='$email',food_name='$food_name',short_description='$short_description',image='$image' WHERE id='$id'";
                } else {
                    $update_sql = "UPDATE posts SET name='$name',state='$state',city='$city',zip='$zip',
             number='$number',description='$description',address='$address',email='$email',food_name='$food_name',short_description='$short_description',image='$image' WHERE id='$id'";
                }
                mysqli_query($conn, $update_sql);
            } else {
                $image = rand(111111, 999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);

                mysqli_query($conn, "INSERT INTO posts(name,state,city,zip,number,short_description,description,email,address,food_name,image)
         VALUES('$name','$state','$city','$zip','$number','$short_description','$description','$email','$address','$food_name','$image')");
            }
            header('location:home.php');
            die();
        }
    }



?>

<div class="container">

    <form class="well form-horizontal" action=" " method="post" id="contact_form" enctype="multipart/form-data">
        <fieldset>

            <!-- Form Name -->
            <legend>Post </legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Your Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="name" placeholder="Enter Your Name" class="form-control" type="text"
                            value="<?php echo $name; ?>">
                    </div>
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control" type="text"
                            value="<?php echo $email; ?>">
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Mobile No. #</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="number" placeholder="(+91)6452555212" class="form-control" type="number"
                            value="<?php echo $number; ?>">
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="address" placeholder="Address" class="form-control" type="text"
                            value=<?php echo $address; ?>>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="city" placeholder="city" class="form-control" type="text"
                            value="<?php echo $city;  ?>">
                    </div>
                </div>
            </div>

            <!-- Select Basic -->

            <div class="form-group">
                <label class="col-md-4 control-label">State</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <input name="state" placeholder="State" class="form-control" type="text"
                            value="<?php echo $state; ?>">
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Zip Code</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="zip" placeholder="Zip Code" class="form-control" type="text"
                            value="<?php echo $zip; ?>">
                    </div>
                </div>
            </div>


            <hr>
            <hr>


            <div class="form-group">
                <label class="col-md-4 control-label">Upload Food Image</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
                        <input name="image" class="form-control" type="file" <?php echo $image_required; ?>>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Food Name Or Title</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-apple"></i></span>
                        <input name="food_name" placeholder="Food Name Or Title" class="form-control" type="text"
                            value="<?php echo $food_name; ?>">
                    </div>
                </div>
            </div>


            <!-- Text area -->

            <div class="form-group">
                <label class="col-md-4 control-label">Food Description (in Short)</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="short_description"
                            placeholder="Food Description(not more than 100 words)..."
                            maxlength="300"><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Text area -->

            <div class="form-group">
                <label class="col-md-4 control-label">Food Description</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="description"
                            placeholder="Food Description(not more than 300 words)..." maxlength="2000" rows="5"
                            cols="4"><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>


            <!-- Success message -->
            <div class="alert alert-success" role="alert" id="success_message">Success <i
                    class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you
                shortly.</div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" name="submit" class="btn btn-warning">Send <span
                            class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
</div><!-- /.container -->
<?php
    include('assets/footer.php'); ?>

<?php
} else {
    header("location:index.php?msg=not_allowed");
} ?>