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
                        Discounts
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Discounts</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Discounts</h3>

                            <div class="box-tools pull-right">
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNew">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr> 
                                        <th>Code</th>
                                        <th>Amount</th>
                                        <th>Cart Value</th>
                                        <th>Valid from</th>
                                        <th>Valid to</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($discountCodes)) {
                                        foreach ($discountCodes as $code) {
                                            if ($code['status'] == 1) {
                                                $tostatus = 0;
                                            } else {
                                                $tostatus = 1;
                                            }
                                            ?>
                                            <tr> 
                                                <td><?php echo $code['code'] ?></td>
                                                <td id="amount_<?php echo $code["id"];?>"><?php echo $code['type'] == 'float' ? '-' . $code['amount'] : '-' . $code['amount'] . '%' ?></td>
                                                <td id="cart_value_<?php echo $code["id"];?>"><?php echo $code["cart_value"]; ?></td>
                                                <td><?php echo date('d.m.Y', $code['valid_from_date']) ?></td>
                                                <td <?php echo time() > $code['valid_to_date'] ? 'class="text-danger"' : '' ?>><?php echo date('d.m.Y', $code['valid_to_date']) ?></td>
                                                <td class="text-center">

                                                    <?php echo $code['status'] == 1 ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>' ?>

                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);" rel="<?php echo $code['id']; ?>" class="btn btn-primary btn-xs edit_discount" data-toggle="modal" data-target="#edit">Edit</a>
                                                    <a href="<?php echo base_url('admin/dashboard/deleteDiscount/' . $code['id']) ?>" class="btn btn-primary btn-xs">Delete</a>
                                                </td>
                                            </tr> 
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">No discount codes added</td> 
                                        </tr> 
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </section>
                <!-- /.content -->
            </div>

            <!-- Modal -->
            <div id="addNew" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Discount</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url("dashboard/addDiscount") ?>" method="POST">

                                <div class="form-group">
                                    <label>Type of discount</label>
                                    <select class="selectpicker form-control show-tick show-menu-arrow" name="type">
                                        <!--                                        <option value="percent">%</option>-->
                                        <option value="float">Float</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Discount value</label>
                                    <input class="form-control" name="amount" value="" type="text">
                                </div>
                                <div class="form-group" style="position: relative;">
                                    <label>Discount code</label>
                                    <input class="form-control" name="code" value="" type="text">
                                    <div style="position: absolute; right:5px; top:30px;">
                                        <input type="text" data-toggle="tooltip" title="Set length of code" data-placement="top" class="codeLength" value="6" style="border: 1px solid #dadada;float: left;height: 20px; margin-right: 4px; text-align: center; margin-top: 1px; width: 20px;">
                                        <a href="javascript:void(0);" onclick="generateDiscountCode()" class="btn btn-xs btn-default">Generate</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cart value</label>
                                    <input class="form-control" name="cart_value" value="" type="number">
                                </div>
                                <div class="form-group">
                                    <label>Valid from date</label>
                                    <input class="form-control datepicker" name="valid_from_date" value="" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Valid to date</label>
                                    <input class="form-control datepicker" name="valid_to_date" value="" type="text">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>       
                </div>
            </div>

            <!-- Modal -->
            <div id="edit" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Discount</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url("dashboard/updateDiscount") ?>" method="POST">


                                <div class="form-group">
                                    <label>Discount value</label>
                                    <input class="form-control" name="amount" id="edit_amount" value="" type="text">
                                </div>


                                <div class="form-group">
                                    <label>Valid to date</label>
                                    <input class="form-control datepicker" name="valid_to_date" value="" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Cart value</label>
                                    <input class="form-control" name="cart_value" id="edit_cart_value" value="" type="text">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="discount_id" name="discount_id" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
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

        <script>
            $(document).ready(function() {

                $('.datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });

                $(".edit_discount").click(function() {
                    var id = $(this).attr("rel");
                    $("#discount_id").val(id);
                    $("#edit_cart_value").val($("#cart_value_"+id).text());
                    $("#edit_amount").val($("#amount_"+id).text().replace("-",""));
                });
            });
            function generateDiscountCode() {
                var length = $('.codeLength').val();
                if (length < 3 || length == '') {
                    alert('Too short discount code!');
                } else {
                    var text = "";
                    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                    for (var i = 0; i < length; i++) {
                        text += possible.charAt(Math.floor(Math.random() * possible.length));
                    }
                    $('[name="code"]').val(text.toUpperCase());
                }
            }

        </script>
    </body>
</html>
