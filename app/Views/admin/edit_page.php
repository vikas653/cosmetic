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
                            <h3 class="box-title">Edit Page</h3>

                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url("dashboard/add_page") ?>" class="btn btn-primary btn-xs">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="<?php echo base_url(); ?>admin/dashboard/edit_page_action" method="post" enctype="multipart/form-data">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>                                                        
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select name="col_id" class="form-control">
                                                            <option>Select Column</option>
                                                            <option <?php if ($page["col_id"] == "1") echo "selected"; ?>>1</option>
                                                            <option <?php if ($page["col_id"] == "2") echo "selected"; ?>>2</option>
                                                            <option <?php if ($page["col_id"] == "3") echo "selected"; ?>>3</option>
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
                                                            <option <?php if ($page["row_id"] == "1") echo "selected"; ?>>1</option>
                                                            <option <?php if ($page["row_id"] == "2") echo "selected"; ?>>2</option>
                                                            <option <?php if ($page["row_id"] == "3") echo "selected"; ?>>3</option>
                                                            <option <?php if ($page["row_id"] == "4") echo "selected"; ?>>4</option>
                                                            <option <?php if ($page["row_id"] == "5") echo "selected"; ?>>5</option>
                                                            <option <?php if ($page["row_id"] == "6") echo "selected"; ?>>6</option>
                                                            <option <?php if ($page["row_id"] == "7") echo "selected"; ?>>7</option>
                                                            <option <?php if ($page["row_id"] == "8") echo "selected"; ?>>8</option>
                                                            <option <?php if ($page["row_id"] == "9") echo "selected"; ?>>9</option>
                                                            <option <?php if ($page["row_id"] == "10") echo "selected"; ?>>10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>       
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input id="heading" name="heading" placeholder="Heading" class="form-control" type="text" value="<?php echo $page["heading"]; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>                                                                                                          
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Target</label>
                                                    <select class="form-control show-tick" name="target">
                                                        <option value="_self" <?php if ($page["target"] == "_self") echo "selected"; ?>>Same Window</option>
                                                        <option value="_blank" <?php if ($page["target"] == "_blank") echo "selected"; ?>>New Window</option>                
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-group" id="textarea_tr">
                                                    <div class="form-line">
                                                        <label for="details"><span class="norequired">Details</span></label>
                                                        <textarea id="editor1" name="introtext"><?php echo $page["introtext"]; ?>                        
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
                                                        <textarea id="KEYWORDS" name="seo_data" class="form-control" type="text" rows="7" cols="80"><?php echo $page["seo_data"]; ?></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div align="center" style="padding-top:8px;">
                                    <input type="hidden" name="page_id" value="<?php echo $page["id"]; ?>">
                                    <input type="submit" name="submit" value="submit" size="27" class="btn btn-primary">

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
