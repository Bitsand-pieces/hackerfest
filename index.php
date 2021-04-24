<?php
include_once('assets/dbConfig.php');

if(isset($_POST['register_btn'])){
  $name=$_POST['userName'];
  $email=$_POST['email'];
  $contact=$_POST['phn'];
  $pswd=$_POST['pswd'];
  $cPswd=$_POST['cPswd'];

  $sel="SELECT * FROM `userregistration` WHERE email='".$email."' or 	phn='".$contact."'";
  $query=mysqli_query($conn,$sel);
  if(mysqli_num_rows($query)>0){
      echo "<script>alert('User Already Exist!!');
      window.location='index.php';</script>";
  }else{
    if($cPswd!==$pswd){
      
      echo "<script>alert('Password and Confirm Password does not match!!')</script>";

    }else{
      $in="INSERT INTO `userregistration`(`userName`, `email`, `phn`, `pswd`) VALUES ('".$name."','".$email."','".$contact."','".$pswd."')";
      $no=mysqli_query($conn,$in);
      if($no>0)
      echo "<script>alert('User Registered Successfully!!')</script>";
    }
  }
}
?>

<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.hasthemes.com/murphy-preview/murphy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 13:28:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Murphy || Home Maintenance, Repair Service HTML Template.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="assets/images/favicon.ico" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/iconfont.min.css">
    <link rel="stylesheet" href="assets/css/vendor/helper.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body style="background-color:#ffc107;">
<div id="main-wrapper">


<!-- Registration modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register Yourself</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">

        <div class="container">
          
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="userName">User Name</label>
            <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Your Name" required>
          </div>

          <div class="form-group col-md-12">
            <label for="email">Email Id</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
          </div>

          <div class="form-group col-md-12">
            <label for="phn">Phone</label>
            <input type="tel" class="form-control" id="phn" name="phn" maxlength="10" placeholder="Enter Your Phone Number" required>
          </div>

          <div class="form-group col-md-12">
            <label for="pswd">Password</label>
            <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Enter Your Password" required>
          </div>

          <div class="form-group col-md-12">
            <label for="cPswd">Confirm Password</label>
            <input type="password" class="form-control" id="cPswd" name="cPswd" placeholder="Confirm Your Password" required>
          </div>
        </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="register_btn" id="register_btn">Register</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- ./registration modal -->

<div class="container">
  <div class="row">
    <div class="col-md-8" >
      
      <img src="assets\images\bits&piecesLogo.svg" alt="" height="700px" width="600px">
      
    </div>


    <div class="col-md-4 " style="height:100vh;" >

    <div class="login-box" style="margin-top:46%;
 
  " >
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-center">Sign in to start your session</p>

      <?php
      if(!empty($_GET['msg'])){
          if($_GET['msg']=='not_allowed'){
              echo "<script>alert('please login first')</script>";
              
          }
          if($_GET['msg']=='logout'){
              echo "<script>alert('you have been logged out successfully')</script>";
             
          }
      }
      if(isset($_POST['login_btn'])){
        $CEmail=$_POST['Cemail'];
        $Cpswd=$_POST['Cpswd'];
        $s="SELECT * FROM `userregistration` WHERE email='$CEmail' AND pswd='$Cpswd'"  ;
        $rs=mysqli_query($conn,$s);
        $no=mysqli_num_rows($rs);
        $row=mysqli_fetch_assoc($rs);
        if($no>0){
          header("location:home.php");
          $_SESSION['is_logged_in']=true;
          $_SESSION['email']=$CEmail;
          $_SESSION['name']=$row['userName'];
          $_SESSION['contact']=$row['phn'];
          $_SESSION['userId']=$row['id'];
        }else{
          echo "<script>alert('Incorrect Credentials')</script>";
        }
      }
      
      ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="Cemail" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Cpswd" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login_btn">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="" class="text-center" data-toggle="modal" data-target="#exampleModalCenter">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

    </div>
  </div>
</div>


</div>

    <!-- All jquery file included here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8&amp;callback">
    </script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from demo.hasthemes.com/murphy-preview/murphy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 13:29:22 GMT -->
</html>


