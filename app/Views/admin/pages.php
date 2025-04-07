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
                        Pages
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Pages</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Pages</h3>

                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url("dashboard/add_page") ?>" class="btn btn-primary btn-xs">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable" id="example2" aria-describedby="example2_info">                                                                                                                  
                                <tr>
                                    <th>#</th>
                                    <th>Col </th>                                               
                                    <th>Row</th>
                                    <th>Heading</th>
                                    <th>Action</th>                            
                                </tr>                                    
                                <?php
                                if (isset($pages)) {
                                    $i = 0;
                                    foreach ($pages as $page) {
                                        $i++;
                                        ?>
                                        <tr class="odd">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $page["col_id"]; ?></td>
                                            <td><?php echo $page["row_id"]; ?></td>   
                                            <td><?php echo $page["heading"]; ?></td>   
                                            <td>
                                                <a href="<?php echo base_url(); ?>dashboard/edit_page?id=<?php echo $page["id"]; ?>" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-pencil"></i></a>
                                                <a href="<?php echo base_url(); ?>dashboard/delete_page?id=<?php echo $page["id"]; ?>" onclick="return confirm('Do you want to delete it?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-cut"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
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
