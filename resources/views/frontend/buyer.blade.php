@extends('layouts.frontendTemplate')
@section('css-file')

<!--<link href="http://oscuz.com/mplace/assets/frontend/css/choosen.css" rel="stylesheet">-->
<link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
<link href="{{ asset('css/jquery.stickytable.min.css') }}?v={{time()}}" rel="stylesheet">
<style type="text/css">
    .table-bordered {
        border: none !important;
    }

</style>

@endsection

@section('content')
<?php
use App\Libraries\ZnUtilities;
$durations = array();
$price = array();
$remainingdays = array();
$quantity = array();

$category = \App\Models\Category::where('id','!=','16')->get();
$notification_count = \App\Models\Notification::where('user_id',Auth::user()->id)->where('status','unread')->get()->count();

$setting = App\Models\Setting::where('setting_name','product_detail')->first();
$product_tags = App\Models\Product::where('category_id','16')->get();
//$product_tags = App\ProductTag::get();
$preference = App\Models\Pool::where('pool_type','1')->get();
if($setting->duration)
{
    $durations = explode(',', $setting->duration);
}
if($setting->price)
{
   $price = explode(',', $setting->price);
}

  $remainingdays = App\Models\Expiry::get();

if($setting->quantity)
{
   $quantity = explode(',', $setting->quantity);
}

