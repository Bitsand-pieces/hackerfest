<?php
include('assets/dbConfig.php');
if($_SESSION['is_logged_in']==true){
    include('assets/header.php');
    include('assets/navbar.php');


?>

  <!-- Breadcrumb Section Start -->
  <div class="breadcrumb-section section bg-black pt-75 pb-75 pt-sm-55 pb-sm-55 pt-xs-45 pb-xs-45">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="breadcrumb-title">
                            <h2>Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->

        <div style="background-color:#F2F3F4 ; padding:10px 150px;" >
            <div class="row align-items-top">
                <div class="col-md-2 profile-picture" >
                   
                    <img style="margin-top:70px; border-radius:150%; height:200px; width:200px;" src="assets/images/author/author-1.jpg" alt="">
                    <p class="text-center"><a href="" ><span class="fa fa-edit"> </span> UPLOAD PROFILE PIC</a> </p>
                    <p  class="text-center"><a href="" ><span class="fa fa-edit"> </span> EDIT PROFILE </a> </p>
                    <p  class="text-center"><a href="" ><span class="fa fa-edit"> </span> CHANGE PASSWORD </a> </p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-8 user-detail">
                <div class="row">
                <div class="col-md-12">
                    <h3 style="text-align:center; padding:5px; margin-top:50px;"> Basic Details</h3>
                    <table class="table table-hover table-borderless" style=" background-color:white; border-radius:5px;">
                        <tbody>
                            <tr>
                                <th scope="row">Name:</th>
                                <td><?php echo $_SESSION['name'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td><?php echo $_SESSION['email'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Contact:</th>
                                <td><?php echo $_SESSION['contact'];?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <?php 
                

                $select="SELECT * FROM `userdetails` WHERE userId='".$_SESSION['userId']."'";
                $query=mysqli_query($conn,$select);
                $no=mysqli_num_rows($query);
                $rw=mysqli_fetch_assoc($query);
                if($no>0){
                ?>
                <div class="col-md-12">
                <h3 style="text-align:center; padding:5px; margin-top:50px;">More Details</h3>
                <table class="table table-hover table-borderless" style=" background-color:white; border-radius:5px;">
                        <tbody>
                            <tr>
                                <th scope="row">Alternate Phone No.:</th>
                                <td><?php echo $rw['alt_phn_no'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">PIN Code:</th>
                                <td><?php echo $rw['pincode'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">City:</th>
                                <td><?php echo $rw['city'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">State:</th>
                                <td><?php echo $rw['state'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">House No.,Building Name:</th>
                                <td><?php echo $rw['address'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Road name,Area,Colony:</th>
                                <td><?php echo $rw['area'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nearby Famous Shop/Mall/Landmark:</th>
                                <td><?php echo $rw['landMark'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php }else{
                    if(isset($_POST['uploadDetail_btn'])){
                        $alt_phn_no=$_POST['alt_phn_no'];
                        $pinCode=$_POST['pinCode'];
                        $city=$_POST['city'];
                        $state=$_POST['state'];
                        $address=$_POST['address'];
                        $area=$_POST['area'];
                        $landMark=$_POST['landMark'];

                        $in="INSERT INTO `userdetails`(`alt_phn_no`, `pincode`, `city`, `state`, `address`, `area`, `landMark`) VALUES ('".$alt_phn_no."','".$pinCode."','".$city."','".$state."','".$address."','".$area."','".$landMark."')";
                        if($qu=mysqli_query($conn,$in)){
                            echo "<script>alert('Profile Updated Successfully'); window.location='profile.php';</script>";
                        }

                    } ?>
                    <div class="col-md-12">
                <h3 style="text-align:center; padding:5px; margin-top:50px;">Complete Your Profile</h3>
                <form action="" method="post">
                <div class="row form-group">
                    <div class="col-sm-6">
                    <label for="alt_phn_no">Alternate Phone Number (optional)</label>
                    <input type="tel" class="form-control" name="alt_phn_no" id="alt_phn_no" maxlength="10" >
                    </div>
                    <div class="col-sm-6">
                    <label for="pinCode">PIN Code</label>
                    <input type="number" class="form-control" name="pinCode" id="pinCode" required>
                    </div>
                    <div class="col-sm-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" required>
                    </div>
                    <div class="col-sm-6">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" required>
                    </div>
                    <div class="col-sm-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                    <div class="col-sm-12">
                    <label for="area">Road name,Area,Colony</label>
                    <input type="text" class="form-control" name="area" id="area" required>
                    </div>
                    <div class="col-sm-12">
                    <label for="landMark">Nearby Famous Shop/Mall/Landmark</label>
                    <input type="text" class="form-control" name="landMark" id="landMark" required>
                    <input type="submit" style="border-radius:4px;" class="btn mt-20" name="uploadDetail_btn" value="Upload">
                    </div>
                </div>
                </form>
                </div>
                <?php } ?>
                </div>
                </div>   
            </div>
        </div>
  


<?php
include('assets/footer.php');?>

<?php
}else{
    header("location:index.php?msg=not_allowed");
} ?>