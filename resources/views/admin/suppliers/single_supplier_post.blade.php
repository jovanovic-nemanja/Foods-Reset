@extends('layouts.master')

@section('content')
	<?php use App\Libraries\ZnUtilities; ?>

    <!-- Main content -->
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/users/action" method="post" name="actions_form"
              id="actions_form">
            <div class="box box-danger">

            <!--    <div class="box-body">
         <div class="row">
             
             <div class="col-md-4">
                     Actions
                     <div class="form-group">
                        <select id="bulk_action" name="bulk_action" class="form-control" placeholder="Select Action"  >
                            <option value="">Select An Action</option>
                            <option value="blocked">Block Selected User</option>
                            <option value="active">Activate Selected User</option>
                            <option value="delete">Delete Selected User</option>
                        </select>
                     </div>
                 
             </div>
             
             
                <div class="col-md-4">
                  
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                
                        <div class="input-group">
                            <input type="text" class="form-control"  name="search" value="{{isset($search)?$search:''}}" placeholder="Search User" aria-describedby="basic-addon2">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find User</button>
                            </span>
                        </div>
                      
                </div>

                <div class="col-md-2">
                    <a href="{{url('/')}}/users/create" class="btn btn-primary btn-flat">Add New User</a>
                </div>
             @if(isset($search))
                <div class="col-md-2">
                    <a href="{{url('/')}}/users" class="btn btn-info btn-flat">Show All User</a>
                </div>  
                 @endif
                    </div>
            </div>    -->

                <div class='clearfix'>&nbsp;</div>


                <div class='table-responsive'>
                    <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                        <thead>
                        <tr>
                            <!--            <th>
                                         <button id="checkall" class="btn-info">Toggle</button>
                                        <input type="checkbox" id="checkall" class="check" value="" />
                                        </th>-->

                            <!--<th>Item</th>-->
                            <th>Posted Date</th>
                            <th>Supplier Type</th>
                            <th>Category/ Product</th>
                            <th>Price/Unit</th>
                            <th>Expiry</th>
                            <th>Quantity</th>
                            <th>Total Cost</th>
                            <th>Unallocated Balance</th>
                            <!--                                        <th>Keywords</th>-->
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Buyer Payment</th>
                            <th>Delivery Date</th>
                            <th>Action</th>
                            <th>&nbsp;</th>


                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                        <!--<td>{{$items->supplier_post_id}}</td>-->
                            <td>{{date("d M/y", strtotime($items->created_at))}}</td>
                            <td>{{$items->supplier_type}}</td>
                            <td>
                                @if($items->search_keywords)
                                    {{isset($items->category->category_name)?$items->category->category_name:''}}
                                    /{{ZnUtilities::getProductName($items->search_keywords)}}
                                @else
                                    {{isset($items->category->category_name)?$items->category->category_name:''}}
                                    /{{isset($items->product->product_name)?$items->product->product_name:''}}
                                @endif
                            </td>

                            <td>${{number_format($items->price,2)}}</td>
                            <td>{{$items->expiry2}}</td>
                        <!--<td>{{date("d M/y", strtotime($items->expiry))}}</td>-->
                            <td>{{number_format($items->quantity)}} lbs</td>
                            <td>${{number_format($items->quantity * $items->price,2)}}</td>
                            <td>{{number_format(App\Libraries\ZnUtilities::UnallocatedBalance($items->supplier_post_id))}}
                                lbs
                            </td>
                            <td>{{$items->status}}</td>
                            <td><?php echo nl2br( App\Libraries\ZnUtilities::rating( $items->supplier_post_id ) ); ?></td>
                            <td></td>
                            <td>July 31/17</td>
                            <td><a href="{{url('/')}}/admin/allocation/{{$items->supplier_post_id}}"
                                   class="">Allocation</a></td>
                            <td><a href="{{url('/')}}/showSupplierBankInfo/{{$items->supplier_post_id}}"
                                   target="_blank">Payment Info</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
@endsection
