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
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>

            <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>



          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" rows="10"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">UPLOAD BLOG</button>
      </div>
    </div>
  </div>
</div>




        <!--Blog section start-->
        <div class="blog-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-45 pb-lg-25 pb-md-15 pb-sm-5 pb-xs-15">
            <div class="container">
            <a href="" data-toggle="modal" data-target="#exampleModal"><h2 class="pb-3"><i class="fa fa-plus"></i> Add Blogs </h2></a>


                <div class="row">

                    <!-- Single Blog Start -->
                    <div class="blog mb-30 mb-xs-10 col-lg-3 col-md-6 col-sm-6">
                        <div class="blog-inner heading-color">
                            <div class="blog-image">
                                <a href="blog-details.html" class="image"><img src="assets/images/blog/blog-8.jpg" alt=""></a>
                                <ul class="meta theme-color">
                                    <li><i class="fa fa-clock-o"></i><a href="#">April 17, 2015</a></li>
                                    <li><i class="fa fa-comments"></i>0</li>
                                </ul>
                            </div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">How to Install Plumbing in a New Home</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
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