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
                        Add Product
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Product</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Product</h3>


                        </div>
                        <div class="box-body">
                            <form action="<?php echo base_url("dashboard/addProductAction") ?>" enctype="multipart/form-data" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="product_category" required="true" class="form-control">
                                            <?php
                                            foreach ($categories as $row) {
                                                if ($row["parent_id"] == 0) {
                                                    echo "<optgroup label='" . $row["name"] . "'>";
                                                    foreach ($categories as $row2) {
                                                        if ($row["id"] == $row2["parent_id"]) {
                                                            echo "<optgroup label='-- " . $row2["name"] . "'>";
                                                            foreach ($categories as $row3) {
                                                                if ($row2["id"] == $row3["parent_id"]) {
                                                                    echo "<option value='" . $row3["id"] . "'>" . $row3["name"] . "</option>";
                                                                }
                                                            }
                                                            echo "</optgroup>";
                                                        }
                                                    }
                                                    echo "</optgroup>";
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
                                                echo "<option value='" . $brand["id"] . "' >" . $brand["name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" name="product_title" value="" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <select class="form-control" name="tax_included">
                                            <option value="0">Included</option>
                                            <option value="1">Excluded</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" name="product_price" value="" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product MRP</label>
                                        <input type="text" name="product_mrp" value="" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input type="text" name="product_quantity" value="" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Tags</label>
                                        <select name="product_tags[]" class="form-control select2" multiple="true">
                                            <?php
                                            foreach ($tags as $tag) {

                                                echo "<option value='" . $tag["id"] . "'>" . $tag["tag_name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea id="editor2" name="product_short_des"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="editor1" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" name="img" class="form-control" required="true"><br/>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Is Trending?</label>
                                        <select class="form-control" name="in_trending">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <br clear="all">
                                <div class="col-md-6">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
                                </div>

                            </form>
                        </div>

                    </div>

                </section>
                <!-- /.content -->
            </div>



            <?php include("common/footer.php") ?>
        </div>
        <!-- ./wrapper -->
        <?php include("common/footer_lib.php") ?>
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
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
            });
        </script>
    </body>
</html>
