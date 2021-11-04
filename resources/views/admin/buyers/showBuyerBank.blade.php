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
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Buyer Name</th>
                                    <th>Category/ Product</th>
                                    <th>Max Quantity</th>
                                    <th>Allocation</th>
                                    <th>Buyer Price</th>
                                    <th>Buyer Total Price</th>
                                    <th>Supplier Price</th>
                                    <th>Supplier Total Price</th>

                                    <th>Supplier Bank Info</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($bank_details as $b)
                                    <tr>
										<?php
										$user_info = App\Models\User::find( $b->buyer_id );
										$buyer_post = App\Models\BuyerPost::where( 'buyer_post_id', $b->buyer_post_id )->with( 'category' )->first(); ?>
                                        <td>{{$user_info->name}}</td>

                                        <td>  @if($buyer_post->search_keywords)
                                                {{isset($buyer_post->category->category_name)?$buyer_post->category->category_name:''}}
                                                /{{App\Libraries\ZnUtilities::getProductName($buyer_post->search_keywords)}}
                                            @else
                                                {{isset($buyer_post->category->category_name)?$buyer_post->category->category_name:''}}
                                                /{{App\Libraries\ZnUtilities::getProductName($buyer_post->product_id)}}
                                            @endif</td>
                                        <td>{{number_format($b->quantity)}} lbs</td>
                                        <td>{{number_format($b->allocation)}} lbs</td>
                                        <td>${{number_format($b->buyer_price,2)}}</td>
                                        <td>${{number_format($b->buyer_total,2)}}</td>
                                        <td>${{number_format($b->supplier_price,2)}}</td>
                                        <td>%{{number_format($b->supplier_total,2)}}</td>
                                        <td><?php echo nl2br( $b->bank_detail ); ?></td>
                                        <td>{{$b->status}}</td>
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
