<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vindia | Dashboard</title>
        <?php include("common/header_lib.php"); ?>
        <style>

            .optionGroup {
                font-weight: bold;
                font-style: italic;
            }

            .optionChild {
                padding-left: 15px;
            }

        </style>
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
                        Categories
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
                            <h3 class="box-title">All Categories</h3>

                            <div class="box-tools pull-right">
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNew">Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th>#</th>\
                                        <th>Image</th>
                                        <th>Category Name</th>   
                                        <th>Parent</th>
                                        <th>Tax</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $parent_category = array();
                                    foreach ($category as $row) {
                                        $parent_category[$row["id"]] = $row["name"];
                                    }

                                    $i = 1;
                                    foreach ($category as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><img src="<?php echo base_url("assets/categories/thimg/") ?><?php echo $row["image"] ?>" width="50px"/></td>
                                            <td><?php echo $row["name"]; ?></td>  
                                            <td>
                                                <?php
                                                if (isset($parent_category[$row["parent_id"]]))
                                                    echo $parent_category[$row["parent_id"]];
                                                ?>
                                            </td>
                                            <td><?php echo $row["tax"]; ?>%</td>  
                                            <td>                                
                                                <a href="#" onclick="editCategory('<?php echo $row["id"] ?>', '<?php echo base64_encode($row["name"]); ?>', '<?php echo $row["parent_id"] ?>')" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editRecord"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url("dashboard/deleteCategory/" . $row["id"]) ?>" onclick="return confirm('Do you want to delete it?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
                            <h4 class="modal-title">Add Category</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>dashboard/addCategoryAction" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0">None</option>
                                        <?php
                                        foreach ($category as $row) {
                                            if ($row["parent_id"] == 0) {
                                                echo "<option value='" . $row["id"] . "' class='optionGroup'>" . $row["name"] . "</option>";
                                                foreach ($category as $row2) {
                                                    if ($row["id"] == $row2["parent_id"]) {
                                                        echo "<option value='" . $row2["id"] . "' class='optionChild'>-- " . $row2["name"] . "</option>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control" required="true"/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="img" class="form-control"/>
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
                function editCategory(category_id, category_name, parent_id)
                {
                    document.getElementById("category_name").value = decode64(category_name);
                    document.getElementById("category_id").value = category_id;
                    document.getElementById("parent_id").value = parent_id;
                }
            </script>
            <!-- Modal -->
            <div id="editRecord" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Category</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>dashboard/editCategoryAction" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="0">None</option>
                                        <?php
                                        foreach ($category as $row) {
                                            if ($row["parent_id"] == 0) {
                                                echo "<option value='" . $row["id"] . "' class='optionGroup'>" . $row["name"] . "</option>";
                                                foreach ($category as $row2) {
                                                    if ($row["id"] == $row2["parent_id"]) {
                                                        echo "<option value='" . $row2["id"] . "' class='optionChild'>-- " . $row2["name"] . "</option>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control" required="true"/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="img" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="category_id" id="category_id">
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
