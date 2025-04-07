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
                        Home Slider
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Home Slider</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Banners</h3>

                            <div class="box-tools pull-right">
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNew">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <p>Size: 1920 X 640</p>
                            <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Platform</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($home_sliders as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><img src="<?php echo base_url("assets/home_slider/thimg/") ?><?php echo $row["img"] ?>" width="50px"/></td>
                                            <td><?php
                                                if ($row["platform"] == 1) {
                                                    echo "Web";
                                                } else {
                                                    echo "Android";
                                                }
                                                ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>dashboard/deleteHomeSlider/<?php echo $row["id"]; ?>" onclick="return confirm('Do you want to delete id?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>                                               
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
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
                            <h4 class="modal-title">Add Home Slider</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>dashboard/addHomeSliderAction" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="img" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Platform</label>
                                    <select name="platform" class="form-control">
                                        <option value="1">Web</option>
                                        <option value="2">Android</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-success" value="Submit"/>
                                </div>
                            </form>
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
