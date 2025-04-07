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
                    <?php
                    if ($this->session->flashdata("alert_success")) {
                        ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata("alert_success"); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata("alert_danger")) {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata("alert_danger"); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Orders
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Orders</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Orders</h3>


                        </div>
                        <div class="box-body">
                           <div class="panel panel-default mypanel">
                                <div class="panel-heading">Orders</div>
                                <div class="panel-body">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tr>
                                                        <td valign="top">
                                                            SHIP TO:
                                                        </td>
                                                        <td>
                                                            <p class="mb-1"><?php echo $customer_info["first_name"] . " " . $customer_info["last_name"] ?>,</p>
                                                            <p> <?php echo $customer_info["address"]; ?></p>
                                                            <p class="mb-1"><?php echo $customer_info["district"] ?>, <?php echo $customer_info["state"] ?></p>
                                                            <p class="mb-1"><?php echo $customer_info["pincode"]; ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top">
                                                            SOLD TO:
                                                        </td>
                                                        <td>
                                                            <p class="mb-1"><?php echo $customer_info["billing_first_name"] . " " . $customer_info["billing_last_name"] ?>,</p>
                                                            <p><?php echo $customer_info["billing_address"]; ?></p>
                                                            <p class="mb-1"><?php echo $customer_info["billing_district"] ?>, <?php echo $customer_info["billing_state"] ?></p>
                                                            <p class="mb-1"><?php echo $customer_info["billing_pincode"]; ?></p>
                                                        </td>
                                                    </tr>
                                                </table>                                                   
                                            </div>

                                            <div class="col-md-6">

                                                <p>GSTIN : 06DCKPM7097G2Z2 </p>
                                                <p>TRADER NAME: Beaver Sports Wear</p>
                                            </div>
                                        </div>
                                        <br clear="all"/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-bordered">
                                                        <tr style="background:#eee">
                                                            <th>ID</th>
                                                            <th>Item</th>
                                                            <th>Size</th>
                                                            <th>Unit Cost</th>
                                                            <th>Quantity</th>
                                                            <th>Discount</th>                                                       
                                                        </tr>
                                                        <?php
                                                        $i = 1;
                                                        $total_discount = ""
                                                        ;
                                                        if (count($order_item_details) > 0) {
                                                            foreach ($order_item_details as $order_item_detail) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>

                                                                    <td><?php echo $order_item_detail["name"] ?></td>
                                                                    <td><?php echo $order_item_detail["selected_size"] ?></td>
                                                                    <td>₹<?php echo ($order_item_detail["price"] + $order_item_detail["tax"]) ?></td>
                                                                    <td><?php echo $order_item_detail["quantity"] ?></td> 
                                                                    <td>₹<?php echo $order_item_detail["discount"] ?></td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="4" align="right">Grand Total</td>

                                                            <td>₹<?php echo $order_details["price"]; ?></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

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
            });



        </script>
    </body>
</html>
