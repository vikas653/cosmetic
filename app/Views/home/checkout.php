<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/theface/theface-v3/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:18:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || Theface</title>
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
                            <h1>Checkout</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Checkout section start-->
        <div class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-12">    
                            
                        <!-- Checkout Form Start-->
                        <form action="<?php echo base_url(); ?>home/shippingAddressAction" method="post" class="checkout-form"> 
                        <div class="row row-40">

                            <div class="col-lg-7">

                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-10">
                                    <h4 class="checkout-title">Shipping Address</h4>

                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name*</label>
                                            <input type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php if (isset($checkout_user["first_name"])) echo $checkout_user["first_name"]; ?>" required="true">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name*</label>
                                            <input id="last_name" type="text" name="last_name" required="true" value="<?php if (isset($checkout_user["last_name"])) echo $checkout_user["last_name"]; ?>" class="form-control">
                                        </div>

                                     

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Phone no*</label>
                                            <input id="phone" type="text" name="phone" required="true" value="<?php if (isset($checkout_user["phone"])) echo $checkout_user["phone"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Company Name</label>
                                            <input id="company" type="text" name="company" value="<?php if (isset($checkout_user["company"])) echo $checkout_user["company"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>Address*</label>
                                            <textarea rows="2" id="address" type="text" name="address" placeholder="House number and street name" required="true" class="form-control"><?php if (isset($checkout_user["address"])) echo $checkout_user["address"]; ?></textarea> 
                                        </div>

                                      

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>District*</label>
                                            <input id="district" type="text" name="district" required="true" value="<?php if (isset($checkout_user["district"])) echo $checkout_user["district"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>State*</label>
                                            <input id="state" type="text" name="state" required="true" value="<?php if (isset($checkout_user["state"])) echo $checkout_user["state"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Pin Code*</label>
                                            <input id="pincode" type="number" name="pincode" required="true" value="<?php if (isset($checkout_user["pincode"])) echo $checkout_user["pincode"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <div class="check-box">
                                                <input type="checkbox" id="create_account">
                                                <label for="create_account">Create an Acount?</label>
                                            </div>
                                            <div class="check-box">
                                                <input type="checkbox" id="shiping_address" data-shipping>
                                                <label for="shiping_address">Ship to Different Address</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- Shipping Address -->
                                <div id="shipping-form">
                                    <h4 class="checkout-title">Billing Address</h4>

                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name*</label>
                                            <input id="billing_first_name" type="text" name="billing_first_name" value="<?php if (isset($checkout_user["billing_first_name"])) echo $checkout_user["billing_first_name"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name*</label>
                                            <input id="billing_last_name" type="text" name="billing_last_name" value="<?php if (isset($checkout_user["billing_last_name"])) echo $checkout_user["billing_last_name"]; ?>" class="form-control">
                                        </div>

                                      

                                        <div class="col-12 mb-20">
                                            <label>Address*</label>
                                            <textarea rows="2" id="billing_address" type="text" name="billing_address" class="form-control"><?php if (isset($checkout_user["billing_address"])) echo $checkout_user["billing_address"]; ?></textarea>   
                                        </div>

                                      

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Town/City*</label>
                                            <input id="billing_district" type="text" name="billing_district" value="<?php if (isset($checkout_user["billing_district"])) echo $checkout_user["billing_district"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>State*</label>
                                            <input id="billing_state" type="text" name="billing_state" value="<?php if (isset($checkout_user["billing_state"])) echo $checkout_user["billing_state"]; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Pin Code*</label>
                                            <input id="billing_pincode" type="number" name="billing_pincode" value="<?php if (isset($checkout_user["billing_pincode"])) echo $checkout_user["billing_pincode"]; ?>" class="form-control">
                                        </div>

                                    </div>

                                </div>

                            </div>
                          
                            <div class="col-lg-5">
                                <div class="row">

                                    <!-- Cart Total -->
                                    <?php
                            $totals = 0;
                            $total_tax = 0;
                            $total_discount = 0;
                            $subtotal = 0;

                            if (count($cart) > 0) {
                                ?>
                                    <div class="col-12 mb-60">

                                        <h4 class="checkout-title">Cart Total</h4>

                                        <div class="checkout-cart-total">

                                            <h4>Product <span>Sub Total</span></h4>
                                            <?php
                                                foreach ($cart as $data) {
                                                    $item_price = (($data["product_price"] + $data["tax"]) * $data["qty"]);
                                                    $total_tax = $total_tax + ($data["tax"] * $data["qty"]);
                                                    $subtotal = $subtotal + ($data["product_price"] * $data["qty"]);

                                                    $item_total = ($item_price - $data["discount"]);
                                                    $total_discount = $total_discount + $data["discount"];
                                                    $totals = $totals + $item_total;
                                                    ?>
                                            <ul>
                                                <li><?= esc($data['product_title']); ?> X <?php echo $data["qty"] ?> <span>₹<?= esc($data['product_price']); ?></span></li>
                                              
                                            </ul>
                                            <hr><hr>
                                            <?php
                                                }
                                                ?>
                                            <p>Sub Total <span>₹<?php echo $subtotal; ?></span></p>
                                            <p>GST <span>₹<?php echo $total_tax; ?></span></p>

                                            <p>Discount <span>₹<?php echo $total_discount; ?></span></p>
                                            <h4>Grand Total <span>₹<?php echo $totals; ?></span></h4>
                                          

                                        </div>
                                        </tr>
                                               
                                    </div>
                                    <?php
                                                }
                                                ?>
                                    <!-- Payment Method -->
                                    <div class="col-12 mb-30">

                                        <h4 class="checkout-title">Payment Method</h4>

                                        <div class="checkout-payment-method">

                                             <div class="single-method">
                                                <input type="radio" id="payment_check" name="payment_type" value="check">
                                                <label for="payment_check">Direct Bank Transfer</label>
                                                <!-- <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p> -->
                                            </div>
                                            
                                            <!-- <div class="single-method">
                                                <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                                <label for="payment_bank">Direct Bank Transfer</label>
                                                <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                            </div> -->

                                            <div class="single-method">
                                            <input type="radio" id="payment_cash" name="payment_type" value="cashOnDelivery" >
                                                <label for="payment_cash">Cash on Delivery</label>
                                               
                                            </div>

                                            <!-- <div class="single-method">
                                                <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                                <label for="payment_paypal">Paypal</label>
                                                <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                            </div>

                                            <div class="single-method">
                                                <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                                <label for="payment_payoneer">Payoneer</label>
                                                <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                            </div> -->

                                            <!-- <div class="single-method">
                                                <input type="checkbox" id="accept_terms">
                                                <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                            </div> -->

                                        </div>

                                        <button class="place-order btn btn-lg btn-round">Place order</button>

                                    </div>

                                </div>
                            </div>

                        </div>
                        </form> 
                        
                    </div>
                </div>            
            </div>
        </div>
        <!--Checkout section end-->

        <!--Brand section start-->
      
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

