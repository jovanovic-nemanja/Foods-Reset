@extends('layouts.frontendTemplate')

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	use Illuminate\Support\Facades\DB;
	$durations = array();
	$price = array();
	$remainingdays = array();
	$quantity = array();
	$buyer = App\Models\BuyerPost::orderBy( 'buyer_post_id', 'desc' )->where( 'user_id', Auth::user()->id )->with( 'product' )->get();

	$items = App\Models\SupplierPost::with( 'product' )->orderBy( 'supplier_post_id', 'desc' )->get();

	$category = App\Models\Category::get();

	$setting = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$notification_count = App\Models\Notification::where( 'user_id', Auth::user()->id )->where( 'status', 'unread' )->get()->count();

	echo Auth::user()->id;
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

        .tdyellow1 {
            background-color: yellow !important;
        }

        .tdorange1 {
            background-color: orange !important;
        }

        .tdgreen1 {
            background-color: #92fc92 !important;
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
                                <a href="{{url('/')}}">
                                    <img style="width:230px;" src="{{asset('img/logo-new.jpg')}}" alt=""/></a>
                            </div>
                            <div class="col-sm-4 mb-4 text-right d-flex align-items-center trans">
                                <div class="drop-menu ml-auto">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('img/profile-pic.png')}}"/>
                                        <span>{{Auth::user()->name}} <i class="fa fa-angle-down"></i></span></a>
                                    <ul>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user" aria-hidden="true"></i>
                                                My Public Profile</a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> My Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/allnotification"><i class="fa fa-money"
                                                                                      aria-hidden="true"></i>Posting
                                                History <span style="color:red;"> {{$notification_count}} </span> </a>
                                        </li>

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
                            <div class='col-sm-10'><h6>Posting History</h6></div>
                        </div>
                        <table class="tablexx table-stripedxx " style="margin:0px!important;display:none">
                            <thead>
                            <tr class="sticky-row">
                                <th colspan="11" style='background: none;width:59.8%;border:0px !important'>&nbsp;</th>
                                <th colspan="2" class="tdorange" style="width: 10%;border:0px !important">Initial
                                    offer
                                </th>
                                <th colspan="3" class="tdgreen1" style="width: 15.3%;border:0px !important">Customer
                                    Offer
                                </th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                        </table>

                        <table class="tablesorter tablexx table-stripedxx table-bordered" style="margin:0px!important">
                            <thead>

                            <tr class="sticky-row">
                                <th class="tdyellow1" data-placeholder="Please select">Created date</th>
                                <th class="tdyellow1">Category</th>
                                <th class="tdyellow1">Item</th>
                                <th class="tdyellow1">Description</th>
                                <th class="tdyellow1">Unit Per Case</th>
                                <th class="tdyellow1">Net Weight(LBS)</th>
                                <th class="tdyellow1">Location</th>
                                <th class="tdyellow1" data-placeholder="Please select">Expiry Date</th>
                                <th class="tdyellow1">Quantity</th>
                                <th class="tdyellow1">List Price</th>
                                <th class="tdorange1">Per case/mod</th>
                                <th class="tdorange1">Per unit</th>
                                <th class="tdgreen1">Bid</th>
                                <th class="tdgreen1"> Quantity</th>
                                <th class="tdgreen1"> Comments</th>
                                <th> Buyer Payment</th>
                                <th data-placeholder="Please select">Delivery window</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$j = 0;
							?>
                            @foreach($items as $t)
								<?php
								if($t->user_id == Auth::user()->id){
								$buyer = App\Models\BuyerPost::where( 'supplier_post_id', $t->supplier_post_id )->where( 'is_low_bid', '0' )->orderBy( 'buyer_bid', 'DESC' )->with( 'userName' )->first();
								$supplier_post = App\Models\SupplierPost::where( 'supplier_post_id', $t->supplier_post_id )->with( 'userInfo', 'skuInfo' )->first();
								$j ++;
								$id = $j;
								?>
                                <tr>
                                    <td>{{$t->created_at}}</td>
                                    <td id="su_cat_<?php echo $j;?>">{{$t->category}}</td>
                                    <td id="su_sku_<?php echo $j;?>">{{$t->skuInfo->sku}}</td>
                                    <td id="su_description_<?php echo $j;?>">{{$t->description}}</td>
                                    <td id="su_unit_per_case_<?php echo $j;?>">{{number_format($t->unit_per_case)}}</td>
                                    <td id="su_net_weight_<?php echo $j;?>">{{number_format($t->net_weight,2)}}</td>
                                    <td id="su_product_location_<?php echo $j;?>">{{$t->product_location}}</td>
                                    <td id="su_expiry_<?php echo $j;?>">{{$t->expiry}}</td>
                                    <td id="su_quantity_<?php echo $j;?>">{{number_format($t->quantity)}}</td>
                                    <td id="su_list_price_<?php echo $j;?>">${{number_format($t->list_price,2)}}</td>
                                    <td id="su_per_case_price_<?php echo $j;?>">
                                        ${{number_format($t->per_case_price,2)}}</td>
                                    <td id="su_price_<?php echo $j;?>">${{number_format($t->price,2)}}</td>
                                    <td id="su_buyer_<?php echo $j;?>">@if($buyer)
                                            ${{number_format($buyer->buyer_bid,2)}}
                                        @endif</td>
                                    <td id="su_buyer_qty_<?php echo $j;?>">@if($buyer)
                                            {{number_format($buyer->buyer_bid_quantity)}}
                                        @endif
                                    </td>
                                    <td id="su_buyercomment_<?php echo $j;?>">@if($buyer)
                                            {{$buyer->buyer_bid_comment}}
                                        @endif
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
                                    <td>{{$supplier_post->delivery_window}}
                                        - {{$supplier_post->delivery_window_to}}</td>
                                    <td @if($t->status == 'pending') id='change_status-{{$t->supplier_post_id}}' @endif>
										<?php
										if ( $t->status == "pending" ) {
											echo "Clock";
										}
										?>
                                        @if($t->status != 'pending')
                                            {{$t->status}}
                                        @endif
                                    </td>
                                </tr>
								<?php  } ?>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pager">
                            Page: <select class="gotoPage"></select> <img
                                    src="https://mottie.github.io/tablesorter/addons/pager/icons/first.png"
                                    class="first" alt="First" title="First page"/>
                            <img src="https://mottie.github.io/tablesorter/addons/pager/icons/prev.png" class="prev"
                                 alt="Prev" title="Previous page"/>
                            <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                            <img src="https://mottie.github.io/tablesorter/addons/pager/icons/next.png" class="next"
                                 alt="Next" title="Next page"/>
                            <img src="https://mottie.github.io/tablesorter/addons/pager/icons/last.png" class="last"
                                 alt="Last" title="Last page"/>
                            <select class="pagesize">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
@endsection

@section('js-file')
    <script src="https://mottie.github.io/tablesorter/docs/js/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="https://mottie.github.io/tablesorter//css/theme.blue.css">
    <script src="https://mottie.github.io/tablesorter//js/jquery.tablesorter.js"></script>
    <link rel="stylesheet" href="https://mottie.github.io/tablesorter//addons/pager/jquery.tablesorter.pager.css">
    <script src="https://mottie.github.io/tablesorter//addons/pager/jquery.tablesorter.pager.js"></script>
    <script src="https://mottie.github.io/tablesorter//js/jquery.tablesorter.widgets.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://resetfoods.com/resetfoodv4/jquery-ui.js"></script>
    <script id="js">$(function () {
            var $table = $('.tablesorter'),
                pagerOptions = {
                    container: $(".pager"),
                    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
                    fixedHeight: true,
                    removeRows: false,
                    cssGoto: '.gotoPage'
                };
            $table
                .tablesorter({
                    theme: 'blue',
                    headerTemplate: '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
                    widthFixed: true,
                    widgets: ['zebra', 'filter'],
                    widgetOptions: {
                        filter_cssFilter: '',
                        filter_childRows: false,
                        filter_hideFilters: false,
                        filter_ignoreCase: true,
                        filter_reset: '.reset',
                        filter_saveFilters: true,
                        filter_searchDelay: 300,
                        filter_startsWith: false,
                        filter_functions: {
                            1: function (e, n, f, i, $r, c, data) {
                                return e === f;
                            },
                            15: {
                                "pending": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                },
                                "Payment Made": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                },
                                "Completed": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                }
                            },
                            17: {
                                "Unfilled": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                },
                                "Clock": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                },
                                "accepted": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                },
                                "rejected": function (e, n, f, i, $r, c, data) {
                                    return e === f;
                                }
                            },

                            4: function ($cell, indx) {
                                return $.tablesorter.filterFormatter.uiDateCompare($cell, indx, {
                                    cellText: 'Dates', // text added before the input
                                    compare: ['', '=', '>=', '<='],
                                    selected: 3,
                                    changeMonth: true,
                                    changeYear: true
                                });
                            }
                        }
                    }
                })
                .tablesorterPager(pagerOptions);
            var r, $row, num = 50,
                row = '<tr><td>Student{i}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td><td><button type="button" class="remove" title="Remove this row">X</button></td></tr>' +
                    '<tr><td>Student{j}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td><td><button type="button" class="remove" title="Remove this row">X</button></td></tr>';
            $('button:contains(Add)').click(function () {
                r = row.replace(/\{[gijmr]\}/g, function (m) {
                    return {
                        '{i}': num + 1,
                        '{j}': num + 2,
                        '{r}': Math.round(Math.random() * 100),
                        '{g}': Math.random() > 0.5 ? 'male' : 'female',
                        '{m}': Math.random() > 0.5 ? 'Mathematics' : 'Languages'
                    }[m];
                });
                num = num + 2;
                $row = $(r);
                $table
                    .find('tbody').append($row)
                    .trigger('addRows', [$row]);
                return false;
            });
            $table.delegate('button.remove', 'click', function () {
                $table.trigger('disablePager');
                $(this).closest('tr').remove();
                $table.trigger('enablePager');
            });
            $('button:contains(Destroy)').click(function () {
                var $t = $(this);
                if (/Destroy/.test($t.text())) {
                    $table.trigger('destroyPager');
                    $t.text('Restore Pager');
                } else {
                    $table.tablesorterPager(pagerOptions);
                    $t.text('Destroy Pager');
                }
                return false;
            });

            // Disable / Enable
            // **************
            $('.toggle').click(function () {
                var mode = /Disable/.test($(this).text());
                // triggering disablePager or enablePager
                $table.trigger((mode ? 'disable' : 'enable') + 'Pager');
                $(this).text(( mode ? 'Enable' : 'Disable' ) + ' Pager');
                return false;
            });
            $table.bind('pagerChange', function () {
                // pager automatically enables when table is sorted.
                $('.toggle').text('Disable Pager');
            });

        });

        jQuery(document).ready(function () {
            setTimeout(function () {
                jQuery(".tablesorter-filter-row td:nth-child(1) input").attr("id", "omkar");
                jQuery(".tablesorter-filter-row td:nth-child(8) input").attr("id", "omkar8");
                jQuery(".tablesorter-filter-row td:nth-child(17) input").attr("id", "omkar17");

                var str = '<tr class="sticky-row" ><th colspan="10" style="background: none;width:59.8%;border:0px !important">&nbsp;</th><th colspan="2" class="tdorange" style="width: 10%;border:0px !important">Initial offer</th><th colspan="3" class="tdgreen1" style="width: 15.3%;border:0px !important">Customer Offer</th><th colspan="3"></th></tr> ';
                var dateTypeVar = jQuery("#omkar").datepicker();
                jQuery("#omkar8").datepicker();
                jQuery("#omkar17").datepicker();
                $(".tablesorter thead").prepend(str);
            }, 1000);
        });
    </script>
    <script>
        $(document).ready(function () {
            var x = setInterval(function () {
                $.ajax({
                    url: url + "/check/post/time",
                    type: "get",
                    success: function (result) {
                        var data = $.parseJSON(result);
                        $.each(data.time, function (i, v) {
                            if (v == 'accepted' || v == 'Unfilled') {
                                $(".timer-" + i).remove();
                                $("#change_status-" + i).text(v);
                                $("#change_status1-" + i).html('');
                            }
                            else {
                                $('#time-' + i).text(v);
                                $("#change_status-" + i).text(v);
                            }
                        });
                    }
                });
            }, 1000);
        });
    </script>
@stop