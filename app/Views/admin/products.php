<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vindia | Dashboard</title>
        <?php include("common/header_lib.php"); ?>
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
                        Products
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Products</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                        <form method="GET" id="searchProductsForm" action="<?= base_url('admin/products') ?>">
    <div class="row">
        <div class="col-sm-4">
            <label>Category:</label>
            <select name="category" class="form-control selectpicker change-products-form sel_cat">
                <option value="">Select</option>
                <option value="all" <?= (isset($_GET["category"]) && $_GET["category"] == "all") ? "selected" : "" ?>>All</option>
                <?php foreach ($shop_categories as $category1) : ?>
                    <?php
                    $selected = (isset($_GET["category"]) && $_GET["category"] == $category1["id"]) ? "selected" : "";
                    $parentName = $parent_category[$category1["parent_id"]] ?? '';
                    ?>
                    <option value="<?= $category1["id"] ?>" <?= $selected ?>>
                        <?= ($category1["parent_id"] == 0) ? $category1["name"] : $parentName . " > " . $category1["name"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

                        </div>
                        <div class="box-body">
                            <?php
                            if (isset($products)) {
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($products as $row) {
                                                $u_path = 'attachments/shop_images/';
                                                if ($row["product_image"] != null /* && file_exists( $row->product_image) */) {
                                                    $image = ($row["product_image"]);
                                                } else {
                                                    $image = base_url('attachments/no-image.png');
                                                }
                                                ?>

                                                <tr>
                                                    <td>
                                                        <img src="<?php echo base_url() . "assets/product/thimg/" . $image ?>" alt="No Image" class="img-thumbnail" style="height:100px;">
                                                    </td>
                                                    <td>
                                                        <?php echo $row["product_title"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["product_price"] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row["product_quantity"] > 5) {
                                                            $color = 'label-success';
                                                        }
                                                        if ($row["product_quantity"] <= 5) {
                                                            $color = 'label-warning';
                                                        }
                                                        if ($row["product_quantity"] == 0) {
                                                            $color = 'label-danger';
                                                        }
                                                        ?>
                                                        <span style="font-size:12px;" class="label <?php echo $color ?>">
                                                            <?php echo $row["product_quantity"] ?>
                                                        </span>
                                                    </td>
                                                   
                                                    <td>
                                                        <div class="pull-right">
                                                            <a href="<?php echo base_url('dashboard/editProduct/' . $row["product_id"]) ?>" class="btn btn-info">Edit</a>
                                                            <a href="<?php echo base_url('dashboard/deleteProduct/' . $row["product_id"] . "/" . $_GET["category"]) ?>" onclick="return confirm('Do you want to delete it?')" class="btn btn-danger confirm-delete">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <?php
                        } else {
                            ?>
                            <div class ="alert alert-info">No products found!</div>
                        <?php } ?>
                    </div>

            </div>

        </section>
        <!-- /.content -->
    </div>



    <?php include("common/footer.php") ?>
</div>
<!-- ./wrapper -->
<?php include("common/footer_lib.php") ?>

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

        $(".change-products-form").change(function() {

            var cat = $(".sel_cat").val();

            window.location.href = "<?php echo base_url(); ?>dashboard/products?category=" + cat;
        });
    });
</script>
</body>
</html>
