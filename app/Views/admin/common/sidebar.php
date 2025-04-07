<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>includes/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php if ($page_root == "dashboard") echo "active"; ?>">
                <a href="<?php echo base_url(); ?>dashboard/">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>                   
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Home Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url("dashboard/homeSlider") ?>"><i class="fa fa-circle-o"></i>Manage Home Slider</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span> Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url("dashboard/slider") ?>"><i class="fa fa-circle-o"></i>Manage Slider</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                  
                    <li><a href="<?php echo base_url("dashboard/categories") ?>"><i class="fa fa-circle-o"></i>Manage Categories</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url("dashboard/brand") ?>"><i class="fa fa-circle-o"></i>Manage Brands</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Partners</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url("dashboard/partner") ?>"><i class="fa fa-circle-o"></i>Manage Partners</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Product Tags</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url("dashboard/tags") ?>"><i class="fa fa-circle-o"></i>Manage Tags</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("dashboard/addProduct") ?>"><i class="fa fa-circle-o"></i>Add Product</a></li>                   
                    <li><a href="<?php echo base_url("dashboard/products") ?>"><i class="fa fa-circle-o"></i>Manage Products</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                
                    <li><a href="<?php echo base_url("dashboard/orders") ?>"><i class="fa fa-circle-o"></i>Manage Orders</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Discounts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                
                    <li><a href="<?php echo base_url("dashboard/discounts") ?>"><i class="fa fa-circle-o"></i>Manage Discounts</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                
                    <li><a href="<?php echo base_url("dashboard/users") ?>"><i class="fa fa-circle-o"></i>Manage Users</a></li>  
                    <li><a href="<?php echo base_url("dashboard/sellers") ?>"><i class="fa fa-circle-o"></i>Manage Sellers</a></li>  
<!--                    <li><a href="<?php echo base_url("dashboard/professionals") ?>"><i class="fa fa-circle-o"></i>Manage Professionals</a></li>  -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                
                    <li><a href="<?php echo base_url("dashboard/pages") ?>"><i class="fa fa-circle-o"></i>Manage Pages</a></li>                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                
                    <li><a href="<?php echo base_url("dashboard/profile") ?>"><i class="fa fa-circle-o"></i>Manage Admin</a></li>                   
                    <li><a href="<?php echo base_url("dashboard/socialmedia") ?>"><i class="fa fa-circle-o"></i>Social Media & Home Settings</a></li>                   
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>