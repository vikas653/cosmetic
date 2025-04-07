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
                         
                            <div class="col-lg-9 col-12">

                                        <div class="myaccount-content">
                                            <h3>Wish List</h3>
    
                                            <hr/>
                                            <form action="<?php echo base_url(); ?>homedashboard/updateShippingAddress" id="shippingForm" method="post">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="firstname">First Name <span class="mandatory">*</span></label>
                                                    <input id="first_name" type="text" name="first_name" required="true" value="<?php if (isset($checkout_user["first_name"])) echo $checkout_user["first_name"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name <span class="mandatory">*</span></label>
                                                    <input id="last_name" type="text" name="last_name" required="true" value="<?php if (isset($checkout_user["last_name"])) echo $checkout_user["last_name"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="company">Company</label>
                                                    <input id="company" type="text" name="company" value="<?php if (isset($checkout_user["company"])) echo $checkout_user["company"]; ?>" class="form-control">
                                                </div>
                                            </div>                                   
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone">Mobile No <span class="mandatory">*</span></label>
                                                    <input id="phone" type="text" name="phone" required="true" value="<?php if (isset($checkout_user["phone"])) echo $checkout_user["phone"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="street">Address <span class="mandatory">*</span></label>
                                                    <textarea rows="2" id="address" type="text" name="address" required="true" class="form-control"><?php if (isset($checkout_user["address"])) echo $checkout_user["address"]; ?></textarea>                                            
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="state">District <span class="mandatory">*</span></label>
                                                    <input id="district" type="text" name="district" required="true" value="<?php if (isset($checkout_user["district"])) echo $checkout_user["district"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="state">State <span class="mandatory">*</span></label>
                                                    <input id="state" type="text" name="state" required="true" value="<?php if (isset($checkout_user["state"])) echo $checkout_user["state"]; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="pincode">PIN Code <span class="mandatory">*</span></label>
                                                    <input id="pincode" type="number" name="pincode" required="true" value="<?php if (isset($checkout_user["pincode"])) echo $checkout_user["pincode"]; ?>" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="box-header mt-0">
                                            <h3>Billing Address <input type="checkbox" name="checkbox" onclick="change_billing()" id="billing_btn"></h3>
                                        </div>

                                        <input type="hidden" name="same_data" id="same_data" value="<?php if (isset($checkout_user["same_data"])) echo $checkout_user["same_data"]; ?>"/>
                                        <div class="billing_address" >
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name <span class="mandatory">*</span></label>
                                                        <input id="billing_first_name" type="text" name="billing_first_name" value="<?php if (isset($checkout_user["billing_first_name"])) echo $checkout_user["billing_first_name"]; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Last Name <span class="mandatory">*</span></label>
                                                        <input id="billing_last_name" type="text" name="billing_last_name" value="<?php if (isset($checkout_user["billing_last_name"])) echo $checkout_user["billing_last_name"]; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="street">Address <span class="mandatory">*</span></label>
                                                        <textarea rows="2" id="billing_address" type="text" name="billing_address" class="form-control"><?php if (isset($checkout_user["billing_address"])) echo $checkout_user["billing_address"]; ?></textarea>                                            
                                                    </div>
                                                </div>
                                               
                                                <div class="col-sm-6 col-md-3">

                                                    <div class="form-group">
                                                        <label for="city">District <span class="mandatory">*</span></label>
                                                        <input id="billing_district" type="text" name="billing_district" value="<?php if (isset($checkout_user["billing_district"])) echo $checkout_user["billing_district"]; ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="state">State <span class="mandatory">*</span></label>
                                                        <input id="billing_state" type="text" name="billing_state" value="<?php if (isset($checkout_user["billing_state"])) echo $checkout_user["billing_state"]; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="zip">PIN Code <span class="mandatory">*</span></label>
                                                        <input id="billing_pincode" type="number" name="billing_pincode" value="<?php if (isset($checkout_user["billing_pincode"])) echo $checkout_user["billing_pincode"]; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>                                      
                                            <button type="submit" class="btn btn-primary">Update</button>
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