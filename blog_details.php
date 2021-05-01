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
                            <h2>Blog Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->



        <!--Blog section start-->
        <div style="background-color:#F2F3F4;" class="blog-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                
                <div class="row">
                <?php $sel="SELECT * FROM `blogs` WHERE id='".$_GET['id']."'";
                 $q=mysqli_query($conn,$sel);
                 $row=mysqli_fetch_assoc($q);
                $path="assets/images/blog/".$row['image'];
                ?>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <!-- Single Blog Start -->
                            <div class="blog post-full-item mb-30 col-lg-12">
                                <div class="blog-inner heading-color">
                                    <div class="blog-image">
                                        <a href="blog-details.html" class="image"><img src="<?php echo $path;?>" alt="" height="500px"></a>
                                        <ul class="meta theme-color">
                                            <li><i class="fa fa-clock-o"></i><a href="#"><?php echo $row['createdat'];?></a></li>
                                            <li><i class="fa fa-comments"></i>0</li>
                                        </ul>
                                    </div>
                                    <div class="content blog-grid-content">
                                        <h3 class="title"><a href="blog-details.html"><?php echo $row['title'];?></a></h3>
                                        <blockquote>
                                            <p><?php echo $row['msg'];?></p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog End -->
                            <div class="col-12 mt-35 mt-sm-15 mt-xs-5">
                                <!-- Start Comment -->
                                <div class="comments-wrapper ">
                                    <div class="inner">
                                        <h3>4 Comments</h3>
                                        <div class="commnent-list-wrap">

                                            <!-- Start Single Comment -->
                                            <div class="comment">
                                                <div class="thumb">
                                                    <img src="assets/images/icons/author.jpg" alt="Multipurpose">
                                                </div>
                                                <div class="content">
                                                    <div class="info">
                                                        <h6 class="mb-0">Fatema Asrafi</h6>
                                                    </div>
                                                    <div class="comment-footer mt-5">
                                                        <span>May 17, 2018 at 1:59 am</span>
                                                        <span class="reply-btn"><a href="#">Reply</a></span>
                                                    </div>
                                                    <div class="text mt-5 pr-50 pr-sm-5 pr-xs-5">
                                                        <p class="bk_pra">To link your Facebook and Twitter accounts,
                                                            open the Instagram app on your phone or tablet, and select
                                                            the Profile tab in the bottom-right corner of the screen.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Comment -->

                                            <!-- Start Single Comment -->
                                            <div class="comment comment-reply">
                                                <div class="thumb">
                                                    <img src="assets/images/icons/author2.jpg" alt="Multipurpose">
                                                </div>
                                                <div class="content">
                                                    <div class="info">
                                                        <h6 class="mb-0">SCOTT JAMES</h6>
                                                    </div>
                                                    <div class="comment-footer mt-5">
                                                        <span>May 17, 2018 at 1:59 am</span>
                                                        <span class="reply-btn"><a href="#">Reply</a></span>
                                                    </div>
                                                    <div class="text mt-5 pr-50 pr-sm-5 pr-xs-5">
                                                        <p class="bk_pra">To link your Facebook and Twitter accounts,
                                                            open the Instagram app on your phone or tablet, and select
                                                            the Profile tab in the bottom-right corner of the screen.</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Single Comment -->
                                            <!-- Start Single Comment -->
                                            <div class="comment comment-reply">
                                                <div class="thumb">
                                                    <img src="assets/images/icons/author.jpg" alt="Multipurpose">
                                                </div>
                                                <div class="content">
                                                    <div class="info">
                                                        <h6 class="mb-0">SCOTT JAMES</h6>
                                                    </div>
                                                    <div class="comment-footer mt-5">
                                                        <span>May 17, 2018 at 1:59 am</span>
                                                        <span class="reply-btn"><a href="#">Reply</a></span>
                                                    </div>
                                                    <div class="text mt-5 pr-50 pr-sm-5 pr-xs-5">
                                                        <p class="bk_pra">To link your Facebook and Twitter accounts,
                                                            open the Instagram app on your phone or tablet, and select
                                                            the Profile tab in the bottom-right corner of the screen.</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Single Comment -->

                                            <!-- Start Single Comment -->
                                            <div class="comment">
                                                <div class="thumb">
                                                    <img src="assets/images/icons/author.jpg" alt="Multipurpose">
                                                </div>
                                                <div class="content">
                                                    <div class="info">
                                                        <h6 class="mb-0">SCOTT JAMES</h6>
                                                    </div>
                                                    <div class="comment-footer mt-5">
                                                        <span>May 17, 2018 at 1:59 am</span>
                                                        <span class="reply-btn"><a href="#">Reply</a></span>
                                                    </div>
                                                    <div class="text mt-5 pr-50 pr-sm-5 pr-xs-5">
                                                        <p class="bk_pra">To link your Facebook and Twitter accounts,
                                                            open the Instagram app on your phone or tablet, and select
                                                            the Profile tab in the bottom-right corner of the screen.</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Single Comment -->

                                        </div>
                                    </div>
                                </div>
                                <!-- End Comment -->
                            </div>

                            <div class="col-12 mt-60 mt-sm-40 mt-xs-30">
                                <div class="comments-wrapper">

                                    <h3>Leave Your Comment</h3>

                                    <div class="comments-form">
                                        <form action="#">
                                            <div class="row row-10">
                                                <div class="col-md-6 col-12 mb-20"><input type="text" placeholder="Your Name"></div>
                                                <div class="col-md-6 col-12 mb-20"><input type="email" placeholder="Your Email"></div>
                                                <div class="col-12 mb-20"><textarea placeholder="Your Message"></textarea></div>
                                                <div class="col-12"><button class="btn">Send Message</button></div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-sm-40 mt-xs-40">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Recent Posts</h3>
                            
                            <div class="sidebar-blog">
                            <?php $sel="SELECT * FROM `blogs` ORDER BY `blogs`.`id` DESC";
                                 $q=mysqli_query($conn,$sel);
                                while($rw=mysqli_fetch_array($q)){
                                $path="assets/images/blog/".$rw['image'];
                                    ?>
                                <a href="blog_details.php?id=<?php echo $rw['id'];?>" class="image"><img src="<?php echo $path;?>" alt="" height="60px"></a>
                                <div class="content" style="height:70px;">
                                    <h5><a href="blog_details.php?id=<?php echo $rw['id'];?>"><?php echo $rw['title'];?></a></h5>
                                    <span><?php echo $rw['createdat'];?></span>
                                </div>
                                <?php } ?>
                            </div>
                                    <?php if($row['user_id']===$_SESSION['userId']){?>
                                <div class="edit_del_blog">
                                    <button class="btn" data-toggle="modal" data-target="#editBlogModal">EDIT BLOG</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBlogModal">DELETE BLOG</button>
                                </div>
                                <?php } ?>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <!--Blog section end-->


        <!-- EDIT BLOG MODAL starts-->

        <?php
        $edit="SELECT * FROM `blogs` WHERE id='".$_GET['id']."'";
        $fetch=mysqli_fetch_assoc(mysqli_query($conn,$edit));
        $path="assets/images/blog/".$fetch['image'];
        if(isset($_POST['editBlog_btn'])){
            $editblogImg=$_FILES['editblogImg']['name'];
            $editblogTitle=$_POST['editblogTitle'];
            $editblogMsg=$_POST['editblogMsg'];
            $updateEdit="UPDATE `blogs` SET `title`='".$editblogTitle."',`image`='".$editblogImg."',`msg`='".$editblogMsg."' WHERE id='".$_GET['id']."'";
            if(mysqli_query($conn,$updateEdit)){
                if(move_uploaded_file($_FILES["editblogImg"]["tmp_name"],"assets/images/blog/".$editblogImg));

                echo "<script>alert('Blog edited successfully!!');window.loaction='blog_details.php';</script>";

            }else{
                echo "<script>alert('Can't edit Blog!!Please Retry...');window.loaction='bog_details.php';</script>";

            }
        }
        ?>

