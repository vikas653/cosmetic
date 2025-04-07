<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop || Theface</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("common/header_lib.php"); ?>
</head>
<body>
    <div id="main-wrapper">
        <?php include("common/header.php"); ?>
        
        <div class="shop-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2">
                        <div class="common-sidebar-widget">
                            <h3 class="sidebar-title"><?php echo $parent_detail["name"] ?? 'Categories'; ?></h3>
                            <ul class="sidebar-list">
                            <?php
                                foreach ($filter_categories as $category) {
                                    ?>
                                    <li>
                                        <input type='checkbox' class="category_checkbox family_filter" data-col="#cat<?php echo $category["id"]; ?>" id="<?php echo "category" . $category["id"] ?>" <?php
                                        if (isset($category_detail["id"]) && $category_detail["id"] == $category["id"]) echo "checked";
                                        ?> value="<?php echo $category["id"]; ?>"/>
                                        <?php echo $category["name"] ?> <span class="count-update">(<?= $category["total_records"]; ?>)</span>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="common-sidebar-widget">
                            <h3 class="sidebar-title">Brands</h3>
                            <ul class="sidebar-list">
                            <?php
                                foreach ($filter_brands as $brand) {
                                    ?>
                                <li>  
                                    <input type="checkbox" class="brand_checkbox family_filter" <?php
                                        if (isset($brand_detail) && $brand_detail["id"] == $brand["id"]) echo "checked"; else echo "checked";
                                        ?> value="<?php echo $brand["id"]; ?>">
                                        <?php echo $brand["name"]; ?><span class="count-update">(<?php echo $brand["total_records"]; ?>)</span>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="common-sidebar-widget">
                            <h3 class="sidebar-title">Price</h3>
                            <ul class="sidebar-list">
                                <li><a href="#"><i class="fa fa-angle-right"></i><span class="price">€0.00</span> - <span class="price">€99.99</span> <span class="count">(7)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i><span class="price">€100.00</span> and above  <span class="count">(14)</span></a></li>
                            </ul>
                        </div>
                        <div class="common-sidebar-widget">
                            <div class="single-banner">
                                <a href="#">
                                    <img src="<?= base_url('assets/images/banner/h4-banner-2.png') ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-banner mb-35 mb-xs-20">
                                    <img src="assets/images/banner/category-image.jpg" alt="">
                                </div>
                                <div class="shop-banner-title">
                                    <h2>Shop  <span><?php echo $parent_detail["name"] ?? ''; ?></span></h2>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                                    <div class="grid-list-option">
                                        <ul class="nav">
                                            <li><a class="active show" data-bs-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="toolbar-short-area d-md-flex align-items-center">
                                        <div class="toolbar-shorter">
                                            <label>Sort By:</label>
                                            <select class="wide">
                                                <option data-display="Select">Nothing</option>
                                                <option value="Name, A to Z">Name, A to Z</option>
                                                <option value="Name, Z to A">Name, Z to A</option>
                                               
                                            </select>
                                        </div>
                                        <div class="toolbar-shorter">
                                            <label>Show</label>
                                            <select class="small">
                                                <option data-display="Select">9</option>
                                                <option value="15">15</option>
                                                <option value="30">30</option>
                                            </select>
                                            <span>per page</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-product">
                                    <div id="myTabContent-2" class="tab-content">
                                        <div id="grid" class="tab-pane fade active show">
                                            <div class="product-grid-view">
                                                <div class="row row--15 product-items">
                                                    <!-- Products will be loaded here via AJAX -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-30 mb-sm-40 mb-xs-30">
                            <div class="col">
                                <ul class="page-pagination">
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="active"><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("common/footer.php"); ?>
        <?php include("common/off_section.php"); ?>
    </div>

    <?php include("common/footer_lib.php"); ?>

<script>
$(document).ready(function() {
    filter_data();

    $('.slider-range-price').each(function() {
        var min = $(this).data('min');
        var max = $(this).data('max');
        var unit = $(this).data('unit');
        var value_min = $(this).data('value-min');
        var value_max = $(this).data('value-max');
        var label_reasult = $(this).data('label-reasult');
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function(event, ui) {
                var result = label_reasult + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                t.closest('.price_slider_wrapper').find('.amount-range-price').html(result);
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            }
        });
    });

    $(".price_filter").click(function() {
        filter_data();
    });

    $(".family_filter").click(function() {
        var category_class_id = $(this).attr("id");
        var category_data_col = $(this).attr("data-col");

        if (category_class_id != "") {
            if ($(this).prop("checked") == true) {
                $("." + category_class_id).each(function() {
                    $(this).attr("checked", true);
                });
            } else if ($(this).prop("checked") == false) {
                $("." + category_class_id).each(function() {
                    $(this).attr("checked", false);
                });
            }
        }
        filter_data();
        load_brands();
        $("#divLoading").show();
        load_brands();
    });

    function load_brands() {
        var category = get_filter('category_checkbox');
        $.ajax({
            url: "<?php echo base_url('home/family_filter'); ?>",
            method: "POST",
            data: { category: category },
            dataType: "json",
            success: function(data) {
                var filter_brand = "";
                for (var i = 0; i < data.brands.length; i++) {
                    filter_brand += "<li><label class='check'><input type='checkbox' checked class='brand_checkbox family_filter' value='" + data.brands[i].id + "' onclick='filter_data()'><span class='checkmark'></span></label><a class=''><b>" + data.brands[i].name + "</b><span class='quantity'>(" + data.brands[i].total_records + ")</span></a></li>";
                }
                $("#box_brands").html(filter_brand);
            },
            error: function(xhr, status, error) {
                console.error('Load Brands Error:', error);
            }
        });
    }

    function filter_data() {
        var brand = get_filter('brand_checkbox');
        var category = get_filter('category_checkbox');
        var min_price = Number($("#min_price").val()) || 0;
        var max_price = Number($("#max_price").val()) || 999999;

        console.log('Filter Data:', { brand: brand, category: category, min_price: min_price, max_price: max_price });

        $.ajax({
            url: "<?php echo base_url('home/product_filter'); ?>",
            method: "POST",
            data: { brand: brand, category: category, min_price: min_price, max_price: max_price },
            success: function(data) {
                $(".product-items").html(data);
                $("#divLoading").hide();
                console.log('Response:', data);
            },
            error: function(xhr, status, error) {
                console.error('Filter Data Error:', status, error, xhr.responseText);
                $(".product-items").html('<div class="col-12 text-center"><h4>Error loading products: ' + status + ' - ' + error + '</h4></div>');
            }
        });
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }
});
</script>
</body>
</html>