<?php
    $billing_first_name = isset($checkout_user["billing_first_name"]) ? $checkout_user["billing_first_name"] : '';
    $billing_last_name = isset($checkout_user["billing_last_name"]) ? $checkout_user["billing_last_name"] : '';
    $billing_address = isset($checkout_user["billing_address"]) ? $checkout_user["billing_address"] : '';

    $billing_district = isset($checkout_user["billing_district"]) ? $checkout_user["billing_district"] : '';
    $billing_pincode = isset($checkout_user["billing_pincode"]) ? $checkout_user["billing_pincode"] : '';
    $billing_state = isset($checkout_user["billing_state"]) ? $checkout_user["billing_state"] : '';
    ?>

    <script type="text/javascript">
        var billing_first_name = "<?php echo $billing_first_name; ?>";
        var billing_last_name = "<?php echo $billing_last_name; ?>";
        var billing_address = "<?php echo $billing_address; ?>";

        var billing_district = "<?php echo $billing_district; ?>";
        var billing_pincode = "<?php echo $billing_pincode; ?>";
        var billing_state = "<?php echo $billing_state; ?>";

        var chk = 0;

        function change_billing() {
            if (chk == 0) {
                $("#billing_first_name").val($("#first_name").val());
                $("#billing_last_name").val($("#last_name").val());
                $("#billing_address").val($("#address").val());

                $("#billing_district").val($("#district").val());
                $("#billing_pincode").val($("#pincode").val());
                $("#billing_state").val($("#state").val());

                chk = 1;
            } else {
                $("#billing_first_name").val(billing_first_name);
                $("#billing_last_name").val(billing_last_name);
                $("#billing_address").val(billing_address);

                $("#billing_district").val(billing_district);
                $("#billing_pincode").val(billing_pincode);
                $("#billing_state").val(billing_state);
                chk = 0;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#quantity_update").change(function() {
                window.location.href = "<?php echo base_url() ?>home/update_cart/" + $(this).attr("data-cart") + "/" + $(this).val();
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $(".submit-btn").click(function() {
                $.ajax({
                    url: "<?php echo base_url("userlogin/ajaxSignin") ?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data: 'email=' + $("#user_email").val() + '&password=' + $("#user_password").val() + '&checkout_redirect=true',
                    success: function(result) {
                        if (result.status == "success")
                        {
                            window.location.href = result.url;
                        } else {
                            alert(result.msg);
                        }
                    }
                })
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            var total_amount = "<?php echo $totals; ?>";


            $("#my_coupon_btn").click(function() {
                var coupon = $("#my_coupon").val();
                if (coupon == "")
                {
                    $("#my_coupon").focus();
                    $("#my_coupon_msg").html("<p style='color:red'>Please Enter Coupon Code</p>");
                }
                else {
//                        $("#my_coupon_msg").html("<p style='color:green'>Applied</p>");

                    $.ajax({
                        url: "<?php echo base_url(); ?>home/discountCoupon",
                        type: "POST",
                        dataType: "JSON",
                        data: "coupon=" + coupon,
                        success: function(result) {
                            if (result.query == "success")
                            {
//                                      $("#my_coupon_msg").html("<p style='color:green'>Applied</p>");
                                $("#my_coupon_reg").val($("#my_coupon").val());
                                $("#co_discount").html("-₹" + result.result);
                                $("#co_total").html("₹" + (total_amount - result.result));
                                $("#my_coupon_msg").html("<p style='color:green'>Float Discount Rs." + result.result + " Discount is " + result.message + "</p>");
                            }
                            else if (result.query == "failed")
                            {
                                $("#co_discount").html("-₹0");
                                $("#co_total").html("₹" + total_amount);
                                $("#my_coupon_msg").html("<p style='color:red'>" + result.message + "</p>");
                            }
                            else
                            {
                                $("#co_discount").html("-₹0");
                                $("#co_total").html("₹" + total_amount);
                                $("#my_coupon_msg").html("<p style='color:red'>Error ocurred.</p>");
                            }
                        }
                    });
                }

            });
        });
    </script>
<!-- Mirrored from htmldemo.net/theface/theface-v3/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Apr 2025 11:18:10 GMT -->
</html>