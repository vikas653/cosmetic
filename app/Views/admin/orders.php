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
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Price</th>  
                                        <th>Tax</th>
                                        <th>Discount</th>
                                        <th>Payment</th>
                                        <th>Merchant Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($orders as $row) {
                                       
                                        ?>

                                        <tr>

                                            <td>
                                                <?php echo $row["user_name"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["phone"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["price"] ?>
                                            </td>

                                            <td>
                                                <?php echo $row["total_tax"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["total_discount"] ?>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                if ($row["status"] == 1) {
                                                    echo "<i class='btn btn-success btn-xs'>Completed</i><br/>";
                                                    echo "Courier Name:".$row["courier_name"]."<br/>";
                                                    echo "Tracking ID:".$row["tracking_id"];
                                                } else {
                                                    echo "<i class='btn btn-danger btn-xs'>Not Completed</i>";
                                                }
                                                ?>
                                            </td>
                                             <td>
                                                <?php echo $row["merchant_status"] ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>dashboard/orderDetail/<?php echo $row["order_no"] ?>" class="btn btn-info btn-xs">Order Detail</a>
                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal2" onclick="openUpdates('<?php echo $row["order_no"] ?>')">Updates</button>
                                                <?php
                                                if ($row["status"] == 1) {
                                                    ?>
                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal" onclick="openTracking('<?php echo $row["order_no"] ?>')">Add Tracking</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </section>
                <!-- /.content -->
            </div>
            <script>

                function openTracking(id)
                {
                    document.getElementById("order_no_id").value = id;
                }
                function openUpdates(id)
                {
                    document.getElementById("order_no_id2").value = id;
                }
            </script>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Tracking</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url("dashboard/addTrackingAction") ?>" method="post">
                                <div class="form-group">
                                    <label>Enter Courier Name</label>
                                    <input type="text" required="required" class="form-control" name="courier_name"/>
                                </div>
                                <div class="form-group">
                                    <label>Tracking No.</label>
                                    <input type="text" required="required" class="form-control" name="tracking_id"/>
                                </div>
                                <input type="hidden" name="order_no" id="order_no_id"/>
                                <input type="submit" value="Submit" class="btn btn-success"/>
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
                            <h4 class="modal-title">Updates</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url("dashboard/orderUpdatesAction") ?>" method="post">
                               
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="merchant_status" class="form-control">
                                        <option value="Payment Received">Payment Received</option>
                                        <option value="Processing Order">Processing Order</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <input type="hidden" name="order_no" id="order_no_id2"/>
                                <input type="submit" value="Submit" class="btn btn-success"/>
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
