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
                            <th>Posted Date</th>
                            <th>SKU</th>
                            <th>Price/Unit</th>
                            <th>Expiry</th>
                            <th>Quantity</th>
                            <th>Total Cost</th>
                            <th>Unallocated Balance</th>
                            <th>Status</th>
                            <th>Buyer Payment</th>
                            <th>Pool Name</th>
                            <th>Destribution Restriction</th>
                            <th>Delivery Date</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($items as $t)
                            <tr>
                            <!--<td>{{$t->supplier_post_id}}</td>-->
                                <td>{{date("d M/y", strtotime($t->created_at))}}</td>

                                <td>{{$t->skuInfo->sku}}</td>
                                <td>${{number_format($t->price,2)}}</td>
                                <td>{{$t->expiry2}}</td>
                                <td>{{number_format($t->quantity)}} lbs</td>
                                <td>${{number_format($t->quantity * $t->price,2)}}</td>
                                <td>{{number_format(App\Libraries\ZnUtilities::UnallocatedBalance($t->supplier_post_id))}} lbs</td>
                                <td>{{$t->status}}</td>

                                <td></td>
                                <td>{{$t->poolName->pool_name}} [{{$t->poolName->distance}} KM]</td>
                                <td>@if($t->destribution_restrictions == 0) On @else Off @endif</td>
                                <td>July 31/17</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
@endsection
