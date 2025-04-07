<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vindia | Dashboard</title>
        <?php include("common/header_lib.php"); ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">


            <?php include("common/header.php"); ?>
            <?php include("common/sidebar.php"); ?>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-10">
                 
                </div>
            </div>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Product
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Edit Product</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Product</h3>


                        </div>
                        <div class="box-body">
                            <form action="<?php echo base_url("dashboard/editProductAction") ?>" enctype="multipart/form-data" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="product_category" required="true" class="form-control">
                                            <?php
                                            $parent_category = array();
                                            foreach ($categories as $row) {
                                                $parent_category[$row["id"]] = $row["name"];
                                            }
                                            foreach ($categories as $category) {
                                                if ($product_detail["product_category"] == $category["id"])
                                                    $val = "selected";
                                                else
                                                    $val = "";
                                                if ($category["parent_id"] == 0) {
                                                    echo "<option value='" . $category["id"] . "' $val>" . $category["name"] . "</option>";
                                                } else {
                                                    echo "<option value='" . $category["id"] . "' $val>" . $parent_category[$category["parent_id"]] . " > " . $category["name"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control" required="true" name="product_brand">
                                            <option value="">Select Brand</option>
                                            <?php
                                            foreach ($brands as $brand) {
                                                if ($product_detail["product_brand"] == $brand["id"])
                                                    $val = "selected";
                                                else
                                                    $val = "";
                                                echo "<option value='" . $brand["id"] . "' $val>" . $brand["name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" name="product_title" value="<?php echo $product_detail["product_title"] ?>" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <select class="form-control" name="tax_included">
                                            <option value="0" <?php if ($product_detail["tax_included"] == 0) echo "selected"; ?>>Included</option>
                                            <option value="1" <?php if ($product_detail["tax_included"] == 1) echo "selected"; ?>>Excluded</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" name="product_price" value="<?php echo $product_detail["product_price"] ?>" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label>Product MRP</label> -->
                                        <input type="hidden" name="product_mrp" value="0" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input type="text" name="product_quantity" value="<?php echo $product_detail["product_quantity"] ?>" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Tags</label>
                                        <select name="product_tags[]" class="form-control select2" multiple="true">
                                            <?php
                                            $exist_tags = json_decode($product_detail["product_tags"]);

                                            foreach ($tags as $tag) {
                                                if (in_array($tag["id"], $exist_tags))
                                                    $val = "selected";
                                                else
                                                    $val = "";
                                                echo "<option value='" . $tag["id"] . "' $val>" . $tag["tag_name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea id="editor2" name="product_short_des"><?php echo $product_detail["product_short_des"] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="editor1" name="description"><?php echo $product_detail["product_description"] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main Product Image</label>
                                        <input type="file" name="img" class="form-control"><br/>
                                        <input type="hidden" name="cur_img" value="<?php echo $product_detail["product_image"] ?>"/>
                                        <img src="<?php echo base_url("assets/product/") ?><?php echo $product_detail["product_image"] ?>" width="100px">
                                    </div>
                                    <br clear="all"/>
                                    <label>Other Product Images <i class="fa fa-plus btn btn-primary" data-toggle="modal" data-target="#myModal"></i></label>
                                    <br clear="all"/> <br clear="all"/>
                                    <table>
                                        <?php
                                        foreach ($product_images as $product_image) {
                                            echo "<div class='pull-left image-delete' id='image-" . $product_image["id"] . "' rel='" . $product_image["id"] . "' style='margin-right:10px;'><img src='" . base_url() . "assets/product/" . $product_image["product_image"] . "' width='100px'> <i style='color:red;position:absolute;margin-left:-11px;margin-top:-17px;' class='fa fa-times'></i></div>";
                                        }
                                        ?>
                                    </table>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Is Trending?</label>
                                        <select class="form-control" name="in_trending">
                                            <option <?php if ($product_detail["in_trending"] == 0) echo "selected"; ?> value="0">No</option>
                                            <option <?php if ($product_detail["in_trending"] == 1) echo "selected"; ?> value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Product Sizes <i class="fa fa-plus btn btn-primary" data-toggle="modal" data-target="#myModal2"></i></label>
                                    <br clear="all"/> <br clear="all"/>
                                    <table class="table table-bordered">
                                    <!-- ?php
$s = 1;
foreach ($product_sizes as $product_size) {
    
    if ($product_size["size_name"] == 1) {
        $size_display = "S"; 
    } elseif ($product_size["size_name"] == 2) {
        $size_display = "M";  
    }elseif ($product_size["size_name"] == 3) {
        $size_display = "L";  
    }elseif ($product_size["size_name"] == 4) {
        $size_display = "X";  
    }elseif ($product_size["size_name"] == 5) {
        $size_display = "XL";  
    } 
    else {
        $size_display = $product_size["size_name"];  
    }
    
    echo "<tr><td>" . $s . "</td>
    <td>" . $size_display . "</td>
    <td>" . $product_size["price"] . "</td>
    <td><a href='" . base_url("dashboard/delProductSize/" . $product_size["id"] . "/" . $product_detail["product_id"]) . "'>Delete</a></td>
    </tr>";
    $s++;
}
?> -->
                                        <?php
                                        $s = 1;
                                        foreach ($product_sizes as $product_size) {
                                            echo "<tr><td>" . $s . "</td>
                                            <td>" . $product_size["size_name"] . "</td>
                                            <td>" . $product_size["price"] . "</td>
                                            <td><a href='" . base_url("dashboard/delProductSize/" . $product_size["id"] . "/" . $product_detail["product_id"]) . "'>Delete</a></td>
                                            </tr>";
                                            $s++;
                                        }
                                        ?>
                                    </table>
                                </div>
                                <br clear="all"> <br clear="all"/>
                                <div class="col-md-6">
                                    <input type="hidden" name="product_id" value="<?php echo $product_detail["product_id"]; ?>"/>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
                                </div>

                            </form>
                        </div>

                    </div>

                </section>
                <!-- /.content -->
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Product Image</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>        
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>dashboard/addProductImageAction" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label>Choose Image</label>
                                    <input type="file" name="img" class="form-control" required="required"/>
                                </div>
                                <input type="hidden" name="product_id" value="<?php echo $product_detail["product_id"]; ?>"/>
                                <input type="submit" value="Submit" class="btn btn-primary"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal -->
            <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Product Size</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>        
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>dashboard/addProductSizeAction" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label>Size Name</label>
                                    <input type="text" name="size_name" class="form-control" required="required"/>
                                     <!-- <select name="size_name" id="size_name" class="form-control" required>
                                        <option value=""></option>
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">X</option>
                                        <option value="5">XL</option>

                                     </select> -->
                                    <label>Product Price</label>
                                    <input type="text" name="price" class="form-control" required="required"/>
                                </div>
                                <input type="hidden" name="product_id" value="<?php echo $product_detail["product_id"]; ?>"/>
                                <input type="submit" value="Submit" class="btn btn-primary"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <?php include("common/footer.php") ?>
        </div>
        <!-- ./wrapper -->
        <?php include("common/footer_lib.php") ?>
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.0/classic/ckeditor.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
        <script>
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
        <script>
            $(function() {

                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });

                $(".select2").select2();


                $(".image-delete").click(function() {
                    var image_id = $(this).attr("rel");
                    var box = $(this).attr("id");
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/dashboard/deleteProductImage",
                        data: "image_id=" + image_id,
                        type: "post",
                        success: function(result)
                        {
                            if (result == "yes")
                            {
                                $("#" + box).hide();
                            }
                        }
                    })
                });
            });
        </script>
    </body>
</html>
