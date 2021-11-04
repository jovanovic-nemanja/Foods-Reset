<?php
if ( ! isset( $title ) ) {
	$title = 'Dashboard';
}
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ( $title == 'Dashboard' ) {
				echo 'active';
			} ?>">
                <a href="{{url('/')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php if ( $title == 'All Users' || $title == 'Add Buyer' ) {
				echo 'active';
			} ?>">
                <a href="javascript:void(0);">
                    <i class="fa fa-tags"></i> <span>Users / Buyer</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ( $title == 'All Users' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/users"><i class="fa fa-circle-o"></i>All Users</a></li>
                    <li class="<?php if ( $title == 'Add Buyer' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/users/create"><i class="fa fa-circle-o"></i>Add Buyer</a></li>

                </ul>
            </li>
            <li class="treeview <?php if ( $title == 'All WareHouse' || $title == 'Add WareHouse' || $title == 'Edit WareHouse' ) {
				echo 'active';
			} ?>">
                <a href="javascript:void(0);">
                    <i class="fa fa-tags"></i> <span>WareHouse</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ( $title == 'All WareHouse' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/warehouse"><i class="fa fa-circle-o"></i>All WareHouse</a></li>
                    <li class="<?php if ( $title == 'Add WareHouse' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/warehouse/create"><i class="fa fa-circle-o"></i>Add WareHouse</a></li>
                </ul>
            </li>
            <li class="treeview <?php if ( $title == 'All Pool' || $title == 'Add New Pool' || $title == 'Edit Pool' ) {
				echo 'active';
			} ?>">
                <a href="javascript:void(0);">
                    <i class="fa fa-tags"></i> <span>Pools</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ( $title == 'All Pool' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/pools"><i class="fa fa-circle-o"></i>All Pool</a></li>
                    <li class="<?php if ( $title == 'Add New Pool' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/pools/create"><i class="fa fa-circle-o"></i>Add Pool</a></li>
                </ul>
            </li>

        <!--        <li class="treeview <?php if ( $title == 'All Category' || $title == 'Add New Category' || $title == 'Edit Category' ) {
			echo 'active';
		} ?>">
         <a href="javascript:void(0);">
            <i class="fa fa-tags"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ( $title == 'All Category' ) {
			echo 'active';
		} ?>"><a href="{{url('/')}}/categories"><i class="fa fa-circle-o"></i>All Category</a></li>
            <li class="<?php if ( $title == 'Add New Category' ) {
			echo 'active';
		} ?>"><a href="{{url('/')}}/categories/create"><i class="fa fa-circle-o"></i>Add Category</a></li>
          </ul>
        </li>-->
            <li class=" treeview <?php if ( $title == 'All Sku' || $title == 'Add New Sku' || $title == 'Edit Sku' ) {
				echo 'active';
			} ?>">
                <a href="javascript:void(0);">
                    <i class="fa fa-product-hunt"></i> <span>Sku</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ( $title == 'All Sku' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/sku"><i class="fa fa-circle-o"></i>All Sku</a></li>
                    <li class="<?php if ( $title == 'Add New Sku' ) {
						echo 'active';
					} ?>"><a href="{{url('/')}}/sku/create"><i class="fa fa-circle-o"></i>Add Sku</a></li>
                </ul>
            </li>
        <!--        <li class=" treeview <?php if ( $title == 'All Preference' || $title == 'Add New Preference' || $title == 'Edit Preference' ) {
			echo 'active';
		} ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-product-hunt"></i> <span>Preference</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ( $title == 'All Preference' ) {
			echo 'active';
		} ?>"><a href="{{url('/')}}/preference"><i class="fa fa-circle-o"></i>All Preference</a></li>
            <li class="<?php if ( $title == 'Add New Preference' ) {
			echo 'active';
		} ?>"><a href="{{url('/')}}/preference/create"><i class="fa fa-circle-o"></i>Add Preference</a></li>
          </ul>
        </li>-->
            <li class="treeview <?php if ( $title == 'Price' || $title == 'Remaining Days' || $title == 'Quantity' || $title == 'Order Duration' || $title == 'Bank Detail' ) {
				echo 'active';
			} ?>">
                <a href="javascript:void(0);">
                    <i class="fa fa-gears"></i> <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                <!--<li class="<?php // if($title == 'Pool') { echo 'active'; } ?>"><a href="{{url('/')}}/admin/setting/pool"><i class="fa fa-money"></i>Pool</a></li>-->
                    <li class="<?php if($title == 'Remaining Days') { echo 'active'; } ?>"><a
                                href="{{url('/')}}/admin/setting/remainingdays"><i class="fa fa-calendar"></i>Remaining
                            Days</a></li>
                <!--<li class="<?php // if($title == 'Quantity') { echo 'active'; } ?>"><a href="{{url('/')}}/admin/setting/quantity"><i class="fa fa-sort-amount-asc"></i>Quantity</a></li>-->
                    <li class="<?php if($title == 'Order Duration') { echo 'active'; } ?>"><a
                                href="{{url('/')}}/admin/setting/duration"><i class="fa fa-clock-o"></i>Order
                            Duration</a></li>
                    <li class="<?php if($title == 'Bank Detail') { echo 'active'; } ?>"><a
                                href="{{url('/')}}/admin/setting/bankdetail"><i class="fa fa-credit-card-alt"></i>Bank
                            Detail</a></li>

                </ul>
            </li>
        <!--     <li class="treeview <?php if($title == 'All Suppliers') { echo 'active'; } ?>">
         <a href="javascript:void(0);">
            <i class="fa fa-building-o"></i> <span>Supplier</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($title == 'All Suppliers') { echo 'active'; } ?>"><a href="{{url('/')}}/admin/suppliers"><i class="fa fa-list-alt"></i>All Supplier</a></li>
           
         
      </ul>
        </li>-->
        <!--     <li class="treeview <?php if($title == 'All Buyers') { echo 'active'; } ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-shopping-cart"></i> <span>Buyer Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($title == 'All Buyers') { echo 'active'; } ?>"><a href="{{url('/')}}/admin/buyers"><i class="fa fa-list-alt"></i>All Buyer Posts</a></li>
           
         
          </ul>
        </li>-->
        <!--          <li class=" treeview <?php if($title == 'All Product Tag' ||$title == 'Add New Product Tag' || $title == 'Edit Product Tag' ) { echo 'active'; } ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-product-hunt"></i> <span>Product Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($title == 'All Product Tag') { echo 'active'; } ?>"><a href="{{url('/')}}/producttags"><i class="fa fa-circle-o"></i>All Product Tags</a></li>
            <li class="<?php if($title == 'Add New Product Tag') { echo 'active'; } ?>"><a href="{{url('/')}}/producttags/create"><i class="fa fa-circle-o"></i>Add Product Tag</a></li>
          </ul>
        </li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>