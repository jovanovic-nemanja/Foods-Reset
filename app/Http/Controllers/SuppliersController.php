<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\SupplierPost;
use App\Models\Expiry;
use App\Models\SupplierPostTemp;
use App\Models\BuyerPost;
use App\Models\SupplierOtherProduct;
use App\Models\SupplierAllocation;
use App\Models\BuyerPostProduct;
//use App\SupplierProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Setting;
use App\Models\BankDetail;
use App\Models\Notification;
use App\Models\Sku;
use App\Models\Pool;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Libraries\ZnUtilities;
use App\Libraries\ZParseCsv;
use App\Libraries\SimpleXLSX;
use DateTime;

class SuppliersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_role = Auth::user()->user_role;
        if ($user_role == 1) {
            return redirect('/dashboard');
        } else if ($user_role == 2) {

            return view('frontend.buyer');
        } else if ($user_role == 3) {

            return view('frontend.supplier');
        }
    }

    public function dashboard() {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        return view('adminDashboard');
    }

    public function store(Request $request){

        if(Auth::user()->user_role != 3) {
           return redirect('/');
        }

        if(Auth::user()->address == '' || Auth::user()->lat == '' || Auth::user()->lng == ''){
            return redirect()->back()->with('fail', 'Please Update Your Profile. Before The Post Submit. Go to "My Public Profile" Button In Left Side Drop Down.');
        }

        /*  echo '<pre>';
    		print_r($_POST);
    		$pdata = $request->get('pdata');
    		print_r($pdata);
    		echo '</pre>';
    		die; */
        $userData = User::where('user_role', '2')->get();
		    $pdata = $request->get('pdata');
        foreach ($pdata as $key => $val){

			if(count($val)!=15) break;

            $supplierIds = array();
            $sku = Sku::where('sku', $val['sku'])->where('is_use', '0')->first();
            if (!$sku){
                $sku = new Sku();
                $sku->sku = $val['sku'];
                $sku->created_by = Auth::user()->id;
                $sku->save();
            }

            $supplier_post = new SupplierPost();
            $supplier_post->sku = $sku->id;
            $supplier_post->category = $val['category'];
            $supplier_post->quantity = str_replace(',', '', $val['quantity']);
            $supplier_post->price = str_replace(',', '', $val['min_price']);
            $supplier_post->description = $val['description'];
            $supplier_post->unit_per_case = $val['unit_per_case'];
            $supplier_post->net_weight = $val['net_weight'];
            $supplier_post->list_price = str_replace(',', '', $val['list_price']);
            $supplier_post->per_case_price = $val['per_case_price'];
            $supplier_post->user_id = Auth::user()->id;
            $supplier_post->order_duration = $val['order_duration'];
            $supplier_post->delivery_window = $val['delivery_window'];
            $supplier_post->delivery_window_to = $val['delivery_window_to'];
			      $supplier_post->expiry = date('Y-m-d', strtotime($val['expiry']));
            $supplier_post->product_location = $val['product_location'];
            $supplier_post->pool = implode(',', $val['pool_name']);

            //echo "<pre>"; print_r($supplier_post); exit;

			      $supplier_post->save();

			      DB::table('sku')->where('id', $sku->id)->update(['is_use' => '1']);

            $supplier_post_pool = explode(',', $supplier_post->pool);
            foreach ($userData as $u) {

                $buyer_pool = explode(',', $u->pool);

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
                // supplier pool type buyer pool


                $pre_pool_result = array_intersect($supplier_pre_pool1, $buyer_pre_pool1);
                $buyer_pool_result = array_intersect($supplier_buyer_pool, $buyer_pool9);


                $distance = ZnUtilities::getUserDistance($u->id, Auth::user()->id);

                $dest[$u->id] = $distance; /* for testing  */

                $unlimited_pool_id = '0';
                $unlimited_pool = Pool::where('pool_name', 'Unlimited Distance')->orwhere('pool_name', 'Unlimited')->orwhere('pool_name', 'unlimited')->first();
                if ($unlimited_pool) {
                    $unlimited_pool_id = $unlimited_pool->id;
                }

//                print_r(count($buyer_pool_result)); die;
                if (count($supplier_pre_pool1) > 0 || count($supplier_buyer_pool) > 0) {
//                    echo 'case-1';
                    if(in_array('17', $supplier_pre_pool1) && count($buyer_pre_pool1) > 0) {
                        if($supplier_pool12 != 0){
                            if($distance <= $supplier_pool12) {
                                $supplierIds[] = $u->id;
                            }
                            }else{
                                $supplierIds[] = $u->id;
                        }
                    }
                    else {
                    if (count($supplier_pre_pool1) > 0 && count($supplier_buyer_pool) > 0) {
                        if (count($pre_pool_result) > 0 && count($buyer_pool_result) > 0) {

                            if($supplier_pool12 != 0){
                                if($distance <= $supplier_pool12) {
                                   $supplierIds[] = $u->id;
                                }
                            }else{
                               $supplierIds[] = $u->id;
                            }
                        }
                    }
                     else if (count($supplier_pre_pool1) > 0 && count($supplier_buyer_pool) == 0){
                        if(count($pre_pool_result) > 0 && count($buyer_pool_result) == '0'){

                            if($supplier_pool12 != 0) {
                                if($distance <= $supplier_pool12) {
                                   $supplierIds[] = $u->id;
                                }
                            }else{
                               $supplierIds[] = $u->id;
                            }

                        }
                     }
                    else if(count($supplier_pre_pool1) == 0 && count($supplier_buyer_pool) > 0) {
                        if(count($pre_pool_result) == 0 && count($buyer_pool_result) > 0) {

                           if($supplier_pool12 != 0){
                              if($distance <= $supplier_pool12){
                                 $supplierIds[] = $u->id;
                              }
                            }else{
                                $supplierIds[] = $u->id;
                            }
                        }
                    }

                }
                }
                else {

                    if(in_array($unlimited_pool_id, $supplier_post_pool)){
//                        echo 'case-2';
                        $supplierIds[] = $u->id;
                    } else {
//                        echo 'case-3';
                        /* Added by me(nitesh) 20sep for those buyer and suplier that have no pool assigned */
                        if (($buyer_pool12 != 0) && ($supplier_pool12 != 0)) {
                            if (($distance <= $buyer_pool12) && ($distance <= $supplier_pool12)) {
//                                          echo 'case-3-1';
                                $supplierIds[] = $u->id;
                            }
                        } else if (($buyer_pool12 != 0) && ($supplier_pool12 == 0)) {
                            if ($distance <= $buyer_pool12) {
//                                              echo 'case-3-2';
                                $supplierIds[] = $u->id;
                            }
                        } else if (($buyer_pool12 == 0) && ($supplier_pool12 != 0)) {
                            if ($distance <= $supplier_pool12) {
//                                            echo 'case-3-3';
                                $supplierIds[] = $u->id;
                            }
                        }
                        /* Added by me(nitesh) 20sep for those buyer and suplier that have no pool assigned */
                    }
                }
            }
        // echo "<pre>";  print_r($supplierIds);  die;
        if (count($supplierIds) > 0) {
                $data = array();

                $userData1 = User::whereIn('id', $supplierIds)->get();
//              print_r($supplierIds);  print_r($userData1); die;
                foreach ($userData1 as $u) {
                    $data['supplier_post'] = SupplierPost::where('supplier_post_id', $supplier_post->supplier_post_id)->with('skuInfo')->get();
                    $data['user_info'] = $u;
             /*
             Mail::send('emails.notify_to_buyer', $data, function ($message) use ($u) {
                   // $message->to($u->email, $u->name)->subject('Supplier Post Detail');
                  // $message->to('avistcengg@gmail.com', $u->name)->subject('Supplier Post Detail');
               });
               */

                }
            }
        }



//      print_r($supplierIds); die;


        return redirect('/');
    }

    public function reissue_post($supplier_post_id,$buyer_post_id){
       $supplier_post_db = SupplierPost::where('supplier_post_id', $supplier_post_id)->first();
       $buyer_post = BuyerPost::where('buyer_post_id', $buyer_post_id)->first();

       if($supplier_post_db->status=='rejected'){
          $remain_qty= $supplier_post_db->quantity;
       }else{
          $remain_qty= ($supplier_post_db->quantity)-($buyer_post->buyer_bid_quantity);
       }

	   ///$remain_qty= $supplier_post_db->quantity;

       $supplier_post = new SupplierPost();
       $supplier_post->sku = $supplier_post_db->sku;
       $supplier_post->category = $supplier_post_db->category;
       $supplier_post->quantity = $remain_qty;
       $supplier_post->price = $supplier_post_db->price;
       $supplier_post->description = $supplier_post_db->description;
       $supplier_post->unit_per_case = $supplier_post_db->unit_per_case;
       $supplier_post->net_weight = $supplier_post_db->net_weight;
       $supplier_post->list_price = $supplier_post_db->list_price;
       $supplier_post->per_case_price = $supplier_post_db->per_case_price;
       $supplier_post->user_id = $supplier_post_db->user_id;
       $supplier_post->order_duration = $supplier_post_db->order_duration;
       $supplier_post->delivery_window = $supplier_post_db->delivery_window;
       $supplier_post->delivery_window_to = $supplier_post_db->delivery_window_to;
       $supplier_post->expiry = $supplier_post_db->expiry;
       $supplier_post->product_location = $supplier_post_db->product_location;
       $supplier_post->pool = $supplier_post_db->pool;
       //echo "<pre>"; print_r($supplier_post); exit;
       //save
       $supplier_post->save();

       // upade earlier suplier post
	   // Commented on 22-01-2018
       //DB::table('supplier_posts')->where('supplier_post_id', $supplier_post_id)->update(['quantity' => $buyer_post->buyer_bid_quantity]);

       return redirect('/');

    }

    public function addcsv(Request $request) {

        if (Auth::user()->user_role != 3) {
            return redirect('/');
        }

        if($file = $request->hasFile('fileToUpload')){
            $file = $request->file('fileToUpload');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/files/';
            $file->move($destinationPath, $fileName);

            $fname = $destinationPath . $fileName;
        }

        $csv_obj = new SimpleXLSX($fname);

        $content = $csv_obj->parse($fname);
		    $flgstrtrd=0;
		    $csvdata=array();

        foreach($content->rows() as $k => $v){
      			if($flgstrtrd!=1){
      				if($v[0]=='Category'){
      					$flgstrtrd++;
      				}
      				continue;
      			}
      			if($flgstrtrd==1 && $v[0]==''){
      				break;
      			}

            if ($v[0] != '' && $v[1] != '' && $v[10] != '' && $v[6] != '') {
                $supplier_post = new SupplierPostTemp();
                $supplier_post->sku = $v[1];
        				$supplier_post->category = $v[0];
        				$supplier_post->quantity = str_replace(',','', $v[7]);
        				$supplier_post->price = str_replace(',','', str_replace('$', '',$v[10]));
        				$supplier_post->description = $v[2];
        				$supplier_post->unit_per_case = $v[3];
        				$supplier_post->net_weight = $v[4];
        				$supplier_post->list_price = str_replace(',','', str_replace('$', '',$v[8]));
        				$supplier_post->per_case_price =  str_replace(',','', str_replace('$', '',$v[9]));
        				$supplier_post->user_id = Auth::user()->id;
        				$supplier_post->order_duration = '36';
        				$supplier_post->product_location = $v[5];
        				$supplier_post->pool='8';
        				$supplier_post->expiry = date('Y-m-d', strtotime($v[6]));

                $csvdata[]=$supplier_post;
            }
		    }

    		$data = array();
    		$post_ids = array();
    		$supplier_post1 = SupplierPost::where('user_id', Auth::user()->id)->get();
    		foreach ($supplier_post1 as $s) {
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
		    $data['imported'] = $csvdata;


    		$setting = Setting::where('setting_name', 'product_detail')->first();
    		$data['setting'] = Setting::where('setting_name', 'product_detail')->first();
    		$remainingdays = Expiry::get();
    		$data['durations'] = explode(',', $setting->duration);

    		$data['sku'] = Sku::where('is_use', '0')->get();
        // $data['productTag'] = ProductTag::get();
    		$data['remainingdays'] = $remainingdays;

		    $data['warehouse'] = User::where('user_role', '3')->get();
		    return view('frontend.supplier', $data);
    }

    public function allSuppliers() {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $user_role = Auth::user()->user_role;

        $data = array();


        $data['suppliers'] = User::where('user_role', '3')->get();

        $data['title'] = 'All Suppliers';
        $data['content_header'] = 'Suppliers';
        $data['content_header_1'] = 'All Suppliers';

        return view('admin.suppliers.list', $data);
    }

    public function showSuppliersPost($id) {


        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $user_role = Auth::user()->user_role;

        $data = array();
        $user_info = User::find($id);

        $data['items'] = SupplierPost::where('user_id', $id)->with('product', 'category', 'poolName', 'skuInfo')->orderBy('supplier_post_id', 'desc')->get();


        $data['title'] = 'All Suppliers';

        $data['content_header'] = $user_info->name;
        $data['content_header_1'] = 'Supplier Post';

        return view('admin.suppliers.supplier_post', $data);
    }

    public function showSingleSuppliersPost($id) {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();


        $data['items'] = SupplierPost::where('supplier_post_id', $id)->with('product', 'category')->first();
        $user_info = User::find($data['items']->user_id);
        $data['title'] = $user_info->name . ' Suppliers';

        $data['content_header'] = $user_info->name;
        $data['content_header_1'] = 'Supplier Post';

        return view('admin.suppliers.single_supplier_post', $data);
    }

//    public function allSuppliers() {
//        $user_role = Auth::user()->user_role;
//
//        $data = array();
//
//        $data['items'] = SupplierPost::orderBy('supplier_post_id', 'desc')->with('product')->get();
//        $data['items2'] = SupplierOtherProduct::orderBy('id', 'desc')->get();
//
//        $data['title'] = 'All Suppliers';
//
//        return view('suppliers.list', $data);
//    }

    public function allocation($id, $type = null) {
        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();
        $data1 = array();
        $data['is_save'] = 0;


        $is_save = SupplierAllocation::where('supplier_post_id', $id)->first();
        $data['is_other_post'] = '0';
        $data['supplier_post_id'] = $id;
        $supplier_info = SupplierPost::where('supplier_post_id', $id)->first();
        $s_userInfo = User::where('id', $supplier_info->user_id)->first();
        $data['supplier_detail'] = $supplier_info;
        if (!$is_save) {
            $supplier_price = ($supplier_info->price * 20 / 100) + $supplier_info->price;
            $data1 = $this->matchingBuyer($id);




            $buyer_ids = array();
            $buyer_quantity = array();
            $buyer_quantity2 = array();
            foreach ($data1 as $d) {
//                echo "price==".$d->price."===";
                $buyer_quantity[] = $d->quantity;
                $buyer_quantity1 = array_sum($buyer_quantity);

                if ($buyer_quantity1 < $supplier_info->quantity) {
                    $buyer_ids[] = $d->buyer_post_id;
                    $buyer_quantity2[] = $d->quantity;
                } elseif (($supplier_info->quantity - array_sum($buyer_quantity2)) > 0 && ($supplier_info->quantity - array_sum($buyer_quantity2)) != 0) {
                    $supplier_info->quantity - $buyer_quantity1;
                    $buyer_ids[] = $d->buyer_post_id;
                    $buyer_quantity2[] = $supplier_info->quantity - array_sum($buyer_quantity2);
                }
            }

            $data['buyer_details'] = BuyerPost::whereIn('buyer_post_id', $buyer_ids)->with('product')->orderBy('price', 'desc')->get();
        } else {
            $data['is_save'] = 1;
            $data['allocations'] = SupplierAllocation::where('supplier_post_id', $id)->with('category')->get();
        }


        $user_info1 = User::where('id', $supplier_info->user_id)->first();
        $data['content_header_1'] = 'Supplier Allocation Details';
        $data['content_header'] = $user_info1->name;
        return view('admin.suppliers.supplier_allocation', $data);
    }

    public function storeAllocation(Request $request, $id, $type = null) {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $data11 = array();
//        print_r($request->all());  die;
        $buyer_post = $request->get('buyer_post');
        $buyer_id = $request->get('buyer_id');
        $supplier_id = $request->get('supplier_id');
        $supplier_post_id = $request->get('supplier_post_id');
        $category_id = $request->get('category_id');
        $product_id = $request->get('product_id');
        $quantity = $request->get('quantity');
        $allocation = $request->get('allocation');
        $buyer_post = $request->get('buyer_post');
        $is_other_post = $request->get('is_other_post');

        foreach ($buyer_post as $key => $b) {
            $supp_allocation = new SupplierAllocation();
            $is_save = SupplierAllocation::where('buyer_post_id', $buyer_post[$key])->where('supplier_post_id', $supplier_post_id)->first();

            if (!$is_save) {

                $supp_allocation = new SupplierAllocation();
                $supp_allocation->is_other_post = $is_other_post;
                $supp_allocation->product_id = $product_id[$key];
                $supp_allocation->supplier_post_id = $supplier_post_id;
                $supp_allocation->buyer_post_id = $buyer_post[$key];

                $data11['product_name'] = ZnUtilities::getProductName($product_id[$key]);

                $supp_allocation->supplier_id = $supplier_id;
                $supp_allocation->buyer_id = $buyer_id[$key];
                $supp_allocation->allocation = $allocation[$key];
                $supp_allocation->requried_quantity = $quantity[$key];
                $supp_allocation->category_id = $category_id;
                $supp_allocation->reallocation = '';
                $supp_allocation->is_email_sent = '1';
                $supp_allocation->is_allocation_email = '1';
                $supp_allocation->status = 'pending';
                $supp_allocation->save();

                $buyer_post_info = BuyerPost::where('buyer_post_id', $buyer_post[$key])->with('category')->first();
                $supplier_post_info = SupplierPost::where('supplier_post_id', $supplier_post_id)->first();
                $supplier_info = User::where('id', $supplier_id)->first();
                $data11['buyer_post_info'] = $buyer_post_info;
                $data11['bank_detail'] = Setting::where('setting_name', 'product_detail')->first()->bank_detail;
                $data11['supplier_info'] = $supplier_info;
                $data11['supplier_post_info'] = $supplier_post_info;

                $bank = new BankDetail();
                $bank->supplier_post_id = $supplier_post_id;
                $bank->buyer_post_id = $buyer_post[$key];
                $bank->supplier_id = $supplier_id;
                $bank->buyer_id = $buyer_id[$key];
                $bank->allocation = $allocation[$key];
                $bank->allocation_id = $supp_allocation->id;
                $bank->quantity = $quantity[$key];
                $bank->buyer_price = $buyer_post_info->price;
                $bank->supplier_price = $supplier_post_info->price;
                $bank->supplier_total = $supplier_post_info->price * $allocation[$key];
                $bank->buyer_total = $buyer_post_info->price * $allocation[$key];
                $bank->status = 'pending';
                $bank->save();


                $user_info = User::where('id', $buyer_id[$key])->first();
                $data11['user_info'] = $user_info->name;
                $data11['quantity'] = $quantity[$key];
                $data11['allocation'] = $supp_allocation;
                $data11['is_other_post'] = $is_other_post;
                $data11['supplier_id'] = $supplier_id;
                $data11['buyer_id'] = $buyer_id[$key];
                $data11['supp_allocation_id'] = $supp_allocation->id;

//                Mail::send('emails.buyer_bank', $data11, function ($message) use ($user_info) {
//                    $message->to($user_info->email, $user_info->name)
//                            ->subject('Allocation & Bank Detail');
//                });

                Mail::send('emails.supplier_bank', $data11, function ($message) use ($supplier_info) {
                    $message->to($supplier_info->email, $supplier_info->name)
                            ->subject('Send Bank Detail');
                });

                $is_noti = Notification::where('allocation_id', $supp_allocation->id)->first();
                if (!$is_noti) {
                    $noti = new Notification();
                    $noti->notification_title = 'Allocation';
                    $noti->notification_content = 'We Have Allocated ' . number_format($supp_allocation->allocation) . ' Allocation and Please find the bank detail in your mail';
                    $noti->status = 'unread';
                    $noti->supplier_id = $supplier_id;
                    $noti->buyer_id = $buyer_id[$key];
                    $noti->allocation_id = $supp_allocation->id;
                    $noti->user_id = $buyer_id[$key];
                    $noti->save();

                    $noti = new Notification();
                    $noti->notification_title = 'Send Bank Detail';
                    $noti->notification_content = 'We Have Allocated ' . number_format($supp_allocation->allocation) . 'Allocation to buyer and Please send the bank detail.';
                    $noti->status = 'unread';
                    $noti->supplier_id = $supplier_id;
                    $noti->buyer_id = $buyer_id[$key];
                    $noti->allocation_id = $supp_allocation->id;
                    $noti->user_id = $supplier_id;
                    $noti->save();
                }
            }
        }




        return redirect()->back();
    }

    public function allAllocation() {

        if (Auth::user()->user_role == 1) {
            return redirect('/');
        }
        $data = array();
        $user_id = Auth::user()->id;


        if (Auth::user()->user_role == 3) {
            DB::table('notifications')->where('user_id', $user_id)->update(['status' => 'read']);
            $data['allocation'] = SupplierAllocation::where('supplier_id', $user_id)->get();
        } else {
            $data['allocation'] = SupplierAllocation::where('buyer_id', $user_id)->with('category')->get();
        }

        return view('all_allocation', $data);
    }

    public function supplierAllocation($id, $type = Null) {

        $data = array();
        $user_id = Auth::user()->id;


        $supplier_info = SupplierPost::where('supplier_post_id', $id)->first();
        $data['allocations'] = SupplierAllocation::where('supplier_post_id', $id)->with('category')->get();
        $data['supplier_detail'] = $supplier_info;


        return view('supplier_allocation', $data);
    }

    public function showAllocation($allocation_id, $noti_id) {


        $data = array();
        $user_id = Auth::user()->id;
        DB::table('notifications')->where('id', $noti_id)->update(['status' => 'read']);
        $data['allocation'] = SupplierAllocation::where('id', $allocation_id)->with('category')->first();
        return view('frontend.single_allocation', $data);
    }

    public function allNotification() {

        if (Auth::user()->user_role == 1) {
            return redirect('/');
        }
        $data = array();
        $user_id = Auth::user()->id;

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
                    }
                    else {
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
                    }
                     else if (count($supplier_pre_pool1) > 0 && count($supplier_buyer_pool) == 0) {
                                if (count($pre_pool_result) > 0 && count($buyer_pool_result) == '0') {

                                                              if ($supplier_pool12 != 0) {
                                                            if ($distance <= $supplier_pool12) {
                                                                $post_ids[] = $s->supplier_post_id;
                                                            }
                                                        } else {
                                                            $post_ids[] = $s->supplier_post_id;
                                                        }

                                }
                     }
                    else if (count($supplier_pre_pool1) == 0 && count($supplier_buyer_pool) > 0) {
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
                }
                    else {
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

            $buyer_post_ids = DB::table('buyer_posts')->where('user_id', Auth::user()->id)->pluck('buyer_post_id')->toArray();
            $supplier_post_ids = DB::table('supplier_allocations')->whereIn('buyer_post_id', $buyer_post_ids)->pluck('supplier_post_id')->toArray();
            // $data['items'] = SupplierAllocation::where('buyer_id', Auth::user()->id)->get();
            $data['items'] = BuyerPost::where('user_id', Auth::user()->id)->where('buyer_bid_quantity','=','')->where('is_low_bid', '0')->with('skuInfo')->get();

        $data['notifications'] = Notification::where('user_id', $user_id)->orderBy('id', 'desc')->get();

        return view('frontend.all_notification', $data);
    }

    public function updateAllocationStatus($type, $id) {

        if (Auth::user()->user_role != 3) {
            return redirect('/');
        }

        $allocation = SupplierAllocation::where('id', $id)->first();


        if ($allocation->status == 'reject') {

            return redirect('/allallocation')->with('fail', 'You have already change the status of this Allocation.');
        }

        if ($allocation->status == $type) {
            return redirect('/allallocation')->with('fail', 'You have already change the status of this Allocation.');
        } else {



            $buyer1_info = BuyerPost::where('buyer_post_id', $allocation->buyer_post_id)->first();
            if (Auth::user()->id != $buyer1_info->user_id) {
                return redirect('/logout?id=4');
            }


            $data11 = array();
            $data12 = array();

            $allocation->status = $type;
            $allocation->save();





//        if ($type == 'reject') {
//            $allocation1 = SupplierAllocation::where('id', $id)->first();
//            $supplier_info = SupplierPost::where('supplier_post_id', $allocation1->supplier_post_id)->first();
//            $supplierQuantity = $supplier_info->quantity;
//
//            $all_allocation = SupplierAllocation::where('supplier_post_id', $allocation1->supplier_post_id)->where('status', '!=', 'reject')->get();
//            $all_buyer_allocation = DB::table('supplier_allocations')->where('supplier_post_id', $allocation1->supplier_post_id)->where('parent_id', '0')->lists('buyer_post_id');
//
////            $total_sent_allocation = SupplierAllocation::where('supplier_post_id',$allocation1->supplier_post_id)->where('status','!=','reject')->where('parent_id','0')->get();
//            $total_sent_allocation = DB::table('supplier_allocations')->where('supplier_post_id', $allocation1->supplier_post_id)->where('status', '!=', 'reject')->where('parent_id', '0')->lists('allocation');
//            $total_sent_reallocation = DB::table('supplier_allocations')->where('supplier_post_id', $allocation1->supplier_post_id)->where('status', '!=', 'reject')->where('parent_id', '>', '0')->lists('reallocation');
//
//            $total_sent = array_sum($total_sent_allocation) + array_sum($total_sent_reallocation);
//            $pending_quantity = $supplierQuantity - $total_sent;
//
//
//            foreach ($all_allocation as $aa) {
//
//                if ($pending_quantity > 0) {
//                    $t_reallocation = DB::table('supplier_allocations')->where('status', '!=', 'reject')->where('parent_id', $aa->id)->lists('reallocation');
//                    $check_reallocation_status = DB::table('supplier_allocations')->where('parent_id', $aa->id)->lists('status');
//
//                    $tota_Re = array_sum($t_reallocation);
//                    $total_sent_to_buyer = $aa->allocation + $tota_Re;
//
//                    if ($total_sent_to_buyer < $aa->requried_quantity && !in_array('reject', $check_reallocation_status)) {
//
//                        $totalValue = $aa->requried_quantity - $total_sent_to_buyer;
//
//                        if ($totalValue > $pending_quantity) {
//                            $reallo_sent = $pending_quantity;
//                            $pending_quantity = $pending_quantity - $reallo_sent;
//                        } else {
//                            $reallo_sent = $totalValue;
//                            $pending_quantity = $pending_quantity - $reallo_sent;
//                        }
//
//
//                        $allocation3 = SupplierAllocation::where('id', $aa->id)->first();
//                        $supp_allocation = new SupplierAllocation();
//                        $supp_allocation->product_id = $allocation3->product_id;
//                        $supp_allocation->supplier_post_id = $allocation3->supplier_post_id;
//                        $supp_allocation->buyer_post_id = $allocation3->buyer_post_id;
//                        $supp_allocation->supplier_id = $allocation3->supplier_id;
//                        $supp_allocation->buyer_id = $allocation3->buyer_id;
//                        $supp_allocation->allocation = $allocation3->allocation;
//                        $supp_allocation->requried_quantity = $allocation3->requried_quantity;
//                        $supp_allocation->category_id = $allocation3->category_id;
//                        $supp_allocation->reallocation = $reallo_sent;
//                        $supp_allocation->is_email_sent = '1';
//                        $supp_allocation->is_allocation_email = '1';
//                        $supp_allocation->status = 'pending';
//                        $supp_allocation->parent_id = $allocation3->id;
//                        $supp_allocation->save();
//
//
//                        $buyer_post_info = BuyerPost::where('buyer_post_id', $allocation3->buyer_post_id)->with('category')->first();
//                        $supplier_post_info = SupplierPost::where('supplier_post_id', $allocation3->supplier_post_id)->first();
//                        $supplier_info11 = User::where('id', $allocation3->supplier_id)->first();
//                        $data12['buyer_post_info'] = $buyer_post_info;
//                        $data12['bank_detail'] = Setting::where('setting_name', 'product_detail')->first()->bank_detail;
//                        $data12['supplier_info'] = $supplier_info11;
//                        $data12['supplier_post_info'] = $supplier_post_info;
//
//                        $bank = new BankDetail();
//                        $bank->supplier_post_id = $supp_allocation->supplier_post_id;
//                        $bank->buyer_post_id = $supp_allocation->buyer_post_id;
//                        $bank->supplier_id = $supp_allocation->supplier_id;
//                        $bank->buyer_id = $supp_allocation->buyer_id;
//                        $bank->allocation = $reallo_sent;
//                        $bank->allocation_id = $supp_allocation->id;
//                        $bank->quantity = $supp_allocation->requried_quantity;
//                        $bank->buyer_price = $buyer_post_info->price;
//                        $bank->supplier_price = $supplier_post_info->price;
//                        $bank->supplier_total = $supplier_post_info->price * $reallo_sent;
//                        $bank->buyer_total = $buyer_post_info->price * $reallo_sent;
//                        $bank->status = 'pending';
//                        $bank->save();
//
//
//                        $user_info1 = User::where('id', $aa->buyer_id)->first();
//                        $data12['user_info'] = $user_info1;
//                        $data12['allocation'] = $supp_allocation;
//                        $data12['product_name'] = ZnUtilities::getProductName($supp_allocation->product_id);
//
//                        Mail::send('emails.text2', $data12, function ($message) use ($user_info1) {
//                            $message->to($user_info1->email, $user_info1->name)
//                                    ->subject('ReAllocation');
//                        });
//                          Mail::send('emails.supplier_bank', $data12, function ($message) use ($supplier_info11) {
//                            $message->to($supplier_info11->email, $supplier_info11->name)
//                                    ->subject('Send Bank Detail');
//                        });
//
//                        $noti = new Notification();
//                        $noti->notification_title = 'ReAllocation';
//                        $noti->notification_content = 'We Have Allocated ' . number_format($reallo_sent) . ' ReAllocation and Please find the bank detail in your mail';
//                        $noti->status = 'unread';
//                        $noti->supplier_id = $aa->supplier_id;
//                        $noti->buyer_id = $aa->buyer_id;
//                        $noti->allocation_id = $supp_allocation->id;
//                        $noti->user_id = $aa->buyer_id;
//                        $noti->save();
//
//                         $noti = new Notification();
//                        $noti->notification_title = 'Send Bank Detail';
//                        $noti->notification_content = 'We Have Allocated ' . number_format($reallo_sent) . 'ReAllocation to buyer and Please send the bank detail.';
//                        $noti->status = 'unread';
//                       $noti->supplier_id = $aa->supplier_id;
//                        $noti->buyer_id = $aa->buyer_id;
//                        $noti->allocation_id = $supp_allocation->id;
//                        $noti->user_id = $aa->supplier_id;
//                        $noti->save();
//                    }
//                }   // check pending quantity
//            }
//            if ($pending_quantity > 0) {
//
//                $supplier_price = ($supplier_info->price * 20 / 100) + $supplier_info->price;
//                $s_userInfo = User::where('id', $supplier_info->user_id)->first();
//                $data1 = $this->matchingBuyer($supplier_info->supplier_post_id);
//                $buyer_requried = array();
//                $buyer_quantity2 = array();
//                foreach ($data1 as $dd) {
//
//                    $buyer_requried[] = $dd->quantity;
//                    $buyer_quantity1 = array_sum($buyer_requried);
//                    if ($buyer_quantity1 < $pending_quantity) {
//                        $n_sent_allocation = $dd->quantity;
//                        $buyer_quantity2[] = $dd->quantity;
//                    } else {
//                        $buyer_quantity3 = $pending_quantity - array_sum($buyer_quantity2);
//                        $buyer_quantity2[] = $buyer_quantity3;
//                        $n_sent_allocation = $buyer_quantity3;
//                    }
//
//                    if ($n_sent_allocation > 0) {
//                        $supp_allocation2 = new SupplierAllocation();
//                        if ($dd->search_keywords) {
//                            $supp_allocation2->product_id = $dd->search_keywords;
//                        } else {
//                            $supp_allocation2->product_id = $dd->product_id;
//                        }
//
//                        $supp_allocation2->supplier_post_id = $supplier_info->supplier_post_id;
//                        $supp_allocation2->buyer_post_id = $dd->buyer_post_id;
//                        $supp_allocation2->supplier_id = $supplier_info->user_id;
//                        $supp_allocation2->buyer_id = $dd->user_id;
//                        $supp_allocation2->allocation = $n_sent_allocation;
//                        $supp_allocation2->requried_quantity = $dd->quantity;
//                        $supp_allocation2->category_id = $dd->category_id;
//                        $supp_allocation2->reallocation = '';
//                        $supp_allocation2->is_email_sent = '1';
//                        $supp_allocation2->is_allocation_email = '1';
//                        $supp_allocation2->status = 'pending';
//                        $supp_allocation2->save();
//
//                        $buyer_post_info = BuyerPost::where('buyer_post_id', $dd->buyer_post_id)->with('category')->first();
//                        $supplier_post_info = SupplierPost::where('supplier_post_id', $supplier_info->supplier_post_id)->first();
//                        $supplier_info1 = User::where('id', $supplier_info->user_id)->first();
//                        $data1211['buyer_post_info'] = $buyer_post_info;
//                        $data1211['bank_detail'] = Setting::where('setting_name', 'product_detail')->first()->bank_detail;
//                        $data1211['supplier_info'] = $supplier_info1;
//                        $data1211['supplier_post_info'] = $supplier_post_info;
//
//                        $bank = new BankDetail();
//                        $bank->supplier_post_id = $supplier_info->supplier_post_id;
//                        $bank->buyer_post_id = $dd->buyer_post_id;
//                        $bank->supplier_id = $supplier_info->user_id;
//                        $bank->buyer_id = $dd->user_id;
//                        $bank->allocation = $n_sent_allocation;
//                        $bank->allocation_id = $supp_allocation2->id;
//                        $bank->quantity = $dd->quantity;
//                        $bank->buyer_price = $buyer_post_info->price;
//                        $bank->supplier_price = $supplier_post_info->price;
//                        $bank->supplier_total = $supplier_post_info->price * $n_sent_allocation;
//                        $bank->buyer_total = $buyer_post_info->price * $n_sent_allocation;
//                        $bank->status = 'pending';
//                        $bank->save();
//
//                        $user_info11 = User::where('id', $aa->buyer_id)->first();
//                        $data1211['user_info'] = $user_info11->name;
//
//                        $data1211['product_name'] = ZnUtilities::getProductName($supp_allocation2->product_id);
//                        $data1211['quantity'] = $supp_allocation2->requried_quantity;
//                        $data1211['allocation'] = $supp_allocation2;
//                        $data1211['is_other_post'] = 0;
//                        $data1211['supplier_id'] = $supp_allocation2->supplier_id;
//                        $data1211['buyer_id'] = $supp_allocation2->buyer_id;
//                        $data1211['supp_allocation_id'] = $supp_allocation2->id;
//
//
//                        Mail::send('emails.buyer_bank', $data1211, function ($message) use ($user_info11) {
//                            $message->to($user_info11->email, $user_info11->name)
//                                    ->subject('Allocation & Bank Detail');
//                        });
//                        Mail::send('emails.supplier_bank', $data1211, function ($message) use ($supplier_info1) {
//                            $message->to($supplier_info1->email, $supplier_info1->name)
//                                    ->subject('Send Bank Detail');
//                        });
//
//                        $noti = new Notification();
//                        $noti->notification_title = 'Allocation';
//                        $noti->notification_content = 'We Have Allocated ' . number_format($n_sent_allocation) . 'Allocation and Please find the bank detail in your mail';
//                        $noti->status = 'unread';
//                        $noti->supplier_id = $supp_allocation2->supplier_id;
//                        $noti->buyer_id = $supp_allocation2->buyer_id;
//                        $noti->allocation_id = $supp_allocation2->id;
//                        $noti->user_id = $supp_allocation2->buyer_id;
//                        $noti->save();
//
//                        $noti = new Notification();
//                        $noti->notification_title = 'Send Bank Detail';
//                        $noti->notification_content = 'We Have Allocated ' . number_format($n_sent_allocation) . 'Allocation to buyer and Please send the bank detail.';
//                        $noti->status = 'unread';
//                        $noti->supplier_id = $supp_allocation2->supplier_id;
//                        $noti->buyer_id = $supp_allocation2->buyer_id;
//                        $noti->allocation_id = $supp_allocation2->id;
//                        $noti->user_id = $supp_allocation2->supplier_id;
//                        $noti->save();
//                    }
//                }
//            }
//        }




            DB::table('supplier_posts')->where('supplier_post_id', $allocation->supplier_post_id)->update(['status' => $type]);
            DB::table('buyer_posts')->where('buyer_post_id', $allocation->buyer_post_id)->update(['status' => $type]);
//        DB::table('bank_details')->where('allocation_id', $allocation->id)->update(['status' => $type]);

            $supplier_user = User::where('id', $allocation->supplier_id)->first();
            $buyer_user = User::where('id', $allocation->buyer_id)->first();

            $data11['supplier_user'] = $supplier_user;
            $data11['buyer_user'] = $buyer_user;

            $data11['supplier_post'] = $supplier_info;
            $data11['buyer_post'] = $buyer_post1;
            $data11['allocation'] = $supp_allocation;
            $data11['bank_detail'] = Setting::where('setting_name', 'product_detail')->first()->bank_detail;
//            Mail::send('emails.buyer_bank', $data11, function ($message) use ($buyer_user) {
//                $message->to($buyer_user->email, $buyer_user->name)
//                        ->subject('Allocation Request');
//            });


            $noti = new Notification();
            $noti->notification_title = 'Allocation Accept';
            $noti->notification_content = $supplier_user->name . ' (Supplier) ' . $type . ' The Allocation';
            $noti->status = 'unread';
            $noti->supplier_id = $allocation->supplier_id;
            $noti->buyer_id = $allocation->buyer_id;
            $noti->allocation_id = $allocation->id;
            $noti->user_id = $allocation->buyer_id;
            $noti->save();

//        $noti = Notification::where('allocation_id',$id)->where('user_id',Auth::user()->id)->first();
//        $noti->status = 'read';
//        $noti->save();

            return redirect('/allallocation')->with('success', 'You have Successfully ' . $type . ' The Allocation.');
        }
    }

//    public function showAllocation($id)
//    {
//        $data = array();
//
//        $allocation_info = SupplierAllocation::where('id',$id)->first();
//        $data['allocation'] = SupplierAllocation::where('supplier_post_id',$id)->get();
//        $data['supplier_detail'] = SupplierPost::where('supplier_post_id', $allocation_info->supplier_post_id)->first();
//        $data['is_other_post'] = $allocation_info->is_other_post;
//        return view('show_allocation',$data);
//    }

    public function sendReallocation($id, $quantity) {
        $data11 = array();
        $allocation = SupplierAllocation::where('id', $id)->first();
        $allocation->reallocation = $quantity;
        $allocation->save();

        $user_info = User::where('id', $allocation->buyer_id)->first();
        $data11['user_info'] = $user_info;
        $data11['allocation'] = $allocation;

        $data11['product_name'] = ZnUtilities::getProductName($allocation->product_id);
//        }

        Mail::send('emails.text2', $data11, function ($message) use ($user_info) {

            $message->to($user_info->email, $user_info->name)
                    ->subject('ReAllocation');
        });

        $noti = new Notification();
        $noti->notification_title = 'ReAllocation';
        $noti->notification_content = 'We Have Allocated ' . number_format($allocation->reallocation) . ' ReAllocation';
        $noti->status = 'unread';
        $noti->supplier_id = $allocation->supplier_id;
        $noti->buyer_id = $allocation->buyer_id;
        $noti->allocation_id = $allocation->id;
        $noti->user_id = $allocation->buyer_id;
        $noti->save();
    }

    public function showDetail($id) {
        $supplier_post = SupplierPost::where('supplier_post_id', $id)->first();
        $data = array();
        $data['supplier_post'] = $supplier_post;
        $data['documnets'] = Document::where('supplier_post_id', $id)->get();

        return view('frontend.supplierPostDetail', $data);
    }

    public function addBankDetail($s_post_id, $a_id) {

        if (Auth::user()->user_role != 3) {
            return redirect('/');
        }

        $supplier_post = SupplierPost::where('supplier_post_id', $s_post_id)->first();
        if (Auth::user()->id != $supplier_post->user_id) {
            return redirect('/logout');
        }
        $data = array();
        $data['supplier_post_id'] = $s_post_id;
        $data['allocation_id'] = $a_id;


        return view('frontend.addBank', $data);
    }

    public function storeBankDetail(Request $request, $s_post_id, $a_id) {

        if (Auth::user()->user_role != 3) {
            return redirect('/');
        }
        $supplier_post = SupplierPost::where('supplier_post_id', $s_post_id)->first();
        if (Auth::user()->id != $supplier_post->user_id) {
            return redirect('/logout');
        }
        DB::table('bank_details')->where('supplier_post_id', $s_post_id)->where('allocation_id', $a_id)->update(['bank_detail' => $request->get('addbank')]);
        return redirect('/');
    }

    public function showBuyerPaymentInfo($buyer_post_id) {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }
        $data = array();
        $data['buyer_post'] = BuyerPost::where('buyer_post_id', $buyer_post_id)->first();
//        DB::table('bank_details')->where('supplier_post_id', $s_post_id)->where('allocation_id', $a_id)->update(['bank_detail' => $request->get('addbank')]);
        $data['bank_details'] = BankDetail::where('buyer_post_id', $buyer_post_id)->get();

        return view('admin.buyers.showBuyerBank', $data);
    }

    public function showSupplierPaymentInfo($supplier_post_id) {

        if (Auth::user()->user_role != 1) {
            return redirect('/');
        }

        $data = array();
        $data['supplier_post'] = SupplierPost::where('supplier_post_id', $supplier_post_id)->first();
//        DB::table('bank_details')->where('supplier_post_id', $s_post_id)->where('allocation_id', $a_id)->update(['bank_detail' => $request->get('addbank')]);
        $data['bank_details'] = BankDetail::where('supplier_post_id', $supplier_post_id)->get();

        return view('admin.suppliers.showSupplierBank', $data);
    }

    public function addRating(Request $request, $allocation_id) {

        if (Auth::user()->user_role != 2) {
            return redirect('/');
        }

        $allocation = SupplierAllocation::where('id', $allocation_id)->first();
        $allocation->rating = $request->get('rating');
        $allocation->comments = $request->get('comments');
        $allocation->save();

        return redirect()->back();
    }

    function matchingBuyer($idd) {

        $supplier_info = SupplierPost::where('supplier_post_id', $idd)->first();
        $supplier_price = ($supplier_info->price * 20 / 100) + $supplier_info->price;
        $s_userInfo = User::where('id', $supplier_info->user_id)->first();
        if ($supplier_info->search_keywords != '') {

            $sidd = array();
            $keyword = explode(',', $supplier_info->search_keywords);
            $des_keyword = explode(',', $supplier_info->des_keywords);


            foreach ($keyword as $kk) {
                $query1 = DB::table('supplier_posts as sp');
                $query1->leftJoin('buyer_posts as bs', 'bs.product_id', '=', 'sp.product_id');
                $query1->leftJoin('users as us', 'us.id', '=', 'bs.user_id');
                $query1->where('sp.supplier_post_id', $supplier_info->supplier_post_id);
                $query1->where('bs.category_id', $supplier_info->category_id);
                $query1->where('bs.price', '>=', $supplier_price);
                $query1->where('bs.status', '!=', 'accepted');
                if ($supplier_info->destribution_restrictions == '0') {
                    $query1->where('us.pool', $s_userInfo->pool);
                }

                $query1->where('bs.expiry', '<=', $supplier_info->expiry);
                $query1->whereRaw(DB::raw('FIND_IN_SET("' . $kk . '",bs.search_keywords)'));
                $query1->orderBy('bs.price', 'desc');
                $data11 = $query1->get(array('bs.*'));

                foreach ($data11 as $ddd) {
                    $sidd[] = $ddd->buyer_post_id;
                }
            }

            foreach ($des_keyword as $kk1) {
                $query1 = DB::table('supplier_posts as sp');
                $query1->leftJoin('buyer_posts as bs', 'bs.product_id', '=', 'sp.product_id');
                $query1->leftJoin('users as us', 'us.id', '=', 'bs.user_id');
                $query1->where('sp.supplier_post_id', $supplier_info->supplier_post_id);
                $query1->where('bs.category_id', $supplier_info->category_id);
                $query1->where('bs.price', '>=', $supplier_price);
                $query1->where('bs.status', '!=', 'accepted');
                if ($supplier_info->destribution_restrictions == '0') {
                    $query1->where('us.pool', $s_userInfo->pool);
                }

                $query1->where('bs.expiry', '<=', $supplier_info->expiry);
                $query1->whereRaw(DB::raw('FIND_IN_SET("' . $kk1 . '",bs.search_keywords)'));
                $query1->orderBy('bs.price', 'desc');
                $data11 = $query1->get(array('bs.*'));

                foreach ($data11 as $ddd) {
                    $sidd[] = $ddd->buyer_post_id;
                }
            }

            $data1 = BuyerPost::whereIn('buyer_post_id', $sidd)->orderBy('price', 'desc')->get();
        } else {

            $query1 = DB::table('supplier_posts as sp');
            $query1->leftJoin('buyer_posts as bs', 'bs.product_id', '=', 'sp.product_id');
            $query1->leftJoin('users as us', 'us.id', '=', 'bs.user_id');
            $query1->where('sp.supplier_post_id', $supplier_info->supplier_post_id);
            $query1->where('bs.category_id', $supplier_info->category_id);
            $query1->where('bs.price', '>=', $supplier_price);
            $query1->where('bs.status', '!=', 'accepted');
            if ($supplier_info->destribution_restrictions == '0') {
                $query1->where('us.pool', $s_userInfo->pool);
            }
            $query1->where('bs.expiry', '<=', $supplier_info->expiry);
            $query1->orderBy('bs.price', 'desc');
            $data1 = $query1->get(array('bs.*'));
        }

        return $data1;
    }

    public function allocationToBuyer($supplier_post_id, $buyer_post_id) {
        $type = 'accepted';
        $buyer_post1 = BuyerPost::find($buyer_post_id);
        $buyer_post1->status = 'accepted';
        $buyer_post1->save();

         DB::table('buyer_posts')->where('buyer_post_id','!=',$buyer_post_id)->where('supplier_post_id', $supplier_post_id)->update(['status' => 'Declined']);


        //DB::table('buyer_posts')->where('buyer_post_id', $buyer_post_id)->update(['status' => $type]);

        $supplier_info = SupplierPost::where('supplier_post_id', $supplier_post_id)->first();

        $buyer_user = User::find($buyer_post1->user_id);
        $supplier_user = User::find($supplier_info->user_id);

        $allocation_total = $supplier_info->quantity;
        $supp_allocation = new SupplierAllocation();
        $supp_allocation->supplier_post_id = $supplier_post_id;
        $supp_allocation->buyer_post_id = $buyer_post1->buyer_post_id;
        $supp_allocation->supplier_id = $supplier_info->user_id;
        $supp_allocation->buyer_id = $buyer_post1->user_id;
        $supp_allocation->allocation = $allocation_total;
        $supp_allocation->requried_quantity = $buyer_post1->quantity;
        $supp_allocation->reallocation = '';
        $supp_allocation->is_email_sent = '1';
        $supp_allocation->is_allocation_email = '1';
        $supp_allocation->status = 'accepted';
        $supp_allocation->sku = $supplier_info->sku;
        $supp_allocation->buyer_bid = $buyer_post1->buyer_bid;
        $supp_allocation->save();


        $supplier_info->status = 'accepted';
        $supplier_info->is_allocation = '1';
        $supplier_info->save();

        $data11['supplier_user'] = $supplier_user;
        $data11['buyer_user'] = $buyer_user;
        $data11['allocation'] = $allocation_total;
        $data11['supplier_post'] = $supplier_info;
        $data11['buyer_post'] = $buyer_post1;
        $data11['allocation'] = $supp_allocation;
        $data11['type'] = $type;
        $data11['bank_detail'] = Setting::where('setting_name', 'product_detail')->first()->bank_detail;
//        Mail::send('emails.buyer_bank', $data11, function ($message) use ($buyer_user) {
//            $message->to($buyer_user->email, $buyer_user->name)
////                    $message->to('gurpreet.avis7@gmail.com', $buyer_user->name)
//                    ->subject('Allocation & Bank Detail');
//        });


        $noti = new Notification();
        $noti->notification_title = 'Allocation Accept';
        $noti->notification_content = $supplier_user->name . ' (Supplier) ' . $type . ' The Allocation';
        $noti->status = 'unread';
        $noti->supplier_id = $supp_allocation->supplier_id;
        $noti->buyer_id = $supp_allocation->buyer_id;
        $noti->allocation_id = $supp_allocation->id;
        $noti->user_id = $supp_allocation->buyer_id;
        $noti->save();

        return redirect('/')->with('success', 'You have Successfully Accept The Allocation.');
    }

    public function updatePostStatus($type, $id){

        $allocation = SupplierAllocation::where('id', $id)->first();
        $allocation->payment_status = $type;
        $allocation->save();

        //DB::table('supplier_posts')->where('supplier_post_id', $allocation->supplier_post_id)->update(['status' => $type]);
        DB::table('buyer_posts')->where('buyer_post_id', $allocation->buyer_post_id)->update(['payment_status' => $type]);

		//die;
		//echo "<script>window.location.href='http://resetfoods.com/resetfoodv4/dashboard'</script>";
        return redirect('http://resetfoods.com/resetfoodv4/dashboard');
    }

    public function RejectallocationToBuyer($supplier_post_id, $buyer_post_id){
        $type = 'rejected';
        $buyer_post1 = BuyerPost::find($buyer_post_id);
        $buyer_post1->status = 'rejected';
        $buyer_post1->save();

        DB::table('buyer_posts')->where('buyer_post_id','!=',$buyer_post_id)->where('supplier_post_id', $supplier_post_id)->update(['status' => 'Declined']);

        $supplier_info = SupplierPost::where('supplier_post_id', $supplier_post_id)->first();

        $buyer_user = User::find($buyer_post1->user_id);
        $supplier_user = User::find($supplier_info->user_id);

        $allocation_total = $supplier_info->quantity;
        $supp_allocation = new SupplierAllocation();
        $supp_allocation->supplier_post_id = $supplier_post_id;
        $supp_allocation->buyer_post_id = $buyer_post1->buyer_post_id;
        $supp_allocation->supplier_id = $supplier_info->user_id;
        $supp_allocation->buyer_id = $buyer_post1->user_id;
        $supp_allocation->allocation = $allocation_total;
        $supp_allocation->requried_quantity = $buyer_post1->quantity;
        $supp_allocation->reallocation = '';
        $supp_allocation->is_email_sent = '1';
        $supp_allocation->is_allocation_email = '1';
        $supp_allocation->status = 'rejected';
        $supp_allocation->sku = $supplier_info->sku;
        $supp_allocation->buyer_bid = $buyer_post1->buyer_bid;
        $supp_allocation->save();

        $supplier_info->status = 'rejected';
        $supplier_info->is_allocation = '1';
        $supplier_info->save();

        $noti = new Notification();
        $noti->notification_title = 'Allocation Reject';
        $noti->notification_content = $supplier_user->name . ' (Supplier) ' . $type . ' The Allocation';
        $noti->status = 'unread';
        $noti->supplier_id = $supp_allocation->supplier_id;
        $noti->buyer_id = $supp_allocation->buyer_id;
        $noti->allocation_id = $supp_allocation->id;
        $noti->user_id = $supp_allocation->buyer_id;
        $noti->save();

        return redirect('/')->with('success', 'You have Successfully Reject The Allocation.');

    }

}
