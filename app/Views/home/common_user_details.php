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
                            <h1>My Account</h1>
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
                            <!-- My Account Tab Menu Start -->
                            <div class="col-lg-3 col-12">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                <?php include("sidebar.php"); ?>

                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-12">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
    
                                            <h5>Personal Information</h5>                                   
                                    <table class="table">
                                        <tr>
                                            <td>Full Name: <?php echo $user_profile["name"]; ?></td>
                                            <td>Phone: <?php echo $user_profile["phone"]; ?></td>
                                        </tr>  
                                        <tr>
                                            <td>Password: <a href="#" style="color:blue;">Change Password</a></td>
                                            <td>Email: <?php echo $user_profile["email"]; ?></td>
                                        </tr>  
                                    </table>

                                    <?php
                                    if (isset($shipping_address["id"])) {
                                        ?>
                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-6">
                                                     <h5>Shipping Address</h5>
                                                    <table class="table">
                                                        <tr>
                                                            <td style="vertical-align:top !important;text-transform:capitalize" >
                                                        
                                                                <p><?php echo $shipping_address["address"]; ?></p>
                                                                <p><?php echo $shipping_address["district"]; ?></p>
                                                                <p><?php echo $shipping_address["state"] . " (" . $shipping_address["pincode"] . ")"; ?></p>
                                                                <p>India</p>
                                                                <p>Edit: <a href="<?php echo base_url("homedashboard/usereditprofile"); ?>" style="color:blue;">Change Details</a></p>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>  
                                                 <div class="col-md-6">
                                                      <h5>Billing Address</h5>
                                                    <table class="table">
                                                        <tr>
                                                            <td style="vertical-align:top !important;text-transform:capitalize" >
                                                                <p><?php echo $shipping_address["billing_address"]; ?></p>
                                                            
                                                                <p><?php echo $shipping_address["billing_district"]; ?></p>
                                                                <p><?php echo $shipping_address["billing_state"] . " (" . $shipping_address["billing_pincode"] . ")"; ?></p>
                                                                <p>India</p>
                                                                
                                                            </td>

                                                        </tr>

                                                    </table>
                                                </div>  
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo base_url("homedashboard/usereditprofile") ?>">Add Shipping Address</a>
                                    <?php }
                                    ?>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                
                                    <!-- Single Tab Content End -->
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