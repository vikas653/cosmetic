<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/theface/theface-v3/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:17:55 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cosmetic</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <?php include("common/header_lib.php"); ?>
    
</head>

<body>

    <div id="main-wrapper">

        <!--Header section start-->
    <?php include("common/header.php"); ?>
      
        <!--Header section end-->

        <!--slider section start-->
        <div class="hero-section section position-relative">

            <div class="tf-element-carousel slider-nav" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": true,
                "autoplay": true,
                "autoplaySpeed": 4000
                }' data-slick-responsive='[
                {"breakpoint":768, "settings": {
                    "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                    "slidesToShow": 1,
                    "arrows": false
                }}
                ]'>
                            <?php foreach ($home_slider as $data): ?>
                <!--Hero Item start-->
                <div class="hero-item bg-image" data-bg=" <?php echo base_url("assets/home_slider/" . $data  ['img']);?>"
                 >
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-end">

                                <!--Hero Content start-->
                                <div class="hero-content-4 center">

                                    <h1><span><?= esc($data['name']); ?></span></h1>
                                    <h3><span>Makeup / Cosmetics</span></h3>
                                    <a href="shop.html">Shop collection now!</a>

                                </div>
                                <!--Hero Content end-->

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!--Hero Item end-->
            </div>

        </div>
        <!--slider section end-->

        <!-- Feature Section Start -->
        <div class="feature-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature mb-30">
                            <div class="icon">
                                <i class="fa-truck fa"></i>
                            </div>
                            <div class="content">
                                <h2>Free shipping worldwide</h2>
                                <p>On order over $200</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature mb-30">
                            <div class="icon">
                                <i class="fa fa-undo"></i>
                            </div>
                            <div class="content">
                                <h2>30 days free return</h2>
                                <p>Money back guarantee</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature mb-30 br-0">
                            <div class="icon">
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            <div class="content">
                                <h2>Member safe shopping</h2>
                                <p>Safe shopping guarantee</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Section End -->

        <!-- About Section Start --> 
        <div class="about-section section pt-70 pt-lg-50 pt-md-40 pt-sm-25 pt-xs-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Cta Section Start -->
                        <div class="cta-section-area mb-40">
                            <h3>Get <span>10%</span> Discount</h3>
                            <p><span>Subcribe to the TheFace mailing list to receive update on mnew arrivals,</span> 
                                <span>special offers and other discount information.</span>
                            </p>
                            <div class="cta-form">
                                <form id="mc-form" class="mc-form">
                                    <input id="mc-email" type="email" autocomplete="off"
                                        placeholder="Your email address here" />
                                    <button id="mc-submit" class="cta-btn">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                        <!-- Cta Section End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- About Section Start -->
                        <div class="about-section-area mb-40">
                            <div class="text-des">
                                <h3>About us</h3>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
                            </div>
                            <div class="about-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                        </div>
                        <!-- About Section End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->

        <!--Product section start-->
        <div class="product-section section pt-70 pt-lg-45 pt-md-40 pt-sm-30 pt-xs-15">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="product-tab-menu mb-40 mb-xs-20">
                            <ul class="nav">
                                <li><a class="active" data-bs-toggle="tab" href="#products"> New Products</a></li>
                                <!-- <li><a data-bs-toggle="tab" href="#onsale"> OnSale</a></li>
                                <li><a data-bs-toggle="tab" href="#featureproducts"> Feature Products</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="products">
                                <div class="product-slider tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "rows": 2,
                                "arrows": true,
                                 "autoplay": true,
                                "autoplaySpeed": 3000,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 2,
                                "arrows": false,
                                "autoplay": true
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                            <?php foreach ($products as $data): ?>

                                    <div class="col-12">
                                       
                                        <div class="single-product mb-30">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img src="<?php echo base_url("assets/product/" . $data['product_image']); ?>" alt="">
                                                </a>
                                                <span class="descount-sticker">-10%</span>
                                                <span class="sticker">New</span>
                                                <div class="product-action d-flex justify-content-between">
                                                    <a class="product-btn" href="<?= base_url("home/viewProduct/" . $data['product_url']); ?>">Add to Cart</a>
                                                    <ul class="d-flex">
                                                        <li><a href="#quick-view-modal-container" data-bs-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html"><?= esc($data['product_title']);?></a></h3>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <h4 class="price"><span class="new">₹<?= esc($data['product_mrp']); ?></span><span
                                                        class="old">₹<?= esc($data['product_price']); ?></span></h4>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                            <?php endforeach; ?>
                                  

                                </div>
                            </div>
                           
                           
                                  
                              
                                 
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Product section end-->

        <!--Blog section start-->
        <!-- <div
            class="blog-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-75 pb-lg-55 pb-md-45 pb-sm-35 pb-xs-30">
            <div class="container">

                <div class="row">
                    <!-- Section Title Start --
                    <div class="col">
                        <div class="section-title mb-40 mb-xs-20">
                            <h2>From the blog</h2>
                        </div>
                    </div>
                    <!-- Section Title End --
                </div>

                <div class="blog-slider tf-element-carousel" data-slick-options='{
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": true,
                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                    }' data-slick-responsive='[
                    {"breakpoint":1199, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2,
                    "arrows": false,
                    "autoplay": true
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1,
                    "arrows": false,
                    "autoplay": true
                    }}
                    ]'>
                    <!-- Single Blog Start --
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img src="assets/images/blog/blog1.png" alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Cool boy with tattoo</a></h3>
                                <ul class="meta">
                                    <li><i class="fa fa-calendar"></i><span class="date-time"><span class="date">20</span><span class="separator">-</span><span class="month">Jul</span></span></li>
                                </ul>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
                                <a class="readmore" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <!-- Single Blog Start --
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img src="assets/images/blog/blog2.png" alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Blog image post</a></h3>
                                <ul class="meta">
                                    <li><i class="fa fa-calendar"></i><span class="date-time"><span class="date">20</span><span class="separator">-</span><span class="month">Jul</span></span></li>
                                </ul>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
                                <a class="readmore" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <!-- Single Blog Start --
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img src="assets/images/blog/blog3.png" alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Blog Audio post</a></h3>
                                <ul class="meta">
                                    <li><i class="fa fa-calendar"></i><span class="date-time"><span class="date">20</span><span class="separator">-</span><span class="month">Jul</span></span></li>
                                </ul>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
                                <a class="readmore" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                    <!-- Single Blog Start --
                    <div class="blog col">
                        <div class="blog-inner">
                            <div class="media"><a href="blog-details.html" class="image"><img src="assets/images/blog/blog1.png" alt=""></a></div>
                            <div class="content">
                                <h3 class="title"><a href="blog-details.html">Blog Video post</a></h3>
                                <ul class="meta">
                                    <li><i class="fa fa-calendar"></i><span class="date-time"><span class="date">20</span><span class="separator">-</span><span class="month">Jul</span></span></li>
                                </ul>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
                                <a class="readmore" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog End --
                </div>
            </div>
        </div> -->
        <!--Blog section end-->

        <!--Brand section start-->
        <div
            class="brand-section section pt-90 pt-lg-70 pt-md-65 pt-sm-55 pt-xs-40 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container-fluid pl-75 pr-75 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
                <div class="row">

                    <!--Brand Slider start-->
                    <div class="brand-slider tf-element-carousel section p-0" data-slick-options='{
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
                        <?php foreach ($slider as $data): ?>
                        <div class="brand col"><a href="#"><img src="<?php echo base_url("assets/slider/" . $data ['image']);?>" alt=""></a></div>
                        <?php endforeach ?>
                    </div>
                    <!--Brand Slider end-->

                </div>
            </div>
        </div>
        <!--Brand section end-->

        <!--Categorie Product section start-->
        <div
            class="categorie-product-section section">
            <div class="container-fluid pl-0 pr-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-md-4">
                        <!-- Single Categorie Product Start -->
                        <div class="single-categorie">
                            <div class="categorie-image">
                                <img src="assets/images/categorie/cate-1.png" alt="">
                            </div>
                            <div class="categorie-content">
                                <h3>Now introducing</h3>
                                <a class="shop-btn" href="#">Shop now</a>
                                <h1>Spa Optima+</h1>
                            </div>
                        </div>
                        <!-- Single Categorie Product End -->
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <!-- Single Categorie Product Start -->
                        <div class="single-categorie">
                            <div class="categorie-image">
                                <img src="assets/images/categorie/cate-2.png" alt="">
                            </div>
                            <div class="categorie-content">
                                <h3>Wrinkle cure</h3>
                                <a class="shop-btn" href="#">Shop now</a>
                                <h1>Time Revolution</h1>
                            </div>
                        </div>
                        <!-- Single Categorie Product End -->
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <!-- Single Categorie Product Start -->
                        <div class="single-categorie">
                            <div class="categorie-image">
                                <img src="assets/images/categorie/cate-3.png" alt="">
                            </div>
                            <div class="categorie-content">
                                <h3>Pretty perks for every point you earn</h3>
                                <a class="shop-btn" href="#">Shop now</a>
                                <h1>Beauty Squad</h1>
                            </div>
                        </div>
                        <!-- Single Categorie Product End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Categorie Product section end-->

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


<!-- Mirrored from htmldemo.net/theface/theface-v3/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:17:56 GMT -->
</html>