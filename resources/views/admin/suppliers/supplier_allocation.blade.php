@extends('layouts.master')

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	?>
    <section class="content">
    <!--<form class="form-inline" action="{{url('/')}}/users/action" method="post" name="actions_form" id="actions_form">-->
        <div class="box box-danger">
            <div class='clearfix'>&nbsp;</div>

            <!--<div class='table-responsive'>-->
            <!--                <div class="row">
                                <div class="col-md-12">-->
            @if($is_save == 1)
                <form action="{{url('/')}}/allocation" method='post' class='form-control saveAllocation'>
                    {{ csrf_field() }}
                    <div class='table-responsive'>
                        <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                            <thead>
                            <tr>
                                <th style='text-align: center;' colspan="10">
                                    Quantity {{number_format($supplier_detail->quantity)}} lbs ,&nbsp;&nbsp;
                                    Allocation {{App\Libraries\ZnUtilities::UnallocatedBalance($supplier_detail->supplier_post_id) - $supplier_detail->quantity}}
                                    lbs,&nbsp;&nbsp; Unallocated
                                    Balance {{number_format(App\Libraries\ZnUtilities::UnallocatedBalance($supplier_detail->supplier_post_id))}}
                                    lbs
                                </th>
                            </tr>
                            <tr>
                                <th>Category/ Product</th>
                                <th>Price</th>
                                <th>Expiry</th>

                                <th>Quantity Required</th>
                                <th>Supplier Type</th>
                                <th>Allocation</th>
                                <th>ReAllocation</th>
                                <th>Email Notification</th>

                                <th>Rating</th>
                                <th>Comments</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$buyer_requried = array();
							$buyer_requried1 = array();
							?>
                            @foreach($allocations as $sd)
								<?php
								$buyer_name = App\Models\User::where( 'id', $sd->buyer_id )->first();
								$buyer_post = App\Models\BuyerPost::where( 'buyer_post_id', $sd->buyer_post_id )->first();
								$supplier_post = App\Models\SupplierPost::where( 'supplier_post_id', $sd->supplier_post_id )->first();
								$color = '';
								$classes = '';
								if ( $sd->parent_id == 0 ) {
									$buyer_requried[] = $sd->requried_quantity;
								}
								if ( $sd->status != 'reject' ) {
									if ( $sd->parent_id > 0 ) {
										$buyer_requried1[] = $sd->reallocation;
									} else {
										$buyer_requried1[] = $sd->allocation;
									}
								}
								?>
                                @if($sd->status == 'reject')
									<?php
									$color = 'grey';
									$classes = 'readonly disabled'
									?>
                                @endif

                                <tr style='background-color: <?php echo $color; ?>'>

                                    <td>{{isset($sd->category->category_name)?$sd->category->category_name:''}}
                                        /{{App\Libraries\ZnUtilities::getProductName($sd->product_id)}}</td>


                                    <td>${{number_format($buyer_post->price,2)}}</td>
                                    <td>{{$buyer_post->expiry2}}</td>

                                <!--<td>{{App\Libraries\ZnUtilities::getProductName($sd->product_id)}}</td>-->


                                    <td>{{number_format($sd->requried_quantity)}} lbs</td>
                                <!--<td>{{$buyer_name->name}}</td>-->
                                    <td>{{$supplier_post->supplier_type}}</td>
                                    <td>{{number_format($sd->allocation)}} lbs</td>
                                    <td>{{number_format($sd->reallocation)}}</td>
                                <!--<td><input type='text' {{$classes}} id="{{$sd->id}}"  class="reallocation reVal_{{$sd->id}}" value='{{$sd->reallocation}}'>&nbsp;<button name="" class="reall_btn_{{$sd->id}} btn-info" onclick="sendReallocation({{$sd->id}});" type="button" style="display: none;">Send</button></td>-->
                                    <td>Sent</td>

                                    <td>
                                        @for($i=1; $i<= $sd->rating; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </td>
                                    <td>{{$sd->comments}}</td>
                                    <td>{{$sd->status}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Total</td>

                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>{{number_format(array_sum($buyer_requried))}} lbs</td>
                                <td>&nbsp;</td>
                                <td>{{number_format(array_sum($buyer_requried1))}} lbs</td>

                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            @else
                <form action="{{url('/')}}/allocation/{{$supplier_detail->supplier_post_id}}" method='post'
                      class='form-control saveAllocation'>

                    {{ csrf_field() }}
                    <div class='table-responsive'>
                        <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                            <thead>
                            <tr>
                                <th colspan="8" style="text-align:center;">
                                    Quantity {{number_format($supplier_detail->quantity)}} lb ,&nbsp;&nbsp;
                                    Allocation {{App\Libraries\ZnUtilities::UnallocatedBalance($supplier_detail->supplier_post_id) - $supplier_detail->quantity}}
                                    lb,&nbsp;&nbsp; Unallocated
                                    Balance {{number_format(App\Libraries\ZnUtilities::UnallocatedBalance($supplier_detail->supplier_post_id))}}
                                    lb
                                </th>
                            </tr>
                            <tr>
                                <th>Category/ Product</th>
                                <th>Price</th>
                                <th>Expiry</th>
                                <!--<th>Keywords</th>-->
                                <th>Quantity Required</th>
                                <th>Supplier Type</th>
                                <th>Allocation</th>
                                <th>ReAllocation</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$buyer_requried = array();
							$buyer_quantity2 = array();
							?>
                            @foreach($buyer_details as $sd)
								<?php $buyer_name = App\Models\User::where( 'id', $sd->user_id )->first(); ?>
                                <tr>
                                    @if($is_other_post == 1)
										<?php $buyer_post_id = $sd->id; ?>

                                        <input type="hidden" name="buyer_post[{{$buyer_post_id}}]"
                                               value="{{$buyer_post_id}}">
                                        <input type="hidden" name="supplier_post_id" value="{{$supplier_detail->id}}">
                                        <input type="hidden" name="is_other_post" value="{{$is_other_post}}">
                                        <input type="hidden" name="product_id" value="{{$sd->product_name}}">
                                        <input type="hidden" name="category_id" value="{{$sd->category_id}}">
                                    @else
										<?php $buyer_post_id = $sd->buyer_post_id; ?>

                                        <input type="hidden" name="supplier_post_id"
                                               value="{{$supplier_detail->supplier_post_id}}">
                                        <input type="hidden" name="category_id" value="{{$sd->category_id}}">
                                        <input type="hidden" name="is_other_post" value="{{$is_other_post}}">
                                        <input type="hidden" name="buyer_post[{{$buyer_post_id}}]"
                                               value="{{$buyer_post_id}}">
                                    @endif

                                    <input type="hidden" name="buyer_id[{{$buyer_post_id}}]" value="{{$sd->user_id}}">
                                    <input type="hidden" name="supplier_id" value="{{$supplier_detail->user_id}}">

                                    <td>  @if($sd->search_keywords)
                                            {{isset($sd->category->category_name)?$sd->category->category_name:''}}
                                            /{{App\Libraries\ZnUtilities::getProductName($sd->search_keywords)}}
                                            <input type="hidden" name="product_id[{{$buyer_post_id}}]"
                                                   value="{{$sd->search_keywords}}">
                                        @else
                                            <input type="hidden" name="product_id[{{$buyer_post_id}}]"
                                                   value="{{$sd->product_id}}">
                                            {{isset($sd->category->category_name)?$sd->category->category_name:''}}
                                            /{{isset($sd->product->product_name)?$sd->product->product_name:''}}
                                        @endif</td>

                                    <td>{{$sd->price}}</td>
                                    <td>{{$sd->expiry2}}</td>


                                    <td>{{$sd->quantity}} lb</td>
                                    <td>{{$buyer_name->name}}</td>
                                    <input type="hidden" name="quantity[{{$buyer_post_id}}]" value="{{$sd->quantity}}">
									<?php
									$buyer_requried[] = $sd->quantity;
									$buyer_quantity1 = array_sum( $buyer_requried );
									if ($buyer_quantity1 < $supplier_detail->quantity) {
									?>
                                    <input type="hidden" name="allocation[{{$buyer_post_id}}]"
                                           value="{{$sd->quantity}}">
                                    <td>{{$sd->quantity}} lb</td>
									<?php
									$buyer_quantity2[] = $sd->quantity;
									} else {
									$buyer_quantity3 = $supplier_detail->quantity - array_sum( $buyer_quantity2 );
									$buyer_quantity2[] = $buyer_quantity3;
									?>
                                    <input type="hidden" name="allocation[{{$buyer_post_id}}]"
                                           value="{{$buyer_quantity3}}">
                                    <td>{{$buyer_quantity3}} lb</td>
									<?php
									}
									?>
                                    <td><input type='text' value=''></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Total</td>

                                <td>&nbsp;</td>

                                <td>&nbsp;</td>
                                <td>{{array_sum($buyer_requried)}} lb</td>
                                <td>&nbsp;</td>
                                <td>{{array_sum($buyer_quantity2)}} lb</td>
                                <td><input type='text' value=''></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        @if(count($buyer_details) > 0)
                            <button type="submit" style="width: auto; display:none;"
                                    class="btn btn-primary center-block saveAllocationData">Send Notification
                            </button>
                        @endif
                    </div>
                </form>
            @endif
        </div>
    </section>

@section('js-file')
    <script src="{{ asset('admin/js/supplier.js') }}?v={{time()}}"></script>
    <script>
        $(document).ready(function () {
            $(".saveAllocationData").click();
        });
    </script>
@endsection

@endsection
