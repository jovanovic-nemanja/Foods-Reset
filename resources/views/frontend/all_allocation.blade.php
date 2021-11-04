@extends('layouts.frontendTemplate')

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	$durations = array();
	$price = array();
	$remainingdays = array();
	$quantity = array();
	$buyer = App\Models\BuyerPost::orderBy( 'buyer_post_id', 'desc' )->where( 'user_id', Auth::user()->id )->with( 'product' )->get();
	$items = App\Models\SupplierPost::with( 'product' )->orderBy( 'supplier_post_id', 'desc' )->get();
	$category = App\Models\Category::get();
	$setting = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	?>

    <body class="">
    <main role="main-wrapper">
        <section role="register-page" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row align-content-center">
                            <div class="col-sm-4 mb-4">
                                <h3><span style="color:#4F81BD;">{{Auth::user()->company_name}}</span></h3>
                                <h3><span style="color:#4F81BD;"> {{Auth::user()->address}} </span></h3>
                            </div>
                            <div class="col-sm-4 mb-4">
                                <a href="{{url('/')}}">
                                    <img style="width:230px;" src="{{asset('img/logo-new.jpg')}}" alt=""/></a>
                            </div>
                            <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                                <div class="drop-menu ml-auto">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('img/profile-pic.png')}}"/>
                                        <span>{{Auth::user()->name}} <i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i>
                                                My Public Profile</a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-usd" aria-hidden="true"></i> My Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                      aria-hidden="true"></i>Notifications
                                                <span style="color:red;"> {{$notification_count}} </span> </a></li>
                                        @if(Auth::user()->user_role == 2)
                                            <li><a href="{{url('/')}}/allallocation"><i class="fa fa-money"
                                                                                        aria-hidden="true"></i>All
                                                    Allocation </a></li>@endif
                                        <li><a href="{{url('/')}}/logout"><i class="fa fa-sign-out"
                                                                             aria-hidden="true"></i> Sign off</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class='row'>
                            <div class='col-sm-10'><h6>All Allocation Detail</h6></div>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>SKU</th>
                                <th>Price/Unit</th>
                                <th>Expiry</th>
                                <th>Quantity</th>
                                <th>Allocation</th>
                                <th>Re Allocation</th>
                                <th>Rating</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allocation as $a)
                                <tr>
                                    <td>{{$a->id}}</td>
									<?php
									$buyer_post = App\Models\BuyerPost::where( 'buyer_post_id', $a->buyer_post_id )->with( 'product' )->first();
									$supplier_post = App\Models\SupplierPost::where( 'supplier_post_id', $a->supplier_post_id )->first();

									?>
                                    <td>{{$buyer_post->sku}}</td>
                                    <td>{{number_format($supplier_post->price,2)}}</td>
                                    <td>{{$buyer_post->expiry2}}</td>
                                    <td>{{number_format($buyer_post->quantity)}}</td>
                                    <td>{{number_format($a->allocation)}}</td>
                                    <td>{{number_format($a->reallocation)}}</td>
                                    <td class="rating">
                                        @if($a->status == 'accept')
                                            <a href="javascript:void(0);" class="btn" data-toggle="modal"
                                               data-target="#rating_modal">
                                                @if($a->rating > 0)
                                                    @for($i=1; $i<= $a->rating; $i++)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    @endfor
                                                @else
                                                    <span Title='Click here'>Feedback</span>
                                                @endif
                                            </a>
                                        @endif
                                    </td>
                                    @if(Auth::user()->user_role == 3)
                                        <td><a style='color:blue;' target='_blank'
                                               href="{{url('/')}}/addbank/detail/{{$a->supplier_post_id}}/{{$a->id}}">Add
                                                Bank Detail</a></td>
                                    @endif
                                    <td>
                                        <select class='form-control allocation_status allocation_status_{{$a->id}}'
                                                id='{{$a->id}}' @if(Auth::user()->user_role == 2) disabled
                                                readonly @endif>
                                            <option {{$a->status == 'pending'?'selected="selected"':''}} value='pending'>
                                                Pending
                                            </option>
                                            <option {{$a->status == 'accept'?'selected="selected"':''}} value='accept'>
                                                Accept
                                            </option>
                                            <option {{$a->status == 'reject'?'selected="selected"':''}} value='reject'>
                                                Reject
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
@section('js-file')
    <script>
        $(document).ready(function () {
            var last_val = $(".allocation_status").val();
            $(".allocation_status").change(function () {
                var status_val = $(this).val();
                if (status_val == 'pending') {
                    alert('Please Select Accept or Reject');
                    return false;
                }
                var allocation_id = $(this).attr('id');
                var confirm_action = confirm("Do you really want to " + status_val + " this Allocation");
                if (confirm_action == true) {
                    window.location.href = url + "/buyer/allocation/" + status_val + "/" + allocation_id;
                } else {
                }
            });
        });
    </script>
@endsection
@foreach($allocation as $a)
    <div class="modal fade" id="rating_modal_{{$a->id}}" tabindex="-1" role="dialog" style='margin-top: 20px;'
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" role="form" method="POST" action="{{url('/')}}/addrating/{{$a->id}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group" style="font-size:13px;">
                            <label>Rating</label>
                            <select id="" class="custom-select form-control" name="rating">
                                <option {{$a->rating == '1'?'selected="selected"':''}} value="1">1 Star</option>
                                <option {{$a->rating == '2'?'selected="selected"':''}} value="2">2 Star</option>
                                <option {{$a->rating == '3'?'selected="selected"':''}} value="3">3 Star</option>
                                <option {{$a->rating == '4'?'selected="selected"':''}} value="4">4 Star</option>
                                <option {{$a->rating == '5'?'selected="selected"':''}} value="5">5 Star</option>
                            </select>
                        </div>
                        <div class="form-group" style="font-size:13px;">
                            <label>Comment</label>
                            <textarea class="form-control" name="comments" value="" id=''
                                      placeholder="Type Your Comments" type="text">{{$a->comments}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection