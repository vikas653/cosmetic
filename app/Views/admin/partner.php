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
                        Partners
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Categories</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Partners</h3>

                            <div class="box-tools pull-right">
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNew">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                  
                                        <th>Partner Name</th>                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($parnters as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                           
                                            <td><?php echo $row["partner_name"]; ?></td>                                    
                                            <td>
                                                <a href="<?php echo base_url(); ?>dashboard/deletePartner/<?php echo $row["id"]; ?>" onclick="return confirm('Do you want to delete id?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                <a href="#" onclick="editPartner('<?php echo $row["id"] ?>', '<?php echo base64_encode($row["partner_name"]); ?>')" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editRecord"><i class="fa fa-edit"></i></a>
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
                            <h4 class="modal-title">Add Partner</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>admin/dashboard/addPartnerAction" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Partner Name</label>
                                    <input type="text" name="partner_name" class="form-control" required="true"/>
                                </div>
                              
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-success" value="Submit"/>
                                </div>
                            </form>
                        </div>       
                    </div>
                </div>
            </div>

            <script>
                function editPartner(partner_id, partner_name)
                {
                    document.getElementById("partner_name").value = decode64(partner_name);
                    document.getElementById("partner_id").value = partner_id;
                }
            </script>
            <!-- Modal -->
            <div id="editRecord" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Partner</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>admin/dashboard/editPartnerAction" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Partner Name</label>
                                    <input type="text" name="partner_name" id="partner_name" class="form-control" required="true"/>
                                </div>
                             
                                <div class="form-group">
                                    <input type="hidden" name="partner_id" id="partner_id">
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
