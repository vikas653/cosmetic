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
                            <h1>My Account sir</h1>
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
                                            <h3>Orders</h3>
    
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
    
                                                    <tbody>
                                                    <?php
                                            $i = 1;
                                            if (count($orders) > 0) {
                                                foreach ($orders as $order) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $order["order_no"] ?></td>
                                                        <td>₹<?php echo $order["price"] ?></td>
                                                        <td><?php
                                                            if ($order["status"] == 1)
                                                                echo "<i class='btn btn-success btn-xs'>Completed</i>";
                                                            else
                                                                echo "<i class='btn btn-danger btn-xs'>Pending</i>";
                                                            ?></td>

                                                        <td><?php echo $order["createdAt"]; ?></td>
                                                        <td>Courier Name: <?php echo $order["courier_name"]; ?><br/>Tracking No.: <?php echo $order["tracking_id"]; ?></td>
                                                        <td><?php echo $order["merchant_status"]; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($order["status"] == 0) {
                                                                ?>
<!--                                                                <a href="<?php echo base_url("home/reOrder/" . $order["order_no"]) ?>" class="btn btn-info btn-sm" style="color:white;">Pay Now</a>                                                                                                                               -->
                                                                <a href="<?php echo base_url("homedashboard/deleteOrder/" . $order["order_no"]) ?>" class="btn btn-danger btn-sm" style="color:white;"><i class="fa fa-trash"></i></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo base_url("homedashboard/ordersDetails/" . $order["order_no"]) ?>" class="btn btn-primary btn-sm" style="color:white;">Details</a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->
                                
                                    <!-- Single Tab Content End -->
    
                                
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->
                                  
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->
                                  
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