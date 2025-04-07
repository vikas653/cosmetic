<header class="header header-transparent header-sticky">
            <div class="header-top">
                <div class="container-fluid pl-75 pr-75 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
                    <div class="row align-items-center">

                        <div class="col-xl-6 col-lg-8 d-flex flex-wrap justify-content-lg-start justify-content-center align-items-center">
                            <!--Links start-->
                            <div class="header-top-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-phone"></i>(08) 123 456 7890</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-open-o"></i>yourmail@domain.com</a></li>
                                </ul>
                            </div>
                            <!--Links end-->
                            <!--Socail start-->
                            <div class="header-top-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                            <!--Socail end-->
                        </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="ht-right d-flex justify-content-lg-end justify-content-center">
                                <ul class="ht-us-menu d-flex">
                                    <li><a href="<?php echo base_url(); ?>userlogin"><i class="fa fa-user-circle-o"></i>Login</a>
                                        <ul class="ht-dropdown right">
                                            <li><a href="compare.html">Compare Products</a></li>
                                            <li><a href="<?php echo base_url(); ?>homedashboard">My Account</a></li>
                                            <li><a href="wishlist.html">My Wish List</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/registration">Sign In</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="ht-cr-menu d-flex">
                                    <li><a href="#">EUR</a>
                                        <ul class="ht-dropdown width-20">
                                            <li><a href="#">USD</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><img src="assets/images/language/english.png" alt="">English2</a>
                                        <ul class="ht-dropdown width-50">
                                            <li><a href="#"><img src="assets/images/language/english.png"
                                                        alt="">English1</a></li>
                                            <li><a href="#"><img src="assets/images/language/english.png"
                                                        alt="">English3</a></li>
                                            <li><a href="#"><img src="assets/images/language/english.png"
                                                        alt="">English4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="header-bottom menu-right">
                <div class="container-fluid pl-75 pr-75 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
                    <div class="row align-items-center">

                        <!--Logo start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-1 order-md-1 order-1">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                            </div>
                        </div>
                        <!--Logo end-->

                        <!--Menu start-->
                        <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-3 d-flex justify-content-center">
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="<?php echo base_url('/'); ?>">Home</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                            <li><a href="index-4.html">Home Four</a></li>
                                            <li><a href="index-5.html">Home Five</a></li>
                                            <li><a href="index-6.html">Home Six</a></li>
                                        </ul> -->
                                    </li>
                                    <?php
                            foreach ($categories as $cat) {
                                if ($cat["parent_id"] == 0) {
                                    ?>
                                    <li><a href=""><?php echo $cat["name"]; ?></a>
                                  
                                        <ul class="mega-menu four-column">
                                        <?php
                                            foreach ($categories as $subcat) {
                                                if ($subcat["parent_id"] == $cat["id"]) {
                                                    ?>
                                            <li><a href="#" class="item-link"><?php echo $subcat["name"] ?></a>
                                                <ul>
                                                <?php
                                                        foreach ($categories as $subsubcat) {
                                                            if ($subsubcat["parent_id"] == $subcat["id"]) {
                                                                ?>
                                                    <li> <a href="<?php echo base_url("home/category/" . $subsubcat["url"]) ?>"><?php echo $subsubcat["name"]; ?></a></li>
                                                    <?php
                                                            }
                                                        }
                                                        ?>
                                                </ul>
                                            </li>
                                   
                                            <?php
                                                }
                                            }
                                            ?>
                                         
                                        </ul>
                                       
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                                    <!-- <li><a href="blog.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog Three Column</a></li>
                                            <li><a href="blog-two-column.html">Blog Two Column</a></li>
                                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="blog-details-gallery.html">Blog Details Gallery</a></li>
                                            <li><a href="blog-details-audio.html">Blog Details Audio</a></li>
                                            <li><a href="blog-details-video.html">Blog Details Video</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="<?php echo base_url('home/about'); ?>">About Us</a></li>
                                    <li><a href="<?php echo base_url('home/contact'); ?>">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->

                        <!--Search Cart Start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-3 order-md-3 order-2 d-flex justify-content-end">
                            <div class="header-search">
                                <button class="header-search-toggle"><i class="fa fa-search"></i></button>
                                <div class="header-search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Type and hit enter">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="header-cart">
                                <a href="cart.html"><i class="fa fa-shopping-cart"></i><span>3</span></a>
                                <!--Mini Cart Dropdown Start-->
                                <div class="header-cart-dropdown">
                                    <ul class="cart-items">
                                        <li class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-content">
                                                <h5 class="product-name"><a href="single-product.html">Dell Inspiron
                                                        24</a></h5>
                                                <span class="product-quantity">1 ×</span>
                                                <span class="product-price">$278.00</span>
                                            </div>
                                            <div class="cart-item-remove">
                                                <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </li>
                                        <li class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-content">
                                                <h5 class="product-name"><a href="single-product.html">Lenovo Ideacentre
                                                        300</a></h5>
                                                <span class="product-quantity">1 ×</span>
                                                <span class="product-price">$23.39</span>
                                            </div>
                                            <div class="cart-item-remove">
                                                <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="cart-total">
                                        <h5>Subtotal :<span class="float-right">$39.79</span></h5>
                                        <h5>Eco Tax (-2.00) :<span class="float-right">$7.00</span></h5>
                                        <h5>VAT (20%) : <span class="float-right">$0.00</span></h5>
                                        <h5>Total : <span class="float-right">$46.79</span></h5>
                                    </div>
                                    <div class="cart-btn">
                                        <a href="cart.html">View Cart</a>
                                        <a href="checkout.html">checkout</a>
                                    </div>
                                </div>
                                <!--Mini Cart Dropdown End-->
                            </div>
                        </div>
                        <!--Search Cart End-->
                    </div>

                    <!--Mobile Menu start-->
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <!--Mobile Menu end-->

                </div>
            </div>
        </header>