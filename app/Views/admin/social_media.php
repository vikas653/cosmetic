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
                        Social Media
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"> Social Media</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Social Media</h3>


                        </div>

                        <div class="box-body">

                            <form action="<?php echo base_url("dashboard/socialMediaUpdate") ?>" enctype="multipart/form-data" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" name="facebook" class="form-control" value="<?php echo $social_media["facebook"]; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="text" name="twitter" class="form-control" value="<?php echo $social_media["twitter"]; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Google Plus Link</label>
                                        <input type="text" name="google-plus" class="form-control" value="<?php echo $social_media["google-plus"]; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram Link</label>
                                        <input type="text" name="instagram" class="form-control" value="<?php echo $social_media["instagram"]; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Pinterest Link</label>
                                        <input type="text" name="pinterest" class="form-control" value="<?php echo $social_media["pinterest"]; ?>"/>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h4>Home Banners</h4>
                                    <div class="form-group">
                                        <label>Banner 1</label>
                                        <input type="file" name="file" class="form-control"/>
                                        <img src="<?php echo base_url("assets/banners/" . $social_media["home_banner1"]); ?>" width="200px"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Banner 2</label>
                                        <input type="file" name="file2" class="form-control"/>
                                        <img src="<?php echo base_url("assets/banners/" . $social_media["home_banner2"]); ?>" width="200px"/>
                                    </div>


                                    <input type="hidden" name="discount_cart_limit" class="form-control" value="0"/>

                                </div>
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
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