?>
<style>
    a.notif {
        position: relative;
        display: block;
        height: 50px;
        width: 50px;
        background: url('http://i.imgur.com/evpC48G.png');
        background-size: contain;
        text-decoration: none;
        margin-bottom: -44px;
    }

    .num {
        position: absolute;
        right: 11px;
        top: 6px;
        color: #fff;
    }

    .optionGroup1 {
        font-weight: bold;
        font-style: italic;
        font-size: 20px;
    }

    .optionChild {
        padding-left: 15px;
    }

    .pp_label {
        display: none;
    }

    .pp {
        display: none;
    }

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

    .tablexx tr>td,
    th {
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
                                <a href="{{url('/')}}"><img style="width:230px;"
                                        src="{{asset('img/logo-new.jpg')}}" alt="" /></a>
                            </div>
                            <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                                <div class="drop-menu ml-auto">
                                    <a href="javascript:void(0);"><img src="{{asset('img/profile-pic.png')}}" />
                                        <span>{{Auth::user()->name}}<i class="fa fa-angle-down"></i></span></a>
                                    <ul>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i>
                                                My Public Profile</a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My
                                                Home</a></li>
                                        <!--<li><a href="{{url('/')}}/allnotification"><i class="fa fa-money" aria-hidden="true"></i>Notifications <span style="color:red;"> {{$notification_count}} </span> </a></li>-->
                                        <!--@if(Auth::user()->user_role == 2)<li><a href="{{url('/')}}/allallocation"><i class="fa fa-money" aria-hidden="true"></i>All Allocation </a></li>@endif-->
                                        <li><a href="{{url('/')}}/logout"><i class="fa fa-sign-out"
                                                    aria-hidden="true"></i> Sign off</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12" style="padding:0px">
                        <h3 style="margin-left: 36%;">Buyer Home Page</h3>
                        <div class="sticky-table sticky-headers sticky-ltr-cells" style="min-width: 100%;">
                            <table class="tablexx table-stripedxx table-bordered">
                                <thead>
                                    <tr class="sticky-row">
                                        <th colspan="9" class="tdgrey">&nbsp;</th>
                                        <th colspan="2" class="tdorange">Initial offer</th>
                                        <th colspan="3" class="tdgreen">Customer Offer</th>
                                        <th colspan="2" class="tdgrey"></th>
                                    </tr>
                                    <tr class="sticky-row">
                                        <th class="tdyellow">Category</th>
                                        <th class="tdyellow">Item</th>
                                        <th class="tdyellow">Description</th>
                                        <th class="tdyellow">Unit Per Case</th>
                                        <th class="tdyellow">Net Weight(LBS)</th>
                                        <th class="tdyellow">Location</th>
                                        <th class="tdyellow">Expiry Date</th>
                                        <th class="tdyellow"> Qty(cs) </th>
                                        <th class="tdyellow">List Price</th>
                                        <th class="tdorange">Per case/mod</th>
                                        <th class="tdorange"> Per Unit </th>
                                        <th class="tdgreen">Bid</th>
                                        <th class="tdgreen">Quantity</th>
                                        <th class="tdgreen">Comments</th>
                                        <th class="tdgrey">Buyer Payment</th>
                                        <th class="tdgrey">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="bidded_body">

                                    @foreach($items as $t)
                                    <?php
                    $buyer_post = App\Models\BuyerPost::where('buyer_post_id',$t->buyer_post_id)->first();
                    $supplier_post = App\Models\SupplierPost::where('supplier_post_id',$t->supplier_post_id)->with('userInfo','userInfo1')->first();
                  ?>
                                    <tr>
                                        <td>{{$supplier_post->category}}</td>
                                        <td>{{$t->skuInfo->sku}}</td>

                                        <td>{{$supplier_post->description}}
                                        <td>{{number_format($supplier_post->unit_per_case)}}</td>
                                        <td>{{number_format($supplier_post->net_weight,2)}}</td>
                                        <td>{{$supplier_post->product_location}}</td>
                                        <td>{{$supplier_post->expiry}}</td>
                                        <td>{{number_format($supplier_post->quantity)}}</td>
                                        <td>${{number_format($supplier_post->list_price,2)}}</td>
                                        <td>${{number_format($supplier_post->per_case_price,2)}}</td>
                                        <td>${{number_format($buyer_post->price)}}</td>

                                        @if($supplier_post->file_name != '')
                                        <a href="{{url('/')}}/public/uploads/{{$supplier_post->file_name}}" download
                                            style="color:#4F81BD; margin-left: 10;" title="Click Here"
                                            target="_blank">Attached Doc</a>
                                        @endif
                                        </td>


                                        <td>${{number_format($buyer_post->buyer_bid,2)}}</td>
                                        <td>{{number_format($t->buyer_bid_quantity)}}</td>
                                        <td>{{$buyer_post->buyer_bid_comment}}</td>
                                        <td>
                                            <?php
                      $status_arr= array('pending','rejected');
                      if(!in_array($t->status, $status_arr)){
                         echo $t->payment_status;
                      }
                      ?>

                                        </td>
                                        <td>{{$t->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-12'>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-9">Table 1: <?php echo date('M d, Y'); ?></div>
                        </div>
                        <div class="row">
                            <div class="sticky-table sticky-headers sticky-ltr-cells">
                                <table class="tablexx table-stripedxx table-bordered">
                                    <thead>
                                        <tr class="sticky-row">
                                            <th colspan="9" class="tdgrey">&nbsp;</th>
                                            <th colspan="2" class="tdorange">Initial offer</th>
                                            <th colspan="3" class="tdgreen">Customer Offer</th>
                                            <th colspan="2" class="tdgrey"></th>
                                        </tr>
                                        <tr class="sticky-row">
                                            <th class="tdyellow">Category</th>
                                            <th class="tdyellow">Item</th>
                                            <th class="tdyellow">Description</th>
                                            <th class="tdyellow">Unit Per Case</th>
                                            <th class="tdyellow">Net Weight(LBS)</th>
                                            <th class="tdyellow">Location</th>
                                            <th class="tdyellow">Expiry Date</th>
                                            <th class="tdyellow"> Qty(cs) </th>
                                            <th class="tdyellow">List Price</th>
                                            <th class="tdorange">Per case/mod</th>
                                            <th class="tdorange"> Per Unit </th>
                                            <th class="tdgreen"> Bid</th>
                                            <th class="tdgreen">Quantity</th>
                                            <th class="tdgreen">Comments</th>
                                            <th class="tdgrey" style="width:70px;">Re. Time</th>
                                            <th class="tdgrey">Post</th>
                                        </tr>
                                    </thead>
                                    <tbody id="box_body1">
                                        @foreach($buyer as $t)

                                        <?php  //echo "<pre>"; print_r($t); die; ?>
                                        <form action="{{url('/buyer/post')}}" method='post'
                                            class='form-control buyerfrm__{{$t->supplier_post_id}}'>
                                            {{ csrf_field() }}

                                            <tr class="holder_div timer-{{$t->supplier_post_id}}" id="tr-1">
                                                <td>{{$t->category}}</td>
                                                <td>{{$t->skuInfo->sku}}<input type="hidden" class="form-control"
                                                        readonly placeholder="s_no" name="supplier_post_id"
                                                        value="{{$t->supplier_post_id}}"></td>

                                                <td>{{$t->description}} <br>
                                                    @if($t->file_name != '')
                                                    <a href="{{url('/')}}/public/uploads/{{$t->file_name}}" download
                                                        style="color:#4F81BD; margin-left: 10;" title="Click Here"
                                                        target="_blank">Attached Doc</a>
                                                    @endif
                                                </td>
                                                <td>{{number_format($t->unit_per_case)}}</td>
                                                <td>{{number_format($t->net_weight,2)}}</td>
                                                <td>{{$t->product_location}}</td>
                                                <td>{{$t->expiry}}</td>
                                                <td class="quantity_{{$t->supplier_post_id}}">
                                                    {{number_format($t->quantity)}}</td>
                                                <td>${{number_format($t->list_price,2)}}</td>
                                                <td><input class="buyer_price_{{$t->supplier_post_id}}" type="hidden"
                                                        value="<?php echo $t->per_case_price;?>">${{number_format($t->per_case_price,2)}}
                                                </td>
                                                <td>$<span
                                                        class="1buyer_price_{{$t->supplier_post_id}}">{{number_format($t->price)}}</span>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon2">$</span>
                                                        <input type="text"
                                                            class="form-control intnum buyer_bid buyer_bid_{{$t->supplier_post_id}}"
                                                            data-item_id="{{$t->supplier_post_id}}" required
                                                            name="buyer_bid" value="0"
                                                            onClick="change_bit_val({{$t->supplier_post_id}})">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        class="form-control intnum buyer_bid_quantity_{{$t->supplier_post_id}}"
                                                        required name="buyer_bid_quantity" value="0"
                                                        onClick="change_val_click({{$t->supplier_post_id}})">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        class="form-control buyer_bid_comment_{{$t->supplier_post_id}}"
                                                        name="buyer_bid_comment" value="">
                                                </td>
                                                <td id="time-{{$t->supplier_post_id}}"></td>
                                                <td><button type='button'
                                                        onClick="buyer_bid_post({{$t->supplier_post_id}})"
                                                        class='btn btn-blue postbtn-{{$t->supplier_post_id}}'
                                                        class="">Post</button></td>
                                            </tr>
                                        </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11">
                    </div>
                    <div class="col-md-1">
                        <!-- <button type='button' onClick="submitbids()" class='btn btn-blue' class="">Post All</button>  -->
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <h6>&nbsp;</h6>
                        <div class="logistics">
                            <form name="logistics_form" id="preference_form" method="Post"
                                action="{{url('/')}}/update/preference">
                                {{ csrf_field() }}
                                <h6>Preference</h6>
                                <table class="table" style="margin:0px; background:none;">

                                    <tr>
                                        <td>Buyer Preference</td>
                                        <td>
                                            @foreach($preference as $p)
                                            <?php $ser = explode(',', Auth::user()->pool); ?>
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" {{(in_array($p->id,$ser))?'checked="checked"':''}}
                                                    value="{{$p->id}}" name="pool[]" type="checkbox"
                                                    class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">{{$p->pool_name}}</span>
                                            </label>
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-lg-12">
                                    <button type="button" style="cursor: pointer;"
                                        class="btn btn-blue btn-block preference_form">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</body>

@section('js-file')
<!--<script src="http://oscuz.com/mplace//assets/js/chosen.jquery.js" type="text/javascript"></script>-->
<script src="{{ asset('js/chosen.jquery.js') }}?v={{time()}}"></script>
<script src="{{ asset('js/jquery.stickytable.js') }}?v={{time()}}"></script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {
            allow_single_deselect: true
        },
        '.chosen-select-no-single': {
            disable_search_threshold: 10
        },
        '.chosen-select-no-results': {
            no_results_text: 'Oops, nothing found!'
        },
        '.chosen-select-width': {
            width: "100% !important"
        }
    }
    for (var selector in config) {
        jQuery(selector).chosen(config[selector]);
    }

</script>

<script>
    function change_val_click(itemid) {
        var byer_val = $(".buyer_bid_quantity_" + itemid).val();
        //alert(byer_val);
        if (byer_val == 0) {
            $(".buyer_bid_quantity_" + itemid).val('');
        }

    }

    function change_bit_val(itemid) {
        var byer_val = $(".buyer_bid_" + itemid).val();
        //alert(byer_val);
        if (byer_val == 0) {
            $(".buyer_bid_" + itemid).val('');
        }

    }

</script>
<script>
    function submitbids() {
        var tt = $(".readyForm").length;
        $(".readyForm").each(function (index) {
            $.ajax({
                type: 'post',
                url: '{{url("/buyer/post")}}',
                data: $(this).serialize(),
                success: function () {

                    if (index === (tt - 1)) {
                        window.location.href = window.location.href;
                    }
                }
            });
        });
    }


    function buyer_bid_post(itemid) {
        var buyer_bid = $('.buyer_bid_' + itemid).val().replace(/,/g, '');
        var total = $(".buyer_price_" + itemid).val().replace(/,/g, '');

        if (parseInt(buyer_bid) < parseInt(total)) {
            $('#myModal3').modal('show');
            return;
        }

        var buyer_bid_quantity = $(".buyer_bid_quantity_" + itemid).val().replace(/,/g, '');
        var quantity_total = $(".quantity_" + itemid).text().replace(/,/g, '');
        if (parseInt(buyer_bid_quantity) > parseInt(quantity_total)) {
            $('#myModal4').modal('show');
            return;
        }

        $('.postbtn-' + itemid).html('Wait...');

        //jQuery('.buyerfrm__'+itemid).submit();
        var formdata = jQuery('.buyerfrm__' + itemid).serialize();
        console.log("afaf");
        $.ajax({

            url: url + "/buyer/buyer_post_Ajax",
            type: "post",
            data: formdata,
            success: function (result) {
                var obj = jQuery.parseJSON(result);


                if (obj.status == "saved") {
                    // remove from bid table
                    $('.timer-' + itemid).remove();
                    // add to bidded table
                    $('#bidded_body').append(obj.row_str);
                }

                $('.postbtn-' + itemid).html('Post');
            }
        });
    }


    $(document).ready(function () {

        $('.buyer_bid').on('keyup keypress blur change', function (e) {

            var itemid = $(this).data('item_id');
            var buyer_bid = $(this).val().replace(/,/g, '');
            var total = $(".buyer_price_" + itemid).text().replace(/,/g, '');
            if (parseInt(buyer_bid) < parseInt(total)) {
                jQuery('.buyerfrm__' + itemid).removeClass('readyForm');
            } else {
                jQuery('.buyerfrm__' + itemid).addClass('readyForm');
            }

        });

        $('.intnum').on('keyup keypress blur change', function (e) {
            var pr = $(this).val();
            pr = pr.replace(",", "");
            $(this).val(numberWithCommas(pr));
        });


        var x = setInterval(function () {
            $.ajax({
                url: url + "/check/post/time",
                type: "get",
                success: function (result) {
                    var data = $.parseJSON(result);
                    $.each(data.time, function (i, v) {
                        if (v == 'accepted' || v == 'Unfilled') {
                            $(".timer-" + i).remove();
                        } else {
                            $('#time-' + i).text(v);
                        }
                    });
                }
            });
        }, 1000);


        $(".logistics_form").click(function () {
            $("#logistics_form").submit();
        });


        $("#logistics_form").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                url = $form.attr("action");
            var posting = $.post(url, $("#logistics_form").serialize());
            posting.done(function (result) {

            });
        });


        $(".preference_form").click(function () {
            $("#preference_form").submit();
        });

        $("#preference_form").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                url = $form.attr("action");
            var posting = $.post(url, $("#preference_form").serialize());
            posting.done(function (result) {

            });
        });




        $(".disEstriction").click(function () {
            $("#disEstriction").submit();
        });

        $("#disEstriction").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                url = $form.attr("action");
            var posting = $.post(url, $("#disEstriction").serialize());
            posting.done(function (result) {

            });
        });

    });


    function deleteBuyerPost(bid) {
        $.ajax({
            url: url + "/check/buyerpost/" + bid,
            type: "get",
            success: function (result) {
                if (result > 0) {
                    alert("You Can't delete this. Its already allocated.")
                } else {
                    var confirm_action = confirm("Do you really want to delete This Post");
                    if (confirm_action == true) {
                        window.location.href = url + "/delete/buyer/post/" + bid;
                    }
                }
            }
        });
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    //receive the data from suppliers



    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    console.log("action");

    var pusher = new Pusher('f005256181befa3e4c05', {
        cluster: 'us2',
        forceTLS: true
    });

    var channel = pusher.subscribe('chatbox');
    channel.bind('messagesend', function (data) {
        //   alert(JSON.stringify(data));
        document.location.reload(true);
    });

</script>

@endsection


@foreach($items as $t)
<div class="modal fade" id="myModal_{{$t->supplier_post_id}}" tabindex="-1" role="dialog" style='margin-top: 20px;'
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supplier Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 mb-3">
                    <label class=""><b>Supplier Type</b></label>
                    <p>{{$t->supplier_type}}</p>
                </div>
                <div class="col-lg-12 mb-3">
                    <label class=""><b>Category/ Product</b></label>
                    @if($t->search_keywords)
                    <p>{{isset($t->category->category_name)?$t->category->category_name:''}}/{{ZnUtilities::getProductName($t->search_keywords)}}
                    </p>
                    @else
                    <p> {{isset($t->category->category_name)?$t->category->category_name:''}}/{{isset($t->product->product_name)?$t->product->product_name:''}}
                    </p>
                    @endif
                </div>
                <!--          <div class="col-lg-12 mb-3">
                    <label class=""><b>Price/Unit</b></label>
                    <p>{{$t->price}}</p>
                </div>-->
                <div class="col-lg-12 mb-3">
                    <label class=""><b>Expiry</b></label>
                    <p>{{$t->expiry2}}</p>
                </div>
                <!--          <div class="col-lg-12 mb-3">
                    <label class=""><b>Quantity</b></label>
                    <p>{{$t->quantity}}</p>
                    </div>-->
                <div class="col-lg-12 mb-3">
                    <label class=""><b>Description</b></label>
                    <p>{{$t->description}}</p>
                </div>
                <div class="col-lg-12 mb-3">
                    <label class=""><b>Status</b></label>
                    <p>{{$t->status == ''?'pending':$t->status}}</p>
                </div>

                <div class="col-lg-12 mb-3">
                    <label class=""><b>Documents</b></label>
                    <?php $doc = \App\Models\Document::where('supplier_post_id', $t->supplier_post_id)->get(); ?>
                    @if(count($doc) > 0)
                    <p>
                        @foreach($doc as $d)
                        <a href="{{url('/')}}/public/attachments/{{$d->file_name}}"
                            target="_blank">{{$d->actual_file_name}}</a>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                        <p>
                            @else
                            <p>No Document Found</p>
                            @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
@endforeach




<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm" style='top:250px;'>
        <div class="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>You Can't Post bid lower then Min Price.<button type="button" class="close" data-dismiss="modal"
                            style="float: right; right: 0px;">&times;</button></p>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-sm" style='top:250px;'>
        <div class="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>You Can't Post Quntity greater then Qty(cs).<button type="button" class="close"
                            data-dismiss="modal" style="float: right; right: 0px;">&times;</button></p>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
