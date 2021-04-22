<?php include_once('assets/header.php');
include_once('assets/navbar.php');
?>
<!-- Landing page starts  -->



        <!-- Breadcrumb Section Start -->
        <div class="breadcrumb-section section bg-black pt-75 pb-75 pt-sm-55 pb-sm-55 pt-xs-45 pb-xs-45">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="breadcrumb-title">
                            <h2>Contact</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->








        <!-- Contect Map Section Start -->
        <div class="contact-map-section section">
            <div id="contact-map" class="contact-map"></div>
        </div>
        <!-- Contect Map Section End -->

        <!--Contact Section Start-->
        <div class="contact-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="contact-form-wrap">
                            <h2 class="contact-title">Send Us A Message</h2>
                            <form id="contact-form" action="https://demo.hasthemes.com/murphy-preview/murphy/assets/php/mail.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-form-style mb-20">
                                            <label> Your Name (required)</label>
                                            <input name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form-style mb-20">
                                            <label>Your Email (required)</label>
                                            <input name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form-style mb-20">
                                            <label> Subject</label>
                                            <input name="subject" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form-style">
                                            <label> Your Message</label>
                                            <textarea name="message" placeholder="Type your message here.."></textarea>
                                            <button class="btn" type="submit"><span>Send message</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="emergncy-contact">
                            <h3>Call us today for some special offers!</h3>
                            <div class="single-emergncy-contact icon-black mb-30">
                                <div class="pentagon-icon contact-icon">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3>1-775-97-377</h3>
                                    <span>info@thememove.com</span>
                                </div>
                            </div>
                            <div class="single-emergncy-contact icon-black mb-30">
                                <div class="pentagon-icon contact-icon">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3>14 Tottenham Court Road</h3>
                                    <span>London, England.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact Section End-->



<?php
include_once('assets/footer.php');
?>
