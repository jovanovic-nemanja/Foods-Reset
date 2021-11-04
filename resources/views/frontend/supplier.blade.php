@extends('layouts.frontendTemplate')

@section('css-file')
    <link href="{{ asset('css/jquery.stickytable.min.css') }}?v={{time()}}" rel="stylesheet">
    <link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
	<link href="{{ asset('select/sumoselect.css') }}?v={{time()}}" rel="stylesheet">


    <style type="text/css">
		.opt
		{
			display:none;
		}
		.group {
			position: relative;
		}
		li.group:before {
			content: '▼';
			position: absolute;
			font-size: 12px;
			top: 3;
			left: 9;
		}
		.SumoSelect > .optWrapper > .options li.group > label
		{
			cursor: default;
			padding: 0px 27px;
			font-weight: normal;
        }
        .dropselect
        {
            padding: 7px !important;
            display: contents;
        }
        .orderdurationcss{
            height:36px !important;
        }

       /* .chosen-container-multi .chosen-choices li.search-choice {

            width: 90%;
        }*/

		.chosen-container-multi .chosen-choices li.search-choice
		{
			background-color: #fff!important;
			color: #666!important;
			padding: 3px 20px 3px 2px!important;
			float: left !important;
			display: inline!important;
			border: 1px solid #f1f1f1!important;
			border-radius: 5px!important;
		}
        .search-field {
            clear: both;
        }

        .chosen-search-input {
            width: 100% !important
        }

        .table-bordered {
            border: none;
        }

        #instantbookingjt_chosen {
            /*  margin-top:6px; */

        }

        #instantbookingjt_chosen .chosen-results li {

        }

        #instantbookingjt_chosen {
            width: 200px !important;
            min-height: 18px !important;
            height: auto !important;
        }

        #instantbookingjt_chosen ul li input {

            border-radius: 4px;
            padding: 15px;
            border: 1px solid rgb(217, 217, 217) !important;
        }

        #box_body1 tr td {
            vertical-align: top;
        }

        .supp_post_container {
            min-height: 400px;

        }

        .sticky-table {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 1px 1.5px #b3b3b3;
        }

        .chosen-container-multi .chosen-results {
            background-color: #f2f2f2;
        }

        .chosen-container .chosen-results li {
            padding: 5px 5px;
            line-height: 8px;
        }
		.count_selct {
			width: 100%;
			border: 1px solid #ccc;
			padding: 12px 20px;
			font-size: 12px;
			font-weight: normal;
		}
		.selected_count {
			margin: 12px 10px;
			width: 180px;
		}
		.selected_count {
			cursor: pointer;
		}
    </style>
@endsection




@section('content')
	<?php

	use App\Libraries\ZnUtilities;

	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();
	$DisEst = App\Models\DistributionEstriction::where( 'user_id', Auth::user()->id )->first();

	$setting = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$pools = App\Models\Pool::orderBy( 'pool_type', 'desc' )->get();
	foreach($pools as $pool)
	{
		if($pool->pool_type==1)
		{
			$ref_pools[$pool->pool_type][$pool->id]["name"] = $pool->pool_name ;
			$ref_pools[$pool->pool_type][$pool->id]["id"] = $pool->id ;
			$ref_pools[$pool->pool_type][$pool->id]["distance"] = $pool->distance ;

		}
		if($pool->pool_type==2)
		{
			$ref_pools[$pool->pool_type][$pool->id]["name"] = $pool->pool_name ;
			$ref_pools[$pool->pool_type][$pool->id]["id"] = $pool->id ;
			$ref_pools[$pool->pool_type][$pool->id]["distance"] = $pool->distance ;
		}
		if($pool->pool_type==3)
		{
			$ref_pools[$pool->pool_type][$pool->id]["name"] = $pool->pool_name ;
			$ref_pools[$pool->pool_type][$pool->id]["id"] = $pool->id ;
			$ref_pools[$pool->pool_type][$pool->id]["distance"] = $pool->distance ;
		}
	}
	//echo "<pre>";
	//	print_r($ref_pools);
	//echo "</pre>";


	?>
    <style>
        .tdyellow {
            background: #f5f909 !important;
            color: black !important
        }

        .tdorange {
            background: #f7a902 !important;
            color: black !important
        }

        .tdgreen {
            background: #92fc92 !important;
            color: black !important
        }

        .tablexx tr > td, th {
            padding: 4px
        }

        .chosen-container.chosen-container-multi {
            width: auto !important;
            height: 40px !important
        }

        .chosen-container-multi .chosen-choices {
            padding: 0px !important;
            border: unset !important
        }

        .tablexx {
            width: 100% !important
        }

        .tdgrey {
            background: #f2f2f2 !important;
        }
    </style>

    <body class="">
    <main role="main-wrapper">
        <section role="register-page" class="py-4">
            <div class="container">
                <div class="row">
                    <!--<div class="row">-->
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
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('img/profile-pic.png')}}"/>
                                        <span>{{Auth::user()->name}}<i class="fa fa-angle-down"></i></span></a>
                                    <ul>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i>
                                                My Public Profile</a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                      aria-hidden="true"></i>Posting
                                                History <span style="color:red;"> {{$notification_count}} </span> </a>
                                        </li>
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

                    <div class="col-md-12">
                        <div class="row">
                            <h3 style="margin-left: 36%;">Supplier Home Page</h3>
                            <div class="sticky-table sticky-headers sticky-ltr-cells" style="min-width: 100%; ">

                                <table class="tablexx table-stripedxx table-bordered">
                                    <thead>
                                    <tr class="sticky-row">
                                        <th colspan="9" class="tdgrey">&nbsp;</th>
                                        <th colspan="2" class="tdorange">Initial offer</th>
                                        <th colspan="3" class="tdgreen">Customer Offer</th>
                                        <th colspan="6" class="tdgrey">&nbsp;</th>
                                    </tr>
                                    <tr class="sticky-row">
                                        <th class="tdyellow">Category</th>
                                        <th class="tdyellow">Item</th>
                                        <th class="tdyellow">Description</th>
                                        <th class="tdyellow">Unit Per Case</th>
                                        <th class="tdyellow">Net Weight(LBS)</th>
                                        <th class="tdyellow">Location</th>
                                        <th class="tdyellow">Expiry Date</th>
                                        <th class="tdyellow">Quantity</th>
                                        <th class="tdyellow">List Price</th>
                                        <th class="tdorange">Per case/mod</th>
                                        <th class="tdorange">Per unit</th>
                                        <th class="tdgreen">Bid</th>
                                        <th class="tdgreen"> Quantity</th>
                                        <th class="tdgreen"> Comments</th>
                                        <th class="tdgrey"> Logistics</th>
                                        <th class="tdgrey">Buyer Payment</th>
                                        <th class="tdgrey" style="width:70px;">Status</th>
                                        <th class="tdgrey">Action</th>
                                        <th class="tdgrey">Quantity Remaining</th>
                                        <th class="tdgrey">Reissue</th>
                                    </tr>
                                    </thead>
                                    <tbody>

									<?php
									$j = 0;
									?>
                                    @foreach($items as $t )
                                        <?php
                                        $buyer = App\Models\BuyerPost::where( 'supplier_post_id', $t->supplier_post_id )->where( 'is_low_bid', '0' )->orderBy( 'buyer_bid', 'DESC' )->with( 'userName' )->first();

										$j ++;
                                        $id = $j;

										?>
                                        <tr>
                                            <td id="su_cat_<?php echo $j;?>">{{$t->category}}</td>
                                            <td id="su_sku_<?php echo $j;?>">{{$t->skuInfo->sku}}</td>
                                            <td id="su_description_<?php echo $j;?>">{{$t->description}}</td>
                                            <td id="su_unit_per_case_<?php echo $j;?>">{{number_format($t->unit_per_case)}}</td>
                                            <td id="su_net_weight_<?php echo $j;?>">{{number_format($t->net_weight,2)}}</td>
                                            <td id="su_product_location_<?php echo $j;?>">{{$t->product_location}}</td>
                                            <td id="su_expiry_<?php echo $j;?>">{{$t->expiry}}</td>
                                            <td id="su_quantity_<?php echo $j;?>">{{number_format($t->quantity)}}</td>
                                            <td id="su_list_price_<?php echo $j;?>">
                                                ${{number_format($t->list_price,2)}}</td>
                                            <td id="su_per_case_price_<?php echo $j;?>">
                                                ${{number_format($t->per_case_price,2)}}</td>
                                            <td id="su_price_<?php echo $j;?>">${{number_format($t->price,2)}}</td>
                                            <td id="su_buyer_<?php echo $j;?>">@if($buyer)
                                                    ${{number_format($buyer->buyer_bid,2)}}
                                                @endif</td>
                                            <td id="su_buyer_qty_<?php echo $j;?>">@if($buyer)
                                                    {{number_format($buyer->buyer_bid_quantity)}}
                                                @endif</td>
                                            <td id="su_buyercomment_<?php echo $j;?>">@if($buyer)
                                                    {{$buyer->buyer_bid_comment}}
                                                @endif</td>
                                            <td>
                                            <?php
                                            $buyer = App\Models\BuyerPost::where( 'supplier_post_id', $t->supplier_post_id )->where( 'is_low_bid', '0' )->orderBy( 'buyer_bid', 'DESC' )->with( 'userName' )->first();

                                            $j ++;
                                            $id = $j;
                                            ?>
                                                @foreach($userinfo as $users)
                                                @if ($buyer)
                                                    @if ($users->id == $buyer->user_id)
                                                        <!-- {{$users->name}} -->
                                                        <div class="dropdown custom_select">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                See Detail
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <p class="dropdown-item">Company: {{$users->company_name}}</p>
                                                                <p class="dropdown-item">address: {{$users->address}}</p>
                                                                <p class="dropdown-item">Contact name/number: {{$users->name}}/
                                                                    @if ($users->mobile != "")
                                                                        {{$users->mobile}}
                                                                    @else
                                                                        Nothing
                                                                    @endif
                                                                    </p>
                                                                <p class="dropdown-item">Loading Dock Type: {{$users->delivery_service}}</p>
                                                                <p class="dropdown-item">Delivery Window: {{$users->delivery_window}}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                                @endforeach
                                            </td>

                                            <td id="su_buyer_status_<?php echo $j;?>">
                                                @if($buyer)
                                                    @if($t->status!='rejected')
                                                        {{$buyer->payment_status}}
                                                    @endif
                                                @else
                                                    &nbsp;
                                                @endif
                                            </td>

                                            <td @if($t->status == 'pending') id='change_status-{{$t->supplier_post_id}}' @endif>
                                                @if($t->status != 'pending')
                                                    {{$t->status}}
                                                @endif
                                            </td>
                                            <!-- <td>
                               Hello <?php echo $t->status;?>
                              </td> -->
                                            <td @if($t->status == 'pending') id='change_status1-{{$t->supplier_post_id}}' @endif>
                                                @if($buyer && $t->status == 'pending')
                                                    <select id="set_status" class="form-control" style="width:80px;"
                                                            onchange="set_status()">
                                                        <option value="">Choose</option>
                                                        <option value="accepted_{{$t->supplier_post_id}}_{{$buyer->buyer_post_id}}">
                                                            Accept
                                                        </option>
                                                        <option value="rejected_{{$t->supplier_post_id}}_{{$buyer->buyer_post_id}}">
                                                            Reject
                                                        </option>
                                                    </select>
                                                @else
                                                    &nbsp;
                                                @endif
                                            </td>
                                            <td id="remain_qty_<?php echo $j;?>">@if($buyer)
													<?php $remain = ( $t->quantity ) - ( $buyer->buyer_bid_quantity );
													?>
                                                    @if($t->status=='rejected')
                                                        {{$t->quantity}}
                                                    @else
                                                        {{$remain}}
                                                    @endif
                                                @endif</td>
                                            <!-- <td>
                                                fasfd
                                            </td> -->

                                            <td>
												<!-- <?php

												if( $t->status == "Unfilled" || $t->status == 'pending'){

												?>
                                                <a id="#" class="reissue_post1" style="color:green;cursor: pointer;"
                                                   onclick=" setdata(<?php echo $j;?>);">Reissue</a>
												<?php
												}
												?> -->

                                                @if($buyer)
													<?php $remain = number_format( $t->quantity - $buyer->buyer_bid_quantity ); ?>
                                                    @if($remain>0 )
                                                        <a id="reissue_{{$t->supplier_post_id}}_{{$buyer->buyer_post_id}}"
                                                           class="reissue_post1" style="color:green;cursor: pointer;"
                                                           onclick=" setdata(<?php echo $j;?>);">Reissue</a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <form style="border:none;" action="{{url('/supplier/post')}}" method='post'
                                  class='form-control' enctype="multipart/form-data" name="pst">
                                {{ csrf_field() }}
                                <div class="row mb-3">
                                    <div class="col-md-6 p-0">
                                        <h5>Table 1: <?php echo date( 'M d, Y' ); ?></h5>
                                    </div>
                                    <div class="col-md-4 p-0 text-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-2 p-0 text-right">
                                        <button type="button" style="cursor: pointer;" data-toggle="modal"
                                                data-target="#myModal" class="btn-sm btn btn-blue ">Import
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="sticky-table sticky-headers sticky-ltr-cells"
                                         style="min-width: 100%;border:0px solid red;;min-height:500px !important ">
                                        <table class="tablexx table-stripedxx table-bordered">
                                            <thead>
                                            <tr class="sticky-row">
                                                <th colspan="9" class="tdgrey">&nbsp;</th>
                                                <th colspan="2" class="tdorange">Initial offer</th>
                                                <th colspan="3" class="tdgreen">Customer Offer</th>
                                                <th colspan="4" class="tdgrey"></th>
                                            </tr>
                                            <tr class="sticky-row">
                                                <th class="tdyellow">Category</th>
                                                <th class="tdyellow">SKU(Item)</th>
                                                <th class="tdyellow">Description</th>
                                                <th class="tdyellow">Unit Per Case</th>
                                                <th class="tdyellow">Net Weight(LBS)</th>
                                                <th class="tdyellow">Location</th>
                                                <th class="tdyellow">Expiry Date</th>
                                                <th class="tdyellow">Quantity</th>
                                                <th class="tdyellow">List Price</th>
                                                <th class="tdorange">Per case/mod</th>
                                                <th class="tdorange">Per unit</th>
                                                <th class="tdgreen">Bid</th>
                                                <th class="tdgreen">Quantity</th>
                                                <th class="tdgreen">Comments</th>
                                                <th class="tdgrey" style="width: 7%">Duration (Hours)</th>
                                                <th class="tdgrey" style="width: 200px">Pool</th>
                                                <th class="tdgrey">Delivery Window</th>
                                                <th class="tdgrey">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody id="box_body1">
											<?php $cntr = 0; ?>
                                            @foreach($imported as $m)
												<?php $cntr ++; ?>
                                                <tr class="holder_div" id='tr-<?=$cntr?>'>
                                                    <td>{{$m->category}}
                                                        <input type="hidden" class="form-control" placeholder="Category"
                                                               name="pdata[<?=$cntr?>][category]"
                                                               value="{{$m->category}}">
                                                    </td>
                                                    <td>{{$m->sku}}
                                                        <input type="hidden" list="skus" name="pdata[<?=$cntr?>][sku]"
                                                               value="{{$m->sku}}" class="form-control custom-select"
                                                               required11 autocomplete="off"/>
                                                    </td>
                                                    <td>{{$m->description}}
                                                        <input type="hidden" class="form-control"
                                                               placeholder="Description"
                                                               name="pdata[<?=$cntr?>][description]"
                                                               value="{{$m->description}}">
                                                    </td>

                                                    <td>{{$m->unit_per_case}}
                                                        <input type="hidden" class="form-control"
                                                               placeholder="Unit per case"
                                                               name="pdata[<?=$cntr?>][unit_per_case]"
                                                               value="{{$m->unit_per_case}}"></td>

                                                    <td>{{$m->net_weight}}
                                                        <input type="hidden" class="form-control"
                                                               placeholder="Net Weight"
                                                               name="pdata[<?=$cntr?>][net_weight]"
                                                               value="{{$m->net_weight}}"></td>
                                                    <td>{{$m->product_location}}
                                                        <input type="hidden" class="form-control"
                                                               placeholder="Unit per case"
                                                               name="pdata[<?=$cntr?>][product_location]"
                                                               value="{{$m->product_location}}">
                                                    </td>
                                                    <td>{{$m->expiry}}
                                                        <input type="hidden" class="form-control datetimepicker44"
                                                               placeholder="Expiry" name="pdata[<?=$cntr?>][expiry]"
                                                               value="{{$m->expiry}}"></td>
                                                    <td>{{$m->quantity}}
                                                        <input type="hidden" class="form-control intnum" required
                                                               placeholder="Quantity" name="pdata[<?=$cntr?>][quantity]"
                                                               value="{{$m->quantity}}"></td>
                                                    <td>${{$m->list_price}}
                                                        <input type="hidden" class="form-control intnum" required
                                                               placeholder="List Price"
                                                               name="pdata[<?=$cntr?>][list_price]"
                                                               value="{{$m->list_price}}">
                                                    </td>
                                                    <td>${{$m->per_case_price}}
                                                        <input type="hidden" class="form-control intnum" required
                                                               placeholder="Per case Price"
                                                               name="pdata[<?=$cntr?>][per_case_price]"
                                                               value="{{$m->per_case_price}}">
                                                    </td>
                                                    <td>${{$m->price}}
                                                        <input type="hidden" class="form-control intnum" required
                                                               placeholder="Price" name="pdata[<?=$cntr?>][min_price]"
                                                               value="{{$m->price}}">
                                                    </td>

                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <select class="custom-select form-control"
                                                                name='pdata[<?=$cntr?>][order_duration]'
                                                                style="width: 75px;">
                                                            @foreach($durations as $d)
                                                                <option value='{{$d}}'>{{$d}} Hours</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <?php
                                                    var_dump("jjj");
                                                    exit(0);
                                                    ?>
                                                    <td>
                                                        <select id="instantbookingjt" data-placeholder="Select one"
                                                                class="input form-input pool1 chosen-select spool-<?=$cntr?>"
                                                                multiple required name="pdata[<?=$cntr?>][pool_name][]"
                                                                onclick="settext()">
															<?php $poolss = explode( ',', Auth::user()->pool ); ?>
                                                            @foreach($pools as $pp)
                                                                <option {{($pp->id==8)?'selected="selected"':''}} value="{{$pp->id}}">{{$pp->pool_name}} @if($pp->distance > 0)
                                                                        [{{$pp->distance}} KM] @endif</option>
                                                            @endforeach
                                                        </select>
                                                    </td> <!-- detail model import begins -->
                                                    <td>
                                                        <button type='button'
                                                                class="btn btn-blue btn-sm model1-<?=$cntr?>"
                                                                data-target="#myModal_<?=$cntr?>" data-toggle="modal">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                           onclick='removePost("<?=$cntr?>");' class="">Delete</a>
                                                        <div class="modal fade" id="myModal_<?=$cntr?>" tabindex="-1"
                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Logistics Detail</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row mt-4 mb-4">
                                                                            <div class="col-sm-12">
                                                                                <div class="logistics">
                                                                                    <table class="table"
                                                                                           style="margin:0px; background:none;">
                                                                                        <tr>
                                                                                            <td>Delivery windows</td>
                                                                                            <td>
                                                                                                <input required
                                                                                                       type="text"
                                                                                                       class="datetimepicker"
                                                                                                       name="pdata[<?=$cntr?>][delivery_window]"
                                                                                                       value="<?php echo date( 'Y-m-d h:i' ) ?>">
                                                                                                <input required
                                                                                                       type="text"
                                                                                                       class="datetimepicker"
                                                                                                       name="pdata[<?=$cntr?>][delivery_window_to]"
                                                                                                       value="<?php echo date( 'Y-m-d h:i' ) ?>">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Delivery Location</td>
                                                                                            <td><input type="text"
                                                                                                       readonly
                                                                                                       class="form-control rdelivery_location"
                                                                                                       value="{{$m->product_location}}">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Description</td>
                                                                                            <td><textarea
                                                                                                        class="form-control"
                                                                                                        readonly
                                                                                                        placeholder="Enter text here ">{{$m->description}}</textarea>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary"
                                                                                data-dismiss="modal">Save changes
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-md-10">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="button" id="add_new_option" style="cursor: pointer;"
                                                class="btn-sm btn btn-blue">Add Sku
                                        </button>
                                        <button type="submit" style="cursor: pointer;" class="btn-sm btn btn-blue "
                                                onclick="return checkslection();document.pst.submit();">Post
                                        </button>
                                    </div>
                                </div>
                            </form>
							<!-- <button type="button" style="cursor: pointer;" class="btn-sm btn btn-blue " onclick="check_count_selected_list();">test
                                        </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
    <table style="display: none;">
        <tbody id="add_new_template">
        <tr class="holder_div" id='tr-index'>
            <td><input id='category-index' type="text" class="form-control" placeholder="Category"
                       name="pdata[index][category]" value="">
            </td>
            <td><input id='sku-index' type="text" list="skus" name="pdata[index][sku]" value=""
                       class="form-control custom-select" required11 autocomplete="off"/>
            </td>
            <td><input id='description-index' type="text" class="form-control" placeholder="Description"
                       name="pdata[index][description]" value="">
            </td>

            <td><input id='unit_per_case-index' type="text" class="form-control" placeholder="Unit per case"
                       name="pdata[index][unit_per_case]" value=""></td>
            <td><input id='net_weight-index' type="text" class="form-control" placeholder="Net Weight"
                       name="pdata[index][net_weight]" value=""></td>
            <td><input id='product_location-index' type="text" class="form-control" placeholder="Unit per case"
                       name="pdata[index][product_location]" value="">
            </td>
            <td><input id='expiry-index' type="text" class="form-control datetimepicker44" autocomplete="off"
                       placeholder="Expiry" name="pdata[index][expiry]" value=""></td>
            <td><input id='quantity-index' type="text" class="form-control intnum" required placeholder="Quantity"
                       name="pdata[index][quantity]" value=""></td>
            <td><input id='list_price-index' type="text" class="form-control intnum" required placeholder="List Price"
                       name="pdata[index][list_price]" value="">
            </td>
            <td><input id='per_case_priceindex' type="text" class="form-control intnum" required
                       placeholder="Per case Price" name="pdata[index][per_case_price]" value="">
            </td>
            <td><input id='min_price-index' type="text" class="form-control intnum" required placeholder="Price"
                       name="pdata[index][min_price]" value="">
            </td>

            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>

            <td>
                <select class="custom-select form-control orderdurationcss" name='pdata[index][order_duration]'>
                    @foreach($durations as $d)
                        <option value='{{$d}}'>{{$d}} Hours</option>
                    @endforeach
                </select>
            </td>
            <td id="instantbookingjt-wrapper" class="td_index" >
				<div class="selected_count" style="display:none;" ></div>
                <!--<select required id="instantbookingjt" data-placeholder="Select one"
                        class="pool_index input form-input pool1 chosen-selects spool-index" multiple
                        name="pdata[index][pool_name][]">
					<?php //$poolss = explode( ',', Auth::user()->pool ); ?>
                    @foreach($pools as $pp)
                        <option value="{{$pp->id}}">{{$pp->pool_name}} @if($pp->distance > 0)[{{$pp->distance}}
                            KM] @endif</option>
                    @endforeach
                </select>-->
				<select required id="instantbookingjt"  data-placeholder="Select one"
                class="pool_index input form-input pool1 chosen-selects spool-index" multiple name="pdata[index][pool_name][]">

				<?php $poolss = explode( ',', Auth::user()->pool ); ?>
                    @foreach($ref_pools as $key=>$pp)
						@if($key==3)
							<optgroup label="Pools">
							@foreach($pp as $key=>$pl)
								<option value="{{$pl['id']}}">{{$pl['name']}}</option>
							@endforeach
						@endif
						@if($key==2)
							<optgroup label="Distance">
							@foreach($pp as $key=>$pl)
								<option value="{{$pl['id']}}">{{$pl['name']}} [{{$pl['distance']}}KM]</option>
							@endforeach
						@endif
						@if($key==1)
							<optgroup label="Products">
                            @foreach($pp as $key=>$pl)
                                <option value="{{$pl['id']}}">{{$pl['name']}}</option>
							@endforeach
						@endif
                    @endforeach

				</select>
            </td>
            <td>
                <button type='button' class="btn btn-blue btn-sm model1-index" data-target="#myModal_index"
                        data-toggle="modal">Detail
                </button>
            </td>
            <td>
                <a href="javascript:void(0);" onclick='removePost(index);' class="">Delete</a>
                <div class="modal fade" id="myModal_index" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Logistics Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-4 mb-4">
                                    <div class="col-sm-12">
                                        <div class="logistics">
                                            <table class="table" style="margin:0px; background:none;">
                                                <tr>
                                                    <td>Delivery windows</td>
                                                    <td>
                                                        <input id="" type="text" value="" class="datetimepicker44"
                                                               name="pdata[index][delivery_window]">
                                                        <input id="" type="text" value="" class="datetimepicker44"
                                                               name="pdata[index][delivery_window_to]">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Delivery Location</td>
                                                    <td><input type="text" class="form-control rdelivery_location"
                                                               value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><textarea class="form-control"
                                                                  placeholder="Enter text here "></textarea></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        </tbody>
    </table>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" style='margin-top: 20px;'
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{url('/supplier/postcsv')}}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Uoload Csv File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <!--div class="row">
                        <div class="col-md-12">
                            <p>Please Upload .csv (like test.csv) File. Please Use Same Title.</p>
                            <p><b><a href="{{url('/')}}/public/demo-file.csv" class="btn btn-blue" target='_blank'>Download Demo File </a></b></p>
                        </div>
                    </div-->

                        <input type="file" name="fileToUpload" id="fileToUpload" required>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@section('js-file')
    <script src="{{ asset('js/chosen.jquery.js') }}?v={{time()}}" type="text/javascript"></script>
    <script src="{{ asset('js/pekeUpload.js') }}?v={{time()}}"></script>
    <script src="{{ asset('js/supplier.js') }}?v={{time()}}"></script>
    <script src="{{ asset('js/jquery.stickytable.js') }}?v={{time()}}"></script>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
	<!-- <script src="{{ asset('select/jquery.sumoselect.js') }}?v={{time()}}"></script> -->
    <input type="text" id="pos" value="1">
    <script type="text/javascript">
        //$(function(){
        function clickdo() {
            $('#add_new_option').trigger("click");
        }

        $(document).ready(function () {
            $('#add_new_option').trigger("click");
            $('.datetimepicker').datetimepicker({
                format: 'Y-m-d h:i',
                formatDate: 'Y-m-d h:i',
                timepicker: true
            });
            var j = 1;
            $('#add_new_option').click(function () {
                j++;
                document.getElementById('pos').value = j;

                $('.sticky-ltr-cells').addClass('supp_post_container');
            })
        });

        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "100% !important"}
        };
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }

        function set_status() {
            var status_str = $('#set_status').val();
            if (status_str != '') {
                var status_exp_str = status_str.split("_");
                var supplier_post_id = status_exp_str[1];
                var buyer_post_id = status_exp_str[2];
                if (status_exp_str[0] == 'accepted') {
                    //alert("{{url('/')}}/allocation/buyer/"+supplier_post_id+"/"+buyer_post_id);
                    window.location.href = "{{url('/')}}/allocation/buyer/" + supplier_post_id + "/" + buyer_post_id;
                } else if (status_exp_str[0] == 'rejected') {
                    window.location.href = "{{url('/')}}/reject_allocation/buyer/" + supplier_post_id + "/" + buyer_post_id;
                }
            }
        }

        $(document).ready(function () {
            $('.reissue_post').click(function () {
                var id_str = $(this).attr('id');

                var id_exp_str = id_str.split("_");
                var supplier_post_id = id_exp_str[1];
                var buyer_post_id = id_exp_str[2];

                window.location.href = "{{url('/')}}/supplier/reissue_post/" + supplier_post_id + "/" + buyer_post_id;
            })
        })

    </script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: url + "/delete/warehouse/pool",
                type: "get",
                success: function (result) {

                }
            });
        });

        $(".product_location").on('change', function (e) {
            var sid = $(this).data('pl');
        });

        function productlocation(id, pid) {
            $.ajax({
                url: url + "/get/warehouse/pool/" + pid + "/" + id,
                type: "get",
                success: function (result) {
                    var data = $.parseJSON(result);
                    var pooll = data.pool;
                    var str_array = pooll.split(',');

                    for (var i = 0; i < str_array.length; i++) {
                        str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                    }

                    $(".spool-" + id).val(str_array).trigger("chosen:updated");
                }
            });
        }

        function clear1() {
            document.getElementById('text_na').value = '';
        }

        function settext() {
            document.getElementById('text_na').value = 'Select One';
        }

        function setdata(poine) {
            var setdatavar = document.getElementById('pos').value;
            if (setdatavar == '') {
                setdatavar = 1;
            }
            if (document.getElementById('category-' + setdatavar).value != "") {
                $('#add_new_option').trigger("click");
                setdatavar = document.getElementById('pos').value;
            }
            var qtys = document.getElementById('remain_qty_' + poine).innerHTML;
            document.getElementById('category-' + setdatavar).value = document.getElementById('su_cat_' + poine).innerHTML;
            document.getElementById('sku-' + setdatavar).value = document.getElementById('su_sku_' + poine).innerHTML;
            document.getElementById('description-' + setdatavar).value = document.getElementById('su_description_' + poine).innerHTML;
            document.getElementById('unit_per_case-' + setdatavar).value = document.getElementById('su_unit_per_case_' + poine).innerHTML;
            document.getElementById('net_weight-' + setdatavar).value = document.getElementById('su_net_weight_' + poine).innerHTML;
            document.getElementById('product_location-' + setdatavar).value = document.getElementById('su_product_location_' + poine).innerHTML;
            document.getElementById('expiry-' + setdatavar).value = document.getElementById('su_expiry_' + poine).innerHTML;
            document.getElementById('quantity-' + setdatavar).value = qtys.trim();
            var su_per_case_price = document.getElementById('su_per_case_price_' + poine).innerHTML;
            document.getElementById('per_case_price' + setdatavar).value = su_per_case_price.replace("$", "");
            var min_price = document.getElementById('su_price_' + poine).innerHTML;
            document.getElementById('min_price-' + setdatavar).value = min_price.replace("$", "");
            var listprice = document.getElementById('su_list_price_' + poine).innerHTML;
            document.getElementById('list_price-' + setdatavar).value = listprice.replace("$", "");
        }
        document.getElementById('pos').value = '1';
        function checkslection() {
            $("#instantbookingjt_chosen").removeAttr("style");
            var total = document.getElementById('pos').value;
            for (i = 1; i <= total; i++) {
                $(".td_" + i + " div").removeAttr("style");
            }
            var flag = true;
            for (i = 1; i <= total; i++) {
                if ($("select.pool_" + i + " option").filter(":selected").val() == undefined) {
                    flag = false;
                    $(".td_" + i + " div").css("border", "2px solid red");

                }
            }
            //send messages to buyers
            console.log("adfs");

            var category_s=document.getElementById('category-'+1).value;
            var sku_s=document.getElementById('sku-'+1).value;
            var min_price_s=document.getElementById('min_price-'+1).value;
            var quantity_s=document.getElementById('quantity-'+1).value;
            var expiry_s=document.getElementById('expiry-'+1).value;


            temp={"message":{
            "category":category_s,
            "sku":sku_s,
            "company":"",
            "Min Price":min_price_s,
            "Quantity":quantity_s,
            "Expiry Date":expiry_s,
            }
            };

            $.ajax({
                    url: "/resetfoodv5/api/sender",
                    type: "POST",
                    data: temp,
                    dataType:'json',
                    success: function (response){
                        //console.log(response);
                        var temp_item=[];
                        temp_item = JSON.parse(response);
                        console.log("sfdas");
                    }
                });
            return flag;
        }

		function check_count_selected_list(id)
		{
		  var count_list = $('#'+id+' ul.chosen-choices li').length;
		  count_list  = parseInt(count_list)-1;
		  $('#'+id+" #instantbookingjt_chosen").css("display", "none");
		  $('#'+id+" .selected_count").css("display", "block");
          $('#'+id+" .selected_count").css("margin", "8px 10px");
		  var div_des = '<span class="count_selct dropselect" id="'+id+'"onclick="show_selected_list(this.id);">'+count_list+' Pools Selected </span>';
		  $('#'+id+" .selected_count").html(div_des);
        }
		function show_selected_list(id)
		{
			$('#'+id+" .selected_count").css("display", "none");
			$('#'+id+" #instantbookingjt_chosen").css("display", "block");
		}
    </script>
	<!--<script type="text/javascript">
		//var j = jQuery.noConflict();
		$(document).ready(function () {
			window.groups_eg_g = $('.groups_eg_g').SumoSelect({selectAll:false, search:false});

			$(".group").click(function()
			{
			  var sd = $(this).children('ul');
			  //if(sd.children().css('display') == 'block')
			  //{
			//	 sd.children().css( "display", "none" );
			 // }
			  //else
			 // {
				 $(this).addClass('current');
				 sd.children().css( "display", "block" );
			 // }
			});
			$(".opt").click(function()
			{
				var ltext  = $(this).children('label').text();
				//alert(ltext);
				//$('#test').find('option[text="B"]').val();
				$('.groups_eg_g option:contains('+ltext+')').attr('selected', true);
			});

		});
	</script>-->

@endsection

