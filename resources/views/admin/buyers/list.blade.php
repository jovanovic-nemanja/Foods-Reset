@extends('layouts.master')

@section('content')
	<?php use App\Libraries\ZnUtilities;  ?>
    <!--<div class="wrapper">

  <div class="content-wrapper">
     Content Header (Page header)
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">

        <form class="form-inline" action="{{url('/')}}/users/action" method="post" name="actions_form"
              id="actions_form">

            <div class="box box-danger">
                <div class='clearfix'>&nbsp;</div>


                <div class='table-responsive'>
                    <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                        <thead>
                        <tr>
                            <!--            <th>
                                         <button id="checkall" class="btn-info">Toggle</button>
                                        <input type="checkbox" id="checkall" class="check" value="" />
                                        </th>-->
                        <tr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Buyer Name</th>
                                    <th>Date Posted</th>
                                    <th>Category/ Product</th>
                                    <th>Max Price/Unit</th>
                                    <th>Max Quantity</th>
                                    <th>Expiry</th>
                                    <!--<th class="rating">Min Rating</th>-->
                                    <th>Status</th>
                                    <th>Payment Info</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($buyers as $b)
                                    <tr>
										<?php
										$user_info = App\Models\User::find( $b->user_id ); ?>
                                        <td><a href="{{url('/')}}/admin/buyer/{{$b->buyer_post_id}}"
                                               target="_blank">{{$user_info->name}}</a></td>
                                        <td>{{$newDate = date("d M/y", strtotime($b->created_at))}}</td>
                                        <td>  @if($b->search_keywords)
                                                {{isset($b->category->category_name)?$b->category->category_name:''}}
                                                /{{App\Libraries\ZnUtilities::getProductName($b->search_keywords)}}
                                            @else
                                                {{isset($b->category->category_name)?$b->category->category_name:''}}
                                                /{{isset($b->product->product_name)?$b->product->product_name:''}}
                                            @endif</td>
                                        <td>${{number_format($b->price,2)}}</td>
                                        <td>{{number_format($b->quantity)}} lbs</td>
                                        <td>{{$b->expiry2}}</td>
                                        <td>{{$b->duration}}</td>
                                        <td><a href="{{url('/')}}/showBankInfo/{{$b->buyer_post_id}}" target="_blank">Payment
                                                Info</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </section>
@endsection
