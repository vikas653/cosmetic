<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/theface/theface-v3/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:18:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart || Theface</title>
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
                            <h1>Shopping Cart</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Cart</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Cart section start-->
        <div class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    
                    <div class="col-12">            
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product Name</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-price">GST</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                $totals = 0;
                                $total_tax = 0;
                                $total_discount = 0;
                                $subtotal = 0;
                                $el = 1;
                                foreach ($cart as $data):
                                    $item_price = (($data["product_price"] + $data["tax"]) * $data["qty"]);
                                    $total_tax = $total_tax + ($data["tax"] * $data["qty"]);
                                    $subtotal = $subtotal + ($data["product_price"] * $data["qty"]);

                                    $item_total = ($item_price - $data["discount"]);
                                    $total_discount = $total_discount + $data["discount"];
                                    $totals = $totals + $item_total;
                                    ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="<?php echo base_url("assets/product/" . $data['product_image']); ?>" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#"><?php echo $data['product_title'] ?></a></td>
                                        <td class="pro-price"><span><?php echo $data['product_price'] ?></span></td>
                                        <td class="pro-gst"><span><?php echo $data['tax'] ?></span></td>
                                        <?php
                                                if ($data["discount"] == 0) {
                                                    ?>
                                        <td class="pro-quantity"><div class="">
                                        <button class="dec qtybtn2 quantity_update common_minus_btn" style="padding:7px;" data-field-id="<?php echo $el; ?>" id="minus-btn-<?php echo $el; ?>">-</button>
                                    <!-- <input type="text" class="qty-input" value="<?= $data['qty'] ?>" style="width:30px;"> -->
                                    <input type="text" id="qty_input_<?php echo $el; ?>" class="qty-input" data-cart='<?php echo $data["id"]; ?>' value="<?php echo $data["qty"]; ?>" style="text-align:center; width:25px" min="1" >
                                    <button class="dec qtybtn2 quantity_update common_plus_btn" style="padding:7px;" data-field-id="<?php echo $el; ?>" id="plus-btn-<?php echo $el; ?>">+</button>

                             
                                     <input type="hidden" class="product-tax" value="<?= $data['tax'] ?>">

                                    </div>
                                    </td>
                                    <?php
                                                } else {
                                                    echo $data["qty"];
                                                }
                                                ?>
                                       
                                        <td class="pro-remove"><a href="<?php echo base_url(); ?>home/delete_cart?cartId=<?php echo $data["id"]; ?>" ><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <?php
                                    $el++;

                                endforeach;
                                ?>
                                </tbody>
                                
                            </table>
                        </div>

                        <div class="row">

                            <div class="col-lg-6 col-12 mb-5">
                                <!-- Calculate Shipping -->
                              
                                <!-- Discount Coupon -->
                            
                            </div>
                            <?php
                    if (count($cart) > 0) {
                        ?>
                            <!-- Cart Summary -->
                            <div class="col-lg-6 col-12 mb-30 d-flex">
                                <div class="cart-summary">
                                    <div class="cart-summary-wrap">
                                        <h4>Cart Summary</h4>
                                        <p>Sub Total <span>₹<?php echo $subtotal ?></span></p>
                                        <p>GST <span>₹<?php echo $total_tax ?></span></p>
                                        <h2>Grand Total <span>₹<?php echo $totals ?>   </span></h2>
                                    </div>
                                    <div class="cart-summary-button">
                                        <a href="<?php echo base_url("home/checkout"); ?>" class="btn" style="width:410px;">Process to Checkout</a>
                                        <!-- <button class="btn">Update Cart</button> -->
                                    </div>
                                </div>
                            </div>
  <?php
                    }
                    ?>
                        </div>
                        
                    </div>
                    
                </div>            
            </div>
        </div>
        <!--Cart section end-->

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

    <?php include("common/footer_lib.php"); ?>
    <script>

$(document).ready(function() {

    $(".common_minus_btn").click(function() {

        var element_id = $(this).attr("data-field-id");
        $('#qty_input_' + element_id).val(parseInt($('#qty_input_' + element_id).val()) - 1);
        if ($('#qty_input_' + element_id).val() == 0) {
            $('#qty_input_' + element_id).val(1);
        }
        window.location.href = "<?php echo base_url() ?>home/update_cart/" + $("#qty_input_" + element_id).attr("data-cart") + "/" + $('#qty_input_' + element_id).val();
    });

    $(".common_plus_btn").click(function() {
        var element_id = $(this).attr("data-field-id");
        $('#qty_input_' + element_id).val(parseInt($('#qty_input_' + element_id).val()) + 1);
        window.location.href = "<?php echo base_url() ?>home/update_cart/" + $("#qty_input_" + element_id).attr("data-cart") + "/" + $('#qty_input_' + element_id).val();
    });

});
</script>



</body>


<!-- Mirrored from htmldemo.net/theface/theface-v3/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:18:10 GMT -->
</html>