<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SupplierPost;
use App\Models\SupplierPostTemp;
use App\Models\Category;
use App\Models\Setting;
use App\Models\ProductTag;
use App\Models\Expiry;
use App\Models\Product;
use App\Models\BuyerPost;
use App\Models\SupplierAllocation;
use App\Models\Pool;
use App\Models\User;
use App\Models\WareHouse;
use App\Models\Sku;
use DateTime;
use App\Libraries\ZnUtilities;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'registration']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user_role = Auth::user()->user_role;

        if ($user_role == 1) {

            return redirect('/dashboard');
        } else if ($user_role == 2) {


            $data = array();
            $supplier_posts = SupplierPost::where('is_allocation', '0')->get();
            $post_ids = array();

            foreach ($supplier_posts as $s) {

                $current_date = date("Y-m-d H:i:s");
                $date = new DateTime($s->created_at);
                $date->modify("+" . $s->order_duration . " hours");
                $new_time = $date->format("Y-m-d H:i:s");

                if (strtotime($new_time) > strtotime($current_date)) {

                    $user2 = User::where('id', $s->user_id)->first();
                    $supplier_post_pool = explode(',', $s->pool);
                    $buyer_pool = explode(',', Auth::user()->pool);

                    $buyer_km_pool1 = Pool::whereIn('id', $buyer_pool)->where('pool_type', '2')->where('distance', '>', '0')->orderBy('distance', 'desc')->first();
                    $buyer_pre_pool1 = Pool::whereIn('id', $buyer_pool)->where('pool_type', '1')->get()->pluck('id')->toArray();
                    $buyer_pool9 = Pool::whereIn('id', $buyer_pool)->where('pool_type', '3')->get()->pluck('id')->toArray();

                    if (isset($buyer_km_pool1) && $buyer_km_pool1->distance > 0) {
                        $buyer_pool12 = $buyer_km_pool1->distance;
                    } else {
                        $buyer_pool12 = '0';
                    }

                    $supplier_km_pool1 = Pool::whereIn('id', $supplier_post_pool)->where('pool_type', '2')->where('distance', '>', '0')->orderBy('distance', 'desc')->first();
                    $supplier_pre_pool1 = Pool::whereIn('id', $supplier_post_pool)->where('pool_type', '1')->get()->pluck('id')->toArray();
                    $supplier_buyer_pool = Pool::whereIn('id', $supplier_post_pool)->where('pool_type', '3')->get()->pluck('id')->toArray();

                    if (isset($supplier_km_pool1) && $supplier_km_pool1->distance > 0) {
                        $supplier_pool12 = $supplier_km_pool1->distance;
                    } else {
                        $supplier_pool12 = '0';
                    }

                    $pre_pool_result = array_intersect($supplier_pre_pool1, $buyer_pre_pool1);
                    $buyer_pool_result = array_intersect($supplier_buyer_pool, $buyer_pool9);

                    $distance = ZnUtilities::getUserDistance($user2->id, Auth::user()->id);

                    $unlimited_pool_id = '0';
                    $unlimited_pool = Pool::where('pool_name', 'Unlimited Distance')->orwhere('pool_name', 'Unlimited')->orwhere('pool_name', 'unlimited')->first();
                    if ($unlimited_pool) {
                        $unlimited_pool_id = $unlimited_pool->id;
                    }

                    if (count($supplier_pre_pool1) > 0 || count($supplier_buyer_pool) > 0) {
                        if (in_array('17', $supplier_pre_pool1) && count($buyer_pre_pool1) > 0) {
                            if ($supplier_pool12 != 0) {
                                if ($distance <= $supplier_pool12) {
                                    $post_ids[] = $s->supplier_post_id;
                                }
                            } else {
                                $post_ids[] = $s->supplier_post_id;
                            }
                        } else {
                            if (count($supplier_pre_pool1) > 0 && count($supplier_buyer_pool) > 0) {
                                if (count($pre_pool_result) > 0 && count($buyer_pool_result) > 0) {

                                    if ($supplier_pool12 != 0) {
                                        if ($distance <= $supplier_pool12) {
                                            $post_ids[] = $s->supplier_post_id;
                                        }
                                    } else {
                                        $post_ids[] = $s->supplier_post_id;
                                    }
                                }
                            } else if (count($supplier_pre_pool1) > 0 && count($supplier_buyer_pool) == 0) {
                                if (count($pre_pool_result) > 0 && count($buyer_pool_result) == '0') {

                                    if ($supplier_pool12 != 0) {
                                        if ($distance <= $supplier_pool12) {
                                            $post_ids[] = $s->supplier_post_id;
                                        }
                                    } else {
                                        $post_ids[] = $s->supplier_post_id;
                                    }

                                }
                            } else if (count($supplier_pre_pool1) == 0 && count($supplier_buyer_pool) > 0) {
                                if (count($pre_pool_result) == 0 && count($buyer_pool_result) > 0) {

                                    if ($supplier_pool12 != 0) {
                                        if ($distance <= $supplier_pool12) {
                                            $post_ids[] = $s->supplier_post_id;
                                        }
                                    } else {
                                        $post_ids[] = $s->supplier_post_id;
                                    }
                                }
                            }

                        }
                    } else {
                        if (in_array($unlimited_pool_id, $supplier_post_pool)) {
                            $post_ids[] = $s->supplier_post_id;
                        } else {
                            /* Added by me(nitesh) 20sep for those buyer and suplier that have no pool assigned */
                            if (($buyer_pool12 != 0) && ($supplier_pool12 != 0)) {
                                if (($distance <= $buyer_pool12) && ($distance <= $supplier_pool12)) {
                                    $post_ids[] = $s->supplier_post_id;
                                }
                            } else if (($buyer_pool12 != 0) && ($supplier_pool12 == 0)) {
                                if ($distance <= $buyer_pool12) {
                                    $post_ids[] = $s->supplier_post_id;
                                }
                            } else if (($buyer_pool12 == 0) && ($supplier_pool12 != 0)) {
                                if ($distance <= $supplier_pool12) {
                                    $post_ids[] = $s->supplier_post_id;
                                }
                            }
                            /* Added by me(nitesh) 20sep for those buyer and suplier that have no pool assigned */
                        }
                    }
                }
            }

            $itemsIds = BuyerPost::where('user_id', Auth::user()->id)->get()->pluck('supplier_post_id')->toArray();

            /* DB::enableQueryLog(); */
            $data['buyer'] = SupplierPost::whereIn('supplier_post_id', $post_ids)->whereNotIn('supplier_post_id', $itemsIds)->with('skuInfo', 'userInfo')->get();
            /* $query = DB::getQueryLog();
            print_r($query); */

            $buyer_post_ids = DB::table('buyer_posts')->where('user_id', Auth::user()->id)->pluck('buyer_post_id');
            $supplier_post_ids = DB::table('supplier_allocations')->whereIn('buyer_post_id', $buyer_post_ids)->pluck('supplier_post_id');
            // $data['items'] = SupplierAllocation::where('buyer_id', Auth::user()->id)->get();
            $data['items'] = BuyerPost::where('user_id', Auth::user()->id)->where('status', '!=', 'Declined')->where('is_low_bid', '0')->with('skuInfo')->get();
            //echo "<pre>"; print_r($data['buyer']); exit;

            return view('frontend.buyer', $data);
        } else if ($user_role == 3) {

            $data = array();
            $post_ids = array();
            $supplier_post1 = SupplierPost::where('user_id', Auth::user()->id)->get();

            foreach ($supplier_post1 as $s) {
                // print_r('creted-at...'.$s->created_at);
                // die;
                $current_date = date("Y-m-d H:i:s");
                $date = new DateTime($s->created_at);
                $date->modify("+" . $s->order_duration . " hours");
                $new_time = $date->format("Y-m-d H:i:s");
                if ($s->status == 'pending') {
                    if (strtotime($new_time) > strtotime($current_date)) {
                        $post_ids[] = $s->supplier_post_id;
                    }
                } else {
                    $post_ids[] = $s->supplier_post_id;
                }
            }


            $data['items'] = SupplierPost::orderBy('price', 'desc')->whereIn('supplier_post_id', $post_ids)->where('user_id', Auth::user()->id)->with('product', 'category', 'userInfo')->get();

            // var_dump($data['items']);
            // exit(0);
            $data['imported'] = SupplierPostTemp::orderBy('supplier_post_id', 'asc')->where('user_id', Auth::user()->id)->where('flag', 0)->get();

            $setting = Setting::where('setting_name', 'product_detail')->first();
            $data['setting'] = Setting::where('setting_name', 'product_detail')->first();
            $remainingdays = Expiry::get();
            $data['durations'] = explode(',', $setting->duration);

            $data['sku'] = Sku::where('is_use', '0')->get();
            //$data['productTag'] = ProductTag::get();
            $data['remainingdays'] = $remainingdays;

            $data['warehouse'] = User::where('user_role', '3')->get();
            $data['userinfo'] = User::where('user_role', '2')->get();
            //$data['buyer'] = SupplierPost::whereIn('supplier_post_id', $post_ids)->whereNotIn('supplier_post_id', $itemsIds)->with('skuInfo', 'userInfo')->get();

            return view('frontend.supplier', $data);
        }
    }

    public function dashboard()
    {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        return view('adminDashboard');
    }
}
