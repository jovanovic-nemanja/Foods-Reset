@extends('layouts.frontendTemplate')

@section('content')
	<?php $notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	use App\Libraries\ZnUtilities;
	?>
    <body class="">
    <main role="main-wrapper">
        <section role="register-page" class="py-4">
            <div class="container">
                <div class="row">
                    <div class="container">

                        <div class="col-sm-12">
                            <div class="row align-content-center">
                                <div class="col-sm-4 mb-4">
                                    <h3><span style="color:#4F81BD;">{{Auth::user()->company_name}}</span></h3>
                                    <h3><span style="color:#4F81BD;"> {{Auth::user()->address}} </span></h3>
                                </div>
                                <div class="col-sm-4 mb-4">
                                    <a href="{{url('/')}}">
                                        <img style="width:230px;" src="{{asset('img/logo-new.jpg')}}" alt=""/>
                                    </a>
                                </div>
                                <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                                    <div class="drop-menu ml-auto">
                                        <a href="javascript:void(0);"><img
                                                    src="{{asset('img/profile-pic.png')}}"/> <span>{{Auth::user()->name}}
                                                <i class="fa fa-angle-down"></i></span></a>
                                        <ul>
                                            <li><a href="{{url('/')}}/profile"><i class="fa fa-user"
                                                                                  aria-hidden="true"></i> My Public
                                                    Profile</a></li>
                                            <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My
                                                    Home</a></li>
                                            <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                          aria-hidden="true"></i>Posting
                                                    History <span style="color:red;"> {{$notification_count}} </span>
                                                </a></li>
                                            @if(Auth::user()->user_role == 2)
                                                <li><a href="{{url('/')}}/allallocation"><i class="fa fa-money"
                                                                                            aria-hidden="true"></i>All
                                                        Allocation </a></li>@endif
                                            <li><a href="{{url('/')}}/logout"><i class="fa fa-sign-out"
                                                                                 aria-hidden="true"></i> Sign off</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-12">


                            <form action="{{url('/')}}/allocation" method='post' class='form-control saveAllocation'>

                                {{ csrf_field() }}
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="9" style="text-align: center;">
                                            Quantity {{number_format($supplier_detail->quantity)}} lb
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Category/ Product</th>
                                        <!--<th>Quantity Required</th>-->
                                        <th>Supplier Type</th>
                                        <th>Allocation</th>
                                        <th>Supplier Price</th>
                                        <th>Unallocated Balance</th>
                                        <!--<th>ReAllocation</th>-->
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
										$buyer_post_detail = App\Models\BuyerPost::where( 'buyer_post_id', $sd->buyer_post_id )->first();
										$color = '';
										$classes = '';
										$buyer_requried[] = $sd->requried_quantity;
										$buyer_requried1[] = $sd->allocation;
										?>
                                        @if($sd->status == 'reject')
											<?php
											$color = 'grey';
											$classes = 'readonly disabled'
											?>
                                        @endif

                                        <tr style='background-color: <?php echo $color; ?>'>


											<?php $product_name = App\Models\Product::where( 'id', $sd->product_id )->first(); ?>
                                            <td>{{isset($sd->category->category_name)?$sd->category->category_name:''}}
                                                /{{ZnUtilities::getProductName($sd->product_id)}}</td>


                                        <!--<td>{{$sd->requried_quantity}} lb</td>-->
                                            <td>{{$supplier_detail->supplier_type}}</td>
                                            <td>{{number_format($sd->allocation)}} lbs</td>
                                            <td>${{number_format($supplier_detail->price,2)}}</td>
                                            <td>{{number_format(ZnUtilities::UnallocatedBalance($sd->supplier_post_id))}}</td>
                                        <!--<td><input type='text' {{$classes}} id="{{$sd->id}}"  class="reallocation reVal_{{$sd->id}}" value='{{$sd->reallocation}}'>&nbsp;<button name="" class="reall_btn_{{$sd->id}} btn-info" onclick="sendReallocation({{$sd->id}});" type="button" style="display: none;">Send</button></td>-->
                                            <td>Sent</td>
                                            <td class="rating">
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
                                    <!--<td>{{array_sum($buyer_requried)}} lb</td>-->
                                        <td>&nbsp;</td>
                                        <td>{{number_format(array_sum($buyer_requried1))}} lb</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <!--                                            <td>&nbsp;</td>
                                                                                    <td>&nbsp;</td>-->


                                    </tr>
                                    </tbody>
                                </table>
                                <!--                          <div class="col-lg-12" >
                                                           
                                                                    <button type="submit" style="width: auto;" class="btn btn-blue btn-block center-block">Send Notification</button>
                                                     
                                                          </div>-->

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
@section('js-file')
    <script src="{{ asset('js/supplier.js') }}"></script>
    <script src="{{ asset('js/pekeUpload.js') }}"></script>
    <script>
        function sendReallocation(aid) {

            var reVal = $(".reVal_" + aid).val();
            var confirm_action = confirm("Do you really want to Send " + reVal + " ReAllocation");
            if (confirm_action == true) {

                $.ajax({
                    url: url + "/reallocation/" + aid + "/" + reVal,
                    type: "GET",
                    success: function (result) {

                    }
                })

            }

        }

        $(document).on('keyup', ".reallocation", function (e) {

            var id = $(this).attr('id');
            var quantity = $(this).val();
            if (quantity > 0) {
                $(".reall_btn_" + id).show();
            }
            else {
                $(".reall_btn_" + id).hide();
            }
        });
    </script>
@endsection

@endsection
