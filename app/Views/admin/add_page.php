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
                            <h3 class="box-title">Add New Page</h3>

                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url("dashboard/add_page") ?>" class="btn btn-primary btn-xs">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="<?php echo base_url(); ?>dashboard/add_page_action" method="post" enctype="multipart/form-data">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>                                                        
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select name="col_id" class="form-control">
                                                            <option>Select Column</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>      
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select name="row_id" class="form-control">
                                                            <option>Select Row</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>      
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input id="heading" name="heading" placeholder="Heading" class="form-control" type="text" value="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>                                                                                                          
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Target</label>
                                                    <select class="form-control show-tick" name="target">
                                                        <option value="_self" selected="">Same Window</option>
                                                        <option value="_blank">New Window</option>                
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-group" id="textarea_tr">
                                                    <div class="form-line">
                                                        <label for="details"><span class="norequired">Details</span></label>
                                                        <textarea id="editor1" name="introtext">                            
                                                        </textarea> 
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="seo_data"><span class="norequired">SEO Meta Tags</span></label>
                                                        <textarea id="KEYWORDS" name="seo_data" class="form-control" type="text" rows="7" cols="80"></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>



                                <input type="submit" name="submit" value="submit" size="27" class="btn btn-primary">


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
        <script>
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
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
            });
        </script>
    </body>
</html>
