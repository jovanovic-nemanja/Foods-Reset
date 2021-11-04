@extends('layouts.master')

@section('content')
	<?php
    use Illuminate\Support\Facades\Auth;
	use App\Libraries\ZnUtilities;
	$buyer_post = App\Models\BuyerPost::get()->count();
	$supplierPost = App\Models\SupplierPost::get()->count();
	$buyers1 = App\Models\User::where( 'user_role', '2' )->get()->count();
	$suppliers1 = App\Models\User::where( 'user_role', '3' )->get()->count();
	$supplier_allocation = App\Models\SupplierAllocation::with( 'skuInfo' )->orderBy( 'id', 'desc' )->get();
	?>
    <style type="text/css">
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            vertical-align: middle !important;
        }
    </style>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$suppliers1}}</h3>

                        <p>Total Supplier</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$buyers1}}<sup style="font-size: 20px"></sup></h3>

                        <p>Total Buyer</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$supplierPost}}</h3>

                        <p>Total Supplier Post</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$buyer_post}}</h3>

                        <p>Total Buyer Post</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->

                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">

                        <li class="pull-left header"><i class="fa fa-inbox"></i> All Allocation</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class='table-responsive'>
                            <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                                <thead>
                                <tr>
                                    <!--            <th>Id</th>-->
                                    <th>Items</th>
                                    <th>SKU</th>
                                    <th>Details</th>
                                    <th>Buyer</th>
                                    <!-- <th>Geographic boundaries</th>
                                    <th>Pickup</th>
                                    <th>Delivery windows</th>
                                    <th>Delivery Location</th>
                                    <th>Delivery Services</th> -->
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($supplier_allocation as $ta)
									<?php


									if(trim( $ta->status ) != "rejected"){

									$buyer = App\Models\BuyerPost::where( 'buyer_post_id', $ta->buyer_post_id )->with( 'userName' )->first();
									$supplier_post11 = App\Models\SupplierPost::where( 'supplier_post_id', $ta->supplier_post_id )->with( 'userInfo' )->first();    ?>
                                    <tr>
                                        <td>{{$ta->id}}</td>
                                        <td>{{$ta->skuInfo->sku}}</td>
                                    <!--
              Quantity:- {{$supplier_post11->quantity}} </br>
              Code Date:- {{$supplier_post11->expiry2}} </br>
              Min Price:- ${{$supplier_post11->price}} </br>
              Description:- {{$supplier_post11->description}} </br>-->
                                        <td>
                                            <div class="dropdown custom_select">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    See Detail
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <p class="dropdown-item">{{$supplier_post11->product_location}}</p>
                                                    <p class="dropdown-item">Buyer price: {{$buyer->buyer_bid}}</p>
                                                    <p class="dropdown-item">Supplier
                                                        price: {{$supplier_post11->list_price}}</p>
                                                </div>
                                            </div>
                                        <!--<button type='button' class="btn btn-blue btn-sm model1-1" data-target="#myModal_{{$ta->id}}" data-toggle="modal">
               {{$supplier_post11->product_location}} <br>
               Buyer price: {{$buyer->buyer_bid}} <br>
               Supplier price: {{$supplier_post11->list_price}}
                                                </button>-->
                                        </td>

                                        <td>
                                            <div class="dropdown custom_select">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    See Detail
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <p class="dropdown-item">Buyer Name: {{$buyer->username->name}}</p>
                                                    <p class="dropdown-item">Geographic
                                                        boundaries: {{$buyer->username->geo_boundary}}</p>
                                                    <p class="dropdown-item">Pickup: {{$buyer->username->pikup}}</p>
                                                    <p class="dropdown-item">Delivery
                                                        windows: {{$buyer->username->delivery_window}}
                                                        - {{$buyer->username->delivery_window_to}}</p>
                                                    <p class="dropdown-item">Delivery
                                                        Location: {{$buyer->username->delivery_location}}</p>
                                                    <p class="dropdown-item">Delivery
                                                        Services: {{$buyer->username->delivery_service}}</p>
                                                </div>
                                            </div>

                                        <!--<button type='button' class="btn btn-blue btn-sm model1-1" data-target="#myModal2_{{$ta->id}}"  data-toggle="modal">
              Buyer Name: {{$buyer->username->name}} <br>
              Geographic boundaries: {{$buyer->username->geo_boundary}} <br>
              Pickup: {{$buyer->username->pikup}} <br>
              Delivery windows: {{$buyer->username->delivery_window}} - {{$buyer->username->delivery_window_to}} <br>
              Delivery Location: {{$buyer->username->delivery_location}} <br>
              Delivery Services: {{$buyer->username->delivery_service}}

                                                </button>-->
                                        </td>

                                    <!-- <td>{{$buyer->username->geo_boundary}}</td>
           <td>{{$buyer->username->pikup}}</td>
           <td>{{$buyer->username->delivery_window}} - {{$buyer->username->delivery_window_to}}</td>
           <td>{{$buyer->username->delivery_location}}</td>
           <td>{{$buyer->username->delivery_service}}</td> -->
                                        <td> ${{$buyer->buyer_bid}}</td>
                                        <td>
                                            <select id="supplier_post_status" name="bulk_action"
                                                    data-post_id="{{$ta->id}}" class="form-control supplier_post_status"
                                                    placeholder="Select Action">
                                                <option {{$ta->payment_status == 'pending'?'selected="selected"':''}} value="pending">
                                                    Notified
                                                </option>
                                                <option {{$ta->payment_status == 'Payment Made'?'selected="selected"':''}} value="Payment Made">
                                                    Payment Made
                                                </option>
                                                <option {{$ta->payment_status == 'Completed'?'selected="selected"':''}} value="Completed">
                                                    Completed
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
									<?php } ?>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content-wrapper -->
    <footer class="main-footer" style="margin-left: 0px;">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2017 <a href="https://adminlte.io">Resetfoods</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    <!-- ./wrapper -->
    @foreach($supplier_allocation as $w)
        <div class="modal fade" id="myModal_{{$w->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Detail</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

					<?php $pool_ids = explode( ',', $supplier_post11->pool );
					$pools1 = App\Models\Pool::whereIn( 'id', $pool_ids )->get()->pluck( 'pool_name' )->toArray();
					$buyer = App\Models\BuyerPost::where( 'buyer_post_id', $ta->buyer_post_id )->with( 'userName' )->first();

					$supplier_post11 = App\Models\SupplierPost::where( 'supplier_post_id', $ta->supplier_post_id )->with( 'userInfo' )->first();

					?>


                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <p>{{$supplier_post11->skuInfo->sku}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <p>{{$supplier_post11->quantity}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Expiry</label>
                                    <p>{{$supplier_post11->expiry}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Supplier Description</label>
                                    <p>{{$supplier_post11->description}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Pool</label>
                                    <p>{{implode(',',$pools1)}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Buyer Name</label>
                                    <p>{{$buyer->userName->name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Buyer Bid</label>
                                    <p>${{$buyer->buyer_bid}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Buyer Bid Quantity</label>
                                    <p>${{$buyer->quantity}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($supplier_allocation as $w)
        <div class="modal fade" id="myModal2_{{$w->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Detail</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

					<?php
					$buyer = App\Models\BuyerPost::where( 'buyer_post_id', $w->buyer_post_id )->with( 'userName' )->first();
					$pool_ids1 = explode( ',', $buyer->userName->pool );
					$pools11 = App\Models\Pool::whereIn( 'id', $pool_ids1 )->get()->pluck( 'pool_name' )->toArray();
					$supplier_post11 = App\Models\SupplierPost::where( 'supplier_post_id', $ta->supplier_post_id )->with( 'userInfo' )->first();
					?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Buyer Name</label>
                                    <p>{{$buyer->userName->name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Buyer Email</label>
                                    <p>{{$buyer->userName->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <p>{{$buyer->userName->mobile}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Buyer Address</label>
                                    <p>{{$buyer->userName->address}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Pool</label>
                                    <p>{{implode(',',$pools11)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@section('js-file')
    <script>
        url = 'http://resetfoods.com/resetfoodv5/';
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //alert(this.responseText);
                        window.location.href = 'http://resetfoods.com/resetfoodv5/dashboard';
                    }
                };
                xmlhttp.open("GET", str, true);
                xmlhttp.send();
            }
        }
        $(document).ready(function () {
            $(".supplier_post_status").change(function () {
                var typ = $(this).val();
                var aid = $(this).data('post_id');
                var confirm_action = confirm("Do you really want to Change Status");
                if (confirm_action == true) {
                    window.location.href = url + "/update/post/staus/" + typ + "/" + aid;
                }
            });
        });
    </script>
@endsection
@endsection
 