<!-- Modal -->
<div class="modal fade" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Your Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Image:</label>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="editblogImg" name="editblogImg" value="<?php echo $path;?>">
                        <label class="custom-file-label" for="editblogImg">Choose file</label>
                    </div>
                </div>
            </div>

        <div class="col-md-6">
            <a href="<?php echo $path;?>"><img src="assets/images/profilePicture/editPic.png" alt="" height="60px" >Click Here to see Image</a>
        </div>
        </div>
        <div class="form-group">
            <label for="editblogTitle" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="editblogTitle" name="editblogTitle" value="<?php echo $fetch['title'];?>">
        </div>
        <div class="form-group">
            <label for="editblogMsg" class="col-form-label">Message:</label>
            <textarea class="form-control" id="editblogMsg" name="editblogMsg" rows="10"><?php echo $fetch['msg'];?></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="editBlog_btn">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!-- EDIT BLOG MODAL ends-->

        <!-- Delete Blog Modal starts-->

<!-- Modal -->
<div class="modal fade" id="deleteBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Your Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure, you want to delete this blog?

        <?php
        
        if(isset($_POST['delBlog_btn'])){
            $del="DELETE FROM `blogs` WHERE id='".$_GET['id']."'";
            if(mysqli_query($conn,$del)){
                echo "<script>alert('Your Blog is deleted successfully!!');window.location='blog.php';</script>";
            }
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="" method="post">
        <button type="submit" class="btn btn-primary" name="delBlog_btn">Delete Blog</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <!-- Delete Blog Modal ends-->




        <?php
include('assets/footer.php');?>

<?php
}else{
    header("location:index.php?msg=not_allowed");
} ?>