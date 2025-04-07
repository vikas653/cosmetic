<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/theface/theface-v3/single-product-variable.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:18:11 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Single Product Variable  || Theface</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("common/header_lib.php"); ?>
   
    
</head>

<body>

    <div id="main-wrapper">

        <!--Header section start-->
    <?php include("common/header.php"); ?>
       
        <!--Header section end-->

        <!-- Single Product Section Start -->
        <div class="single-product-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
		            <div class="col-md-5">
		                <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-lg-image-1 tf-element-carousel" data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "asNavFor": ".slider-thumbs-1",
                                "arrows": false,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }'>
                              
                                <div class="lg-image">
                                    <img src="<?php echo base_url("assets/product/") . $product["product_image"] ?>" alt="">
                                    <a href="<?php echo base_url("assets/product/") . $product["product_image"] ?>" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1 tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "focusOnSelect": true,
                                "asNavFor": ".slider-lg-image-1",
                                "arrows": false,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive= '[
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":767, "settings": {
                                    "slidesToShow": 4
                                }},
                                {"breakpoint":479, "settings": {
                                    "slidesToShow": 2
                                }}
                            ]'>										
                                <div class="sm-image"><img src="<?php echo base_url("assets/product/") . $product["product_image"] ?>"></div>
                                <?php
                                    foreach ($product_images as $image) {
                                        ?>
                                        <a data-url="<?php echo base_url("assets/product/") . $image["product_image"] ?>" href="#"><img src="<?php echo base_url("assets/product/") . $image["product_image"] ?>"  alt=""></a>
                                        <?php
                                    }
                                    ?>
                            </div>
                        </div>
                        <!--Product Details Left -->
		            </div>
		            <div class="col-md-7">
                        <!--Product Details Content Start-->
		                <div class="product-details-content">
                            <!--Product Nav Start-->
                            <div class="product-nav">
                                <a href="#"><i class="fa fa-angle-left"></i></a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <!--Product Nav End-->
		                    <h2><?= esc($product['product_title']); ?></h2>
		                    <div class="single-product-reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <!-- <a class="review-link" href="#">(1 customer review)</a> -->
                            </div>
                            <div class="single-product-price">
                                <span class="price new-price">$<?= esc($product['product_price']); ?></span>
                                <span class="regular-price">$<?= esc($product['product_mrp']); ?></span>
                            </div>
                            <div class="product-description">
                            <p><?= $product['product_description']; ?></p>
                            </div>
                            <div class="single-product-quantity">
                                <form class="add-quantity" action="<?php echo base_url("home/addToCart") ?>" enctype="multipart/form-data" method="post"  id="addToCartForm">
                                    <!-- <div class="product-variants">
                                        <div class="product-variants-item">
                                            <span class="control-label">Size</span>
                                            <select name="size">
                                                <option value="1">S</option>
                                                <option value="2">M</option>
                                                <option value="3">X</option>
                                                <option value="4">XL</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">S</span><ul class="list"><li data-value="1" class="option selected focus">S</li><li data-value="2" class="option">M</li><li data-value="3" class="option">X</li><li data-value="4" class="option">XL</li></ul></div>
                                        </div>
                                        <div class="product-variants-item">
                                            <span class="control-label">Color</span>
                                            <ul class="procuct-color">
                                                <li><a href="#"><span class="color"></span></a></li>
                                                <li class="active"><a href="#"><span class="color"></span></a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                     <div class="product-quantity">
                                         <input value="1" type="number" name="qty">
                                     </div>
                                    <div class="add-to-link">
                                    <input type="hidden" name="product_id" value="<?= esc($product['product_id']); ?>">
                                    <input class="product-add-btn" type="submit" name="submit" value="Add To Cart" style="width:200px">
                                    </div>
                                </form>
                           </div>
                            <div class="wishlist-compare-btn">
                                <a href="#" class="wishlist-btn">Add to Wishlist</a>
                                <a href="#" class="add-compare">Compare</a>
                            </div>
                            <div class="product-meta">
                                <span class="posted-in">
                                Brand: 
		                                <a href="#"><?= esc($product['b_name']); ?></a> &nbsp;&nbsp;&nbsp;
                                        Categories:
		                                <a href="#"><?= esc($product['name']); ?></a>
		                            </span>
                            </div>
                            <div class="single-product-sharing">
                                <h3>Share this product</h3>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                            </div>
		                </div>
		                <!--Product Details Content End-->
		            </div>
		        </div>
            </div>
        </div>
        <!-- Single Product Section End -->

        <!--Product Description Review Section Start-->
		<!-- <div class="product-description-review-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-review-tab">
                            <ul class="nav dec-and-review-menu">
                                <li>
                                <a class="active" data-bs-toggle="tab" href="#description">Description</a>
                                </li>
                                <li>
                                <a data-bs-toggle="tab" href="#reviews">Reviews (1)</a>
                                </li>
                            </ul>
                            <div class="tab-content product-review-content-tab" id="myTabContent-4">
                                <div class="tab-pane fade active show" id="description">
                                    <div class="single-product-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                        <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews">
                                    <div class="review-page-comment">
                                    <h2>1 review for Sit voluptatem</h2>
                                    <ul>
                                        <li>
                                            <div class="product-comment">
                                                <img src="assets/images/icons/author.png" alt="">
                                                <div class="product-comment-content">
                                                    <div class="product-reviews">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p class="meta">
                                                        <strong>admin</strong> - <span>November 22, 2018</span>
                                                    <div class="description">
                                                        <p>Good Product</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="review-form-wrapper">
                                        <div class="review-form">
                                            <span class="comment-reply-title">Add a review </span>
                                            <form action="#">
                                                <p class="comment-notes">
                                                    <span id="email-notes">Your email address will not be published.</span>
                                                        Required fields are marked
                                                        <span class="required">*</span>
                                                </p>
                                                <div class="comment-form-rating">
                                                    <label>Your rating</label>
                                                    <div class="rating">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="input-element">
                                                    <div class="comment-form-comment">
                                                        <label>Comment</label>
                                                        <textarea name="message" cols="40" rows="8"></textarea>
                                                    </div>
                                                    <div class="review-comment-form-author">
                                                        <label>Name </label>
                                                        <input required="required" type="text">
                                                    </div>
                                                    <div class="review-comment-form-email">
                                                        <label>Email </label>
                                                        <input required="required" type="text">
                                                    </div>
                                                    <div class="comment-submit">
                                                        <button type="submit" class="form-button">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--Product Description Review Section Start-->

        <!--Product section start-->
        <div
            class="product-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-65 pb-lg-45 pb-md-35 pb-sm-25 pb-xs-15">
            <div class="container">

                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col">
                        <div class="section-title mb-40 mb-xs-20">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="product-slider tf-element-carousel" data-slick-options='{
                "slidesToShow": 4,
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
                {"breakpoint":576, "settings": {
                "slidesToShow": 1,
                "arrows": false,
                "autoplay": true
                }}
                ]'>
                  
                <?php foreach ($related as $relatedProduct): ?>
                    <div class="col-lg-3">
                        <!-- Single Product Start -->
                        <div class="single-product mb-30">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="<?php echo base_url("assets/product/" . $relatedProduct['product_image']); ?>" alt="">
                                </a>
                                <span class="descount-sticker">-10%</span>
                                <span class="sticker">New</span>
                                <div class="product-action d-flex justify-content-between">
                                    <a class="product-btn" href="<?= base_url("home/viewProduct/" . $relatedProduct['product_url']); ?>">Add to Cart</a>
                                    <ul class="d-flex">
                                        <li><a href="#quick-view-modal-container" data-bs-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="single-product.html"><?= esc($relatedProduct['product_title'])?></a></h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h4 class="price"><span class="new"><?= esc($relatedProduct['product_price'])?></span></h4>
                            </div>
                        </div>
                        <!-- Single Product End -->
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!--Product section end-->

        <!--Product section start-->
     
        <!--Product section end-->

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
  
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Mirrored from htmldemo.net/theface/theface-v3/single-product-variable.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:18:11 GMT -->
</html>