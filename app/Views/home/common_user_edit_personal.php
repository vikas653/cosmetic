<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/theface/theface-v3/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:17:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account || Theface</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <?php include("common/header_lib.php"); ?>
    
</head>

<body>

    <div id="main-wrapper">

        <!--Header section start-->
    <?php include("common/header.php"); ?>
      
        <!--Header section end-->

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h1>My Account </h1>
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--My Account section start-->
        <div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    
                    <div class="col-12">

                        <div class="row">
                        <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <!-- My Account Tab Menu Start -->
                <?php include("sidebar.php"); ?>
</div> </div>
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                          
                                    <!-- Single Tab Content Start -->
                                  
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->
                            <div class="col-lg-9 col-12">

                                        <div class="myaccount-content">
                                            <h3>Wish List</h3>
    
                                            <hr/>
                                    <form action="<?php echo base_url(); ?>homedashboard/updateProfileAction" id="signupform" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name-login">Username</label>
                                                    <input id="name-login" name="full_name" type="text" required="true" value="<?php echo $user_profile["name"]; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email-login">Email</label>
                                                    <input id="email-login" name="email" type="email" required="true" readonly="true" value="<?php echo $user_profile["email"]; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gst-no">GST No</label>
                                                    <input id="gst-no" name="gst_no" type="text" placeholder="GST No" required="true" value="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="profession">Profession</label>
                                                    <input id="profession" name="profession" type="text" placeholder="Profession" value="<?php echo $user_profile["profession"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <input id="designation" name="designation" type="text" placeholder="Designation" value="<?php echo $user_profile["designation"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role_organisation">Role in orgranisation</label>
                                                    <input id="role_organisation" name="role_organisation" type="text" placeholder="Role in organisation" value="<?php echo $user_profile["role_organisation"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br clear="all"/>
                                        <div class="box-header mt-0">
                                            <p><b>Change Password</b></p>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password">Password <span class="mandatory">*</span></label>
                                                    <input id="password" name="password" type="password" placeholder="Enter Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password_confirm">Confirm Password <span class="mandatory">*</span></label>
                                                    <input id="password_confirm" name="password_confirm" type="password" placeholder="Enter Confirm Password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div>                                      
                                            <button type="submit" class="btn btn-template-outlined">Update</button>
                                        </div>
                                    </form>  
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- My Account Tab Content End -->
                        </div>
    
                    </div>
                    
                </div> 
            </div>           
        </div>
        <!--My Account section end-->

        <!--Brand section start-->
        <div
            class="brand-section section border-top pt-90 pt-lg-70 pt-md-65 pt-sm-55 pt-xs-40 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">

                    <!--Brand Slider start-->
                    <div class="brand-slider p-0 tf-element-carousel section" data-slick-options='{
                        "slidesToShow": 5,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "autoplay": true
                        }'  data-slick-responsive='[
                        {"breakpoint":1199, "settings": {
                        "slidesToShow": 4
                        }},
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 4
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint":576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                        <div class="brand col"><a href="#"><img src="assets/images/brands/brand-1.png" alt=""></a></div>
                        <div class="brand col"><a href="#"><img src="assets/images/brands/brand-2.png" alt=""></a></div>
                        <div class="brand col"><a href="#"><img src="assets/images/brands/brand-3.png" alt=""></a></div>
                        <div class="brand col"><a href="#"><img src="assets/images/brands/brand-4.png" alt=""></a></div>
                        <div class="brand col"><a href="#"><img src="assets/images/brands/brand-5.png" alt=""></a></div>
                    </div>
                    <!--Brand Slider end-->

                </div>
            </div>
        </div>
        <!--Brand section end-->

        <!--Footer section start-->
    <?php include("common/footer.php"); ?>
      
        <!--Footer section end-->

        <!-- Modal Area Strat -->
    <?php include("common/off_section.php"); ?>
       
        <!-- Modal Area End -->

    </div>

    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include("common/footer_lib.php"); ?>

    <!-- All jquery file included here -->
  
</body>


<!-- Mirrored from htmldemo.net/theface/theface-v3/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:17:53 GMT -->
</html>