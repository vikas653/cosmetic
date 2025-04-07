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
                        Sellers
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Sellers</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Professional Account Review</h3>


                        </div>
                        <div class="box-body">
                            <form action="<?php echo base_url("dashboard/reviewProfessionalAction") ?>" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="status" required="true" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Activate</option>
                                            <option value="2">Not Allowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Field Name</th>
                                            <th>Field Value</th>
                                        </tr>
                                        <tr>
                                            <td>User Type</td>
                                            <td>
                                                <?php
                                                if ($professional_detail["user_type"] == 2)
                                                    echo "Architect";
                                                else if ($professional_detail["user_type"] == 3)
                                                    echo "Interior Designer";
                                                else if ($professional_detail["user_type"] == 4)
                                                    echo "Electrician";
                                                else if ($professional_detail["user_type"] == 5)
                                                    echo "Plumber";
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Designation</td>
                                            <td><?php echo $professional_detail["designation"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Firm</td>
                                            <td><?php echo $professional_detail["firm"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Qualification</td>
                                            <td><?php echo $professional_detail["qualification"]; ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-md-8">
                                    <input type="hidden" name="user_id" value="<?php echo $professional_detail["id"] ?>"/>
                                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
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
