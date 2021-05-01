<?php
include('assets/dbConfig.php');
if($_SESSION['is_logged_in']==true){
    include('assets/header.php');
    include('assets/navbar.php');

    if(isset($_POST['uploadblog_btn'])){
      $userID=$_SESSION['userId'];
      $blogImg=$_FILES['blogImg']['name'];
      $blogTitle=$_POST['blogTitle'];
      $blogMsg=$_POST['blogMsg'];

    $in=  "INSERT INTO `blogs`(`user_id`, `title`, `image`, `msg`) VALUES ('".$userID."','".$blogTitle."','".$blogImg."','".$blogMsg."')";
    $query=mysqli_query($conn,$in);
    if($query){
      if(move_uploaded_file($_FILES["blogImg"]["tmp_name"],"assets/images/blog/".$blogImg));

      echo "<script>alert('blog Uploaded successfully!!'); window.location='blog.php';</script>";
  }else{
      echo "<script>alert('can't upload blog!!retry...');window.location='blog.php';</script>";
  }
    }


?>

   
   
   <!-- Breadcrumb Section Start -->
        <div class="breadcrumb-section section bg-black pt-75 pb-75 pt-sm-55 pb-sm-55 pt-xs-45 pb-xs-45">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="breadcrumb-title">
                            <h2>Blogs</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->


<!-- Blog Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write Your Blog Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">

      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="blogImg" name="blogImg">
    <label class="custom-file-label" for="blogImg">Choose file</label>
  </div>
</div>



          </div>
          <div class="form-group">
            <label for="blogTitle" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="blogTitle" name="blogTitle">
          </div>
          <div class="form-group">
            <label for="blogMsg" class="col-form-label">Message:</label>
            <textarea class="form-control" id="blogMsg" name="blogMsg" rows="10"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="uploadblog_btn">UPLOAD BLOG</button>
      </div>
      </form>

    </div>
  </div>
</div>





        <!--Blog section start-->
        <div style="background-color:#F2F3F4;" class="blog-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-45 pb-lg-25 pb-md-15 pb-sm-5 pb-xs-15">
            <div class="container">
            <a href="" data-toggle="modal" data-target="#exampleModal"><h2 class="pb-3"><i class="fa fa-plus"></i> Post Blogs </h2></a>

            
                <div class="row">
                <?php $sel="SELECT * FROM `blogs` ORDER BY `blogs`.`id` DESC";
            $q=mysqli_query($conn,$sel);
            

            while($row=mysqli_fetch_array($q)){
              $path="assets/images/blog/".$row['image'];
              ?>

                    <!-- Single Blog Start -->
                    <div class="blog mb-30 mb-xs-10 col-lg-3 col-md-6 col-sm-6">
                        <div class="blog-inner heading-color">
                            <div class="blog-image">
                                <a href="blog_details.php?id=<?php echo $row['id'];?>" class="image"><img src="<?php echo $path;?>" alt="" height="250px"></a>
                                <ul class="meta theme-color">
                                    <li><i class="fa fa-clock-o"></i><a href="#"><?php echo $row['createdat'];?></a></li>
                                </ul>
                            </div>
                            <div class="content">
                                <h3 class="title"><a href="blog_details.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <?php } ?>
                </div>
             
            </div>
        </div>
        <!--Blog section end-->

        <?php
include('assets/footer.php');?>

<?php
}else{
    header("location:index.php?msg=not_allowed");
} ?>