@extends('layouts.master')

@section('content')
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
                                <tr>
									<?php
									$user_info = App\Models\User::find( $buyers->user_id ); ?>
                                    <td>{{$user_info->name}}</td>
                                    <td>{{$newDate = date("d M/y", strtotime($buyers->created_at))}}</td>
                                    <td>  @if($buyers->search_keywords)
                                            {{isset($buyers->category->category_name)?$buyers->category->category_name:''}}
                                            /{{App\Libraries\ZnUtilities::getProductName($buyers->search_keywords)}}
                                        @else
                                            {{isset($buyers->category->category_name)?$buyers->category->category_name:''}}
                                            /{{isset($buyers->product->product_name)?$buyers->product->product_name:''}}
                                        @endif</td>
                                    <td>${{number_format($buyers->price,2)}}</td>
                                    <td>{{number_format($buyers->quantity)}} lbs</td>
                                    <td>{{$buyers->expiry2}}</td>
                                    <td>{{$buyers->duration}}</td>
                                    <td>
                                        <a href="{{url('/')}}/showBankInfo/{{$buyers->buyer_post_id}}" target="_blank">Payment
                                            Info</a>
                                    </td>
                                </tr>
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
