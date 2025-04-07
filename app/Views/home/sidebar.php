<style>
   .myaccount-tab-menu {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  background-color: #ffffff;
}
.myaccount-tab-menu a {
  border: 1px solid #eeeeee;
  border-bottom: none;
  color: #333333;
  font-weight: 500;
  font-size: 12px;
  display: block;
  padding: 15px 15px 13px;
  text-transform: uppercase;
}
.myaccount-tab-menu a:last-child {
  border-bottom: 1px solid #eeeeee;
}
.myaccount-tab-menu a:hover, .myaccount-tab-menu a.active {
  background-color: #cea679;
  color: #ffffff;
}
.myaccount-tab-menu a i {
  font-size: 14px;
  text-align: center;
  width: 25px;
}

/*-- My Account Content -*/
.myaccount-content {
  background-color: #ffffff;
  font-size: 14px;
  border: 1px solid #eeeeee;
  padding: 30px;
}
@media only screen and (max-width: 575px) {
  .myaccount-content {
    padding: 20px 15px;
  }
}
.myaccount-content h3 {
  border-bottom: 1px dashed #eeeeee;
  padding-bottom: 10px;
  margin-bottom: 25px;
}
.myaccount-content .welcome a {
  color: #000000;
}
.myaccount-content .welcome a:hover {
  color: #cea679;
}
.myaccount-content .welcome strong {
  font-weight: 600;
}
.myaccount-content a.edit-address-btn {
  background: none;
  border: none;
  font-weight: 400;
  font-size: 14px;
  text-transform: uppercase;
  color: #ffffff;
  background-color: #333333;
  border-color: #333333;
  padding: 10px 20px;
  border-radius: 3px;
}
.myaccount-content a.edit-address-btn i {
  padding-right: 5px;
}
.myaccount-content a.edit-address-btn:hover {
  background-color: #cea679;
}
.myaccount-content button.save-change-btn {
  background: none;
  border: none;
  font-weight: 400;
  text-transform: uppercase;
  color: #ffffff;
  background-color: #333333;
  border-color: #333333;
  width: 140px;
  padding: 10px 0;
  border-radius: 3px;
}
.myaccount-content button.save-change-btn:hover {
  background-color: #cea679;
}

/*-- My Account Table -*/
.myaccount-table {
  white-space: nowrap;
  font-size: 15px;
}
.myaccount-table table th, .myaccount-table .table th {
  padding: 10px;
}
.myaccount-table table td, .myaccount-table .table td {
  padding: 20px 10px;
  vertical-align: middle;
}
.myaccount-table table td a:hover, .myaccount-table .table td a:hover {
  color: #cea679;
}
</style>
<div class="panel panel-default sidebar-menu2 with-icons">
    <div class="panel-heading">
        <a ">Dashboard</a>
    </div>
    <div class="panel-body" style="padding:0px;">
        <ul class="nav nav-pills flex-column text-sm sidebar_icon">                        
            <li class="nav-item"><a href="<?php echo base_url(); ?>homedashboard/userdetails" class="nav-link"><i class="fa fa-user"></i> User Profile</a></li>                                                    
            <li class="nav-item"><a href="<?php echo base_url(); ?>homedashboard/orders" class="nav-link"><i class="fa fa-car"></i> My Orders</a></li>                                                
            <li class="nav-item"><a href="<?php echo base_url(); ?>home/carts" class="nav-link"><i class="fa fa-cart-plus"></i> My Cart</a></li>                                                
            <li class="nav-item"><a href="<?php echo base_url(); ?>homedashboard/wishlist" class="nav-link"><i class="fa fa-heart"></i> My Wishlist</a></li>                                                
            <li class="nav-item"><a href="<?php echo base_url(); ?>userlogin/logout" class="nav-link"><i class="fa fa-sign-out "></i> Logout</a></li>                                        
        </ul>
    </div>
</div>


