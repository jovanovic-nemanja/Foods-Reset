<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BuyerPost;
use App\Models\SupplierPost;
use App\Models\User;
use App\Models\Setting;
use App\Models\SupplierAllocation;
use App\Libraries\ZnUtilities;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class BuyersController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

	}

	public function store( Request $request ) {

	}

	public function buyerStore( Request $request ) {
		if ( Auth::user()->user_role != 2 ) {
			return redirect( '/' );
		}

		$bal              = ZnUtilities::UnallocatedBalance( $request->get( 'supplier_post_id' ) );
		$supplier_post_id = $request->get( 'supplier_post_id' );
		$supplier_info    = SupplierPost::where( 'supplier_post_id', $supplier_post_id )->first();

		$buyer_post1                   = new BuyerPost();
		$buyer_post1->quantity         = $supplier_info->quantity;
		$buyer_post1->user_id          = Auth::user()->id;
		$buyer_post1->sku              = $supplier_info->sku;
		$buyer_post1->price            = $supplier_info->price;
		$buyer_post1->supplier_post_id = $supplier_post_id;
		$buyer_post1->expiry           = $supplier_info->expiry;
		$buyer_post1->expiry2          = $supplier_info->expiry2;

		$buyer_post1->buyer_bid          = str_replace( ',', '', $request->get( 'buyer_bid' ) );
		$buyer_post1->buyer_bid_quantity = $request->get( 'buyer_bid_quantity' );
		$buyer_post1->buyer_bid_comment  = $request->get( 'buyer_bid_comment' );

		if ( $buyer_post1->buyer_bid < $supplier_info->price ) {
			$buyer_post1->is_low_bid = '1';
		}
		$buyer_post1->save();

		if ( $buyer_post1->is_low_bid != '1' ) {
			$noti                       = new Notification();
			$noti->notification_title   = 'Buyer Bid';
			$noti->notification_content = Auth::user()->name . ' (Buyer) Bid Your Post';
			$noti->status               = 'unread';
			$noti->supplier_id          = $supplier_info->user_id;
			$noti->buyer_id             = $buyer_post1->user_id;
			$noti->user_id              = $supplier_info->user_id;
			$noti->associate_id         = $buyer_post1->buyer_post_id;
			$noti->type                 = "Buyer Bid";
			$noti->save();
		}

		return redirect( '/' )->with( 'success', 'You have Successfully Post the allocation request.' );

		$supplier_price = ( $supplier_info->price * 20 / 100 ) + $supplier_info->price;

		$buyer_user       = User::find( $buyer_post1->user_id );
		$supplier_user    = User::find( $supplier_info->user_id );
		$allocation_total = 0;
		$allocation_total = $supplier_info->quantity;

		return redirect( '/' )->with( 'success', 'You have Successfully Post the allocation request.' );

		return redirect( '/' )->with( 'fail', 'Your post not match the supplier post.' );
	}


	public function buyerStoreAjax(Request $request){
        if(Auth::user()->user_role != 2){
          return redirect('/');
        }

        // -------test------------
        //echo "saved";
        //die();
        //---------end------------
        $bal = ZnUtilities::UnallocatedBalance($request->get('supplier_post_id'));
        $supplier_post_id = $request->get('supplier_post_id');
        $supplier_info = SupplierPost::where('supplier_post_id', $supplier_post_id)->first();

        $buyer_post1 = new BuyerPost();
        $buyer_post1->quantity = $supplier_info->quantity;
        $buyer_post1->user_id = Auth::user()->id;
        $buyer_post1->sku = $supplier_info->sku;
        $buyer_post1->price = $supplier_info->price;
        $buyer_post1->supplier_post_id = $supplier_post_id;
        $buyer_post1->expiry = $supplier_info->expiry;
        $buyer_post1->expiry2 = $supplier_info->expiry2;

        $buyer_post1->buyer_bid = str_replace(',', '', $request->get('buyer_bid'));
        $buyer_post1->buyer_bid_quantity = str_replace(',', '', $request->get('buyer_bid_quantity'));
        $buyer_post1->buyer_bid_comment = $request->get('buyer_bid_comment');

        if($buyer_post1->buyer_bid < $supplier_info->price){
           $buyer_post1->is_low_bid = '1';
        }
        // save in buyer
        $buyer_post1->save();
        // get last inserted row
        $buyer_last_row= BuyerPost::orderBy('buyer_post_id', 'desc')->with('skuInfo')->first();

        if($buyer_post1->is_low_bid != '1'){
            $noti = new Notification();
            $noti->notification_title = 'Buyer Bid';
            $noti->notification_content = Auth::user()->name . ' (Buyer) Bid Your Post';
            $noti->status = 'unread';
            $noti->supplier_id = $supplier_info->user_id;
            $noti->buyer_id = $buyer_post1->user_id;
            $noti->user_id = $supplier_info->user_id;
            $noti->associate_id = $buyer_post1->buyer_post_id;
            $noti->type = "Buyer Bid";
            $noti->save();
        }


        // create row
        $supplier_post = SupplierPost::where('supplier_post_id',$buyer_last_row->supplier_post_id)->with('userInfo','userInfo1')->first();
        $status_arr= array('pending','rejected');

        $payment_status= '';
        if(!in_array($buyer_last_row->status, $status_arr)){
           $payment_status= $buyer_last_row->payment_status;
        }

        $row_str= '<tr>
					  <td>'.$supplier_post->category.'</td>
					  <td>'.$buyer_last_row->skuInfo->sku.'</td>
					  <td>'.$supplier_post->description.'</td>
					  <td>'.number_format($supplier_post->unit_per_case).'</td>
					  <td>'.number_format($supplier_post->net_weight,2).'</td>
					  <td>'.$supplier_post->product_location.'</td>
					  <td>'.$supplier_post->expiry.'</td>
					  <td>'.number_format($supplier_post->quantity).'</td>
					  <td>$'.number_format($supplier_post->list_price,2).'</td>
					  <td>$'.number_format($supplier_post->per_case_price,2).'</td>
					  <td>$'.number_format($buyer_last_row->price).'</td>
					  <td>$'.number_format($buyer_last_row->buyer_bid).'</td>
					  <td>'.number_format($buyer_last_row->buyer_bid_quantity).'</td>
					  <td>'.$buyer_last_row->buyer_bid_comment.'</td>
					  <td>'.$payment_status.'</td>
					  <td>'.$buyer_last_row->status.'</td>
					</tr>';

        $data_arr= array('status'=>'saved','row_str'=>$row_str);
        echo json_encode($data_arr);
        die();

    }

	public function allBuyers() {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data           = array();
		$data['buyers'] = BuyerPost::orderBy( 'buyer_post_id', 'desc' )->with( 'product', 'category' )->get();
		$data['items']  = SupplierPost::orderBy( 'supplier_post_id', 'desc' )->get();

		$data['title'] = 'All Buyers';

		return view( 'admin.buyers.list', $data );
	}

	public function singleBuyerPost( $id ) {

		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data           = array();
		$data['buyers'] = BuyerPost::where( 'buyer_post_id', $id )->with( 'product', 'category' )->first();
		$data['items']  = SupplierPost::orderBy( 'supplier_post_id', 'desc' )->get();
		$user_info      = User::find( $data['buyers']->user_id );
		$data['title']  = $user_info->name . ' Buyer';

		return view( 'admin.buyers.show', $data );
	}

	public function deleteBuyerPost( $id ) {
		if ( Auth::user()->user_role != 2 ) {
			return redirect( '/' );
		}
		BuyerPost::where( 'buyer_post_id', $id )->delete();

		return redirect( '/' );
	}

	public function checkPost( $bid ) {
		$check = SupplierAllocation::where( 'buyer_post_id', $bid )->get()->count();
		return $check;
	}

	public function checkAllocation() {
		$check = SupplierAllocation::where( 'status', 'pending' )->get();
		if ( count( $check ) > 0 ) {
			foreach ( $check as $c ) {
				$new_time     = date( "Y-m-d H:i:s", strtotime( '+5 hours', strtotime( $c->created_at ) ) );
				$current_date = date( "Y-m-d H:i:s" );

				if ( $new_time < $current_date ) {
					DB::table( 'supplier_allocations' )->where( 'id', $c->id )->update( [ 'status' => 'reject' ] );
					DB::table( 'supplier_posts' )->where( 'supplier_post_id', $c->supplier_post_id )->update( [ 'status' => 'pending' ] );
					DB::table( 'buyer_posts' )->where( 'buyer_post_id', $c->buyer_post_id )->update( [ 'status' => 'reject' ] );

					$supplier_user           = User::where( 'id', $c->supplier_id )->first();
					$buyer_post1             = BuyerPost::where( 'buyer_post_id', $c->buyer_post_id )->first();
					$supplier_info           = SupplierPost::where( 'supplier_post_id', $c->supplier_post_id )->first();
					$buyer_user              = User::where( 'id', $c->buyer_id )->first();
					$type                    = 'reject';
					$data11['supplier_user'] = $supplier_user;
					$data11['buyer_user']    = $buyer_user;

					$data11['supplier_post'] = $supplier_info;
					$data11['buyer_post']    = $buyer_post1;
					$data11['allocation']    = $c;
					$data11['type']          = $type;
					$data11['bank_detail']   = Setting::where( 'setting_name', 'product_detail' )->first()->bank_detail;

					Mail::send( 'emails.buyer_bank', $data11, function ( $message ) use ( $buyer_user ) {
						$message->to( $buyer_user->email, $buyer_user->name )
						        ->subject( 'Allocation Request' );
					} );

					$noti                       = new Notification();
					$noti->notification_title   = 'Allocation Reject';
					$noti->notification_content = $supplier_user->name . ' (Supplier) ' . $type . ' The Allocation';
					$noti->status               = 'unread';
					$noti->supplier_id          = $c->supplier_id;
					$noti->buyer_id             = $c->buyer_id;
					$noti->allocation_id        = $c->id;
					$noti->user_id              = $c->buyer_id;
					$noti->save();
				}
			}
		}
	}

	public function buyerProfile( $id ) {
		if ( Auth::user()->user_role != 3 ) {
			return redirect( '/' );
		}
		$buyer_post = BuyerPost::where( 'buyer_post_id', $id )->first();
		$data = array();
		$data['userInfo'] = User::where( 'id', $buyer_post->user_id )->first();

		return view( 'frontend.buyer_profile', $data );
	}
}
