<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/theface/theface-v3/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:17:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register || Theface</title>
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
                            <h1>Register</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Register</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Login Register section start-->
        <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                        <!--Login Form Start-->
                       
                        <!--Login Form End-->
                        <!--Register Form Start-->
                        <div class="col-md-12 col-sm-12">
                            <div class="customer-login-register register-pt-0">
                                <div class="form-register-title">
                                    <h2>Register</h2>
                                </div>
                                <div class="register-form">
                                <form action="<?php echo base_url("home/registerAction"); ?>" id="signupform" method="post">
                                        <div class="form-fild">
                                            <p><label>Name <span class="required">*</span></label></p>
                                            <input name="name" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Email <span class="required">*</span></label></p>
                                            <input name="email" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Mobile No <span class="required">*</span></label></p>
                                            <input name="phone" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Location <span class="required">*</span></label></p>
                                            <input name="location" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Password <span class="required">*</span></label></p>
                                            <input name="password" value="" type="password">
                                        </div>
                                        <div class="register-submit">
                                            <button type="submit" class="btn">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Register Form End-->
                    </div>            
            </div>
        </div>
        <!--Login Register section end-->
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
    <script>
        $(document).ready(function() {

            $.validator.addMethod("pwcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                        && /[a-z]/.test(value) // has a lowercase letter
                        && /\d/.test(value) // has a digit
            });

            $('#signupform').validate({
                rules: {
                    password: {
                        minlength: 8,
                        pwcheck: true
                    },
                    password_confirm: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        pwcheck: "Password must have letter and digits"
                    }
                }
            });

        });
    </script>
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All jquery file included here -->
    <?php include("common/footer_lib.php"); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUgLBKvSwdkQgAW0Gb7LezoM_B58r_7pw&libraries=places&callback=initMap"
    async defer></script>
</body>


<!-- Mirrored from htmldemo.net/theface/theface-v3/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:17:53 GMT -->
</html>