<?php

/*
 * This Controller takes care of all ajax related calls that
 * pulls data from database
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SupplierPost;
use App\Models\BuyerPost;
use App\Models\SupplierAllocation;
use App\Models\Product;
use App\Models\User;
use App\Models\Setting;
use App\Models\Notification;
use App\Models\Tempwarehouse;
use App\Models\Sku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use DateTime;

class AjaxController extends Controller
{
	public function acceptAllocation($is_post_type, $allocation_id )
	{
		$allocation         = SupplierAllocation::find( $allocation_id );
		$allocation->status = 'accept';
		$allocation->save();

		return redirect( '/' )->with( 'success', 'You have Successfully Accept The Allocation' );;
	}

	public function checkAllocationStatus( $type, $id )
	{
		$allocation     = SupplierAllocation::where( 'id', $id )->first();
		$buyer1_info    = BuyerPost::where( 'buyer_post_id', $allocation->buyer_post_id )->first();
		$supplier1_info = SupplierPost::where( 'supplier_post_id', $allocation->supplier_post_id )->first();
		if ( Auth::check() ) {

			if ( Auth::user()->id != $supplier1_info->user_id ) {

				Auth::logout();
				Auth::loginUsingId( $supplier1_info->user_id, true );

				$check = $this->updateAllocationStatus( $type, $id );
				if ( $check == 1 ) {
					return redirect( '/allallocation' )->with( 'fail', 'You have already change the status of this Allocation.' );
				} else {
					return redirect( '/allallocation' )->with( 'success', 'You have Successfully ' . $type . ' The Allocation.' );
				}
			} else {
				$check = $this->updateAllocationStatus( $type, $id );
				if ( $check == 1 ) {
					return redirect( '/allallocation' )->with( 'fail', 'You have already change the status of this Allocation.' );
				} else {
					return redirect( '/allallocation' )->with( 'success', 'You have Successfully ' . $type . ' The Allocation.' );
				}
			}
		} else {
			Auth::loginUsingId( $supplier1_info->user_id, true );

			$check = $this->updateAllocationStatus( $type, $id );
			if ( $check == 1 ) {
				return redirect( '/allallocation' )->with( 'fail', 'You have already change the status of this Allocation.' );
			} else {
				return redirect( '/allallocation' )->with( 'success', 'You have Successfully ' . $type . ' The Allocation.' );
			}
		}
	}

	public function getProduct( $id )
	{
		$product = Product::where( 'category_id', $id )->where( 'type', '0' )->get()->toJson();

		return $product;
	}

	public function updateAllocationStatus( $type, $id )
	{
		$allocation = SupplierAllocation::where( 'id', $id )->first();

		if ( $allocation->status == 'reject' ) {
			return 1;
		}

		if ( $allocation->status == $type ) {
			return 1;
		} else {
			$buyer_post1   = BuyerPost::where( 'buyer_post_id', $allocation->buyer_post_id )->first();
			$supplier_info = SupplierPost::where( 'supplier_post_id', $allocation->supplier_post_id )->first();

			$data11 = array();
			$data12 = array();

			$allocation->status = $type;
			$allocation->save();

			DB::table( 'supplier_posts' )->where( 'supplier_post_id', $allocation->supplier_post_id )->update( [ 'status' => $type ] );
			DB::table( 'buyer_posts' )->where( 'buyer_post_id', $allocation->buyer_post_id )->update( [ 'status' => $type ] );

			$supplier_user = User::where( 'id', $allocation->supplier_id )->first();
			$buyer_user    = User::where( 'id', $allocation->buyer_id )->first();

			$data11['supplier_user'] = $supplier_user;
			$data11['buyer_user']    = $buyer_user;

			$data11['supplier_post'] = $supplier_info;
			$data11['buyer_post']    = $buyer_post1;
			$data11['allocation']    = $allocation;
			$data11['type']          = $type;
			$data11['bank_detail']   = Setting::where( 'setting_name', 'product_detail' )->first()->bank_detail;

			Mail::send( 'emails.buyer_bank', $data11, function ( $message ) use ( $buyer_user ) {
				$message->to( $buyer_user->email, $buyer_user->name )
				        ->subject( 'Allocation Request' );
			} );

			$noti                       = new Notification();
			$noti->notification_title   = 'Allocation Accept';
			$noti->notification_content = $supplier_user->name . ' (Supplier) ' . $type . ' The Allocation';
			$noti->status               = 'unread';
			$noti->supplier_id          = $allocation->supplier_id;
			$noti->buyer_id             = $allocation->buyer_id;
			$noti->allocation_id        = $allocation->id;
			$noti->user_id              = $allocation->buyer_id;
			$noti->save();
			return 0;
		}
	}

	public function addBankDetail( $s_post_id, $a_id ) {
		$data                     = array();
		$data['supplier_post_id'] = $s_post_id;
		$data['allocation_id']    = $a_id;
		$supplier_post            = SupplierPost::where( 'supplier_post_id', $s_post_id )->first();

		if ( Auth::check() ) {
			if (Auth::user()->id != $supplier_post->user_id) {
				Auth::logout();
				Auth::loginUsingId( $supplier_post->user_id, true );

				if ( Auth::user()->user_role != 3 ) {
					return redirect( '/' );
				}

				return view( 'frontend.addBank', $data );
			} else {
				if ( Auth::user()->user_role != 3 ) {
					return redirect( '/' );
				}

				return view( 'frontend.addBank', $data );
			}
		} else {
			Auth::loginUsingId( $supplier_post->user_id, true );
			if ( Auth::user()->user_role != 3 ) {
				return redirect( '/' );
			}

			return view( 'frontend.addBank', $data );
		}
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

	public function getWarehousePool( $pid, $id ) {
		$wareHouse = User::where( 'id', $pid )->first()->toJson();
		$wareh     = User::where( 'id', $pid )->first();

		Tempwarehouse::where( 'user_id', Auth::user()->id )->where( 'keyid', $id )->delete();
		$temp                    = new Tempwarehouse();
		$temp->delivery_location = $wareh->delivery_location;
		$temp->delivery_window   = $wareh->delivery_window;
		$temp->description       = $wareh->description;
		$temp->geo_boundary      = $wareh->geo_boundary;
		$temp->delivery_service  = $wareh->delivery_service;
		$temp->user_id           = Auth::user()->id;
		$temp->wid               = $pid;
		$temp->keyid             = $id;
		$temp->save();

		return $wareHouse;
	}

	public function deleteWarehousePool() {
		Tempwarehouse::where( 'user_id', Auth::user()->id )->delete();
	}

	public function checkPostTime() {
		$supplier_posts = SupplierPost::where( 'is_allocation', '0' )->where( 'status', 'pending' )->get();
		$data           = array();
		foreach ( $supplier_posts as $s ) {
			$current_date = date( "Y-m-d H:i:s" );
			$date         = new DateTime( $s->created_at );
			$date->modify( "+" . $s->order_duration . " hours" );
			$new_time = $date->format( "Y-m-d H:i:s" );

			$now  = new DateTime( $current_date );
			$ref  = new DateTime( $new_time );
			$diff = $now->diff( $ref );

			if ( strtotime( $new_time ) > strtotime( $current_date ) ) {
				$data['time'][ $s->supplier_post_id ] = $diff->h . ':' . $diff->i . ':' . $diff->s;
			} else {
				$buyer_post = BuyerPost::where( 'supplier_post_id', $s->supplier_post_id )->where( 'is_low_bid', '0' )->orderBy( 'buyer_bid', 'DESC' )->with( 'userName' )->first();
				if ( $buyer_post ) {
					$data['time'][ $s->supplier_post_id ] = 'accepted';
				} else {
					$data['time'][ $s->supplier_post_id ] = 'Unfilled';
				}
			}
		}

		return json_encode( $data );
	}

	public function getSku() {
		$data = array();
		$product = Sku::where( 'is_use', '0' )->get();
		foreach ( $product as $key => $p ) {
			$data[ $key ]['text']  = $p->sku;
			$data[ $key ]['value'] = $p->id;
		}

		$fp = fopen( 'public/sku_file/data1.json', 'w' );
		fwrite( $fp, json_encode( $data ) );
		fclose( $fp );
		print_r( $data );
	}

	public function checkSupplierPostTimeStatus() {
		$supplier_posts = SupplierPost::where( 'is_allocation', '0' )->where( 'status', 'pending' )->get();
		$data           = array();
		$dataa          = array();
		foreach ( $supplier_posts as $s ) {
			$current_date = date( "Y-m-d H:i:s" );
			$date         = new DateTime( $s->created_at );
			$date->modify( "+" . $s->order_duration . " hours" );
			$new_time = $date->format( "Y-m-d H:i:s" );
			$now      = new DateTime( $current_date );
			$ref      = new DateTime( $new_time );
			$diff     = $now->diff( $ref );
			if ( strtotime( $new_time ) < strtotime( $current_date ) ) {
				$dataa[]    = $s->supplier_post_id;
				$buyer_post = BuyerPost::where( 'supplier_post_id', $s->supplier_post_id )->where( 'is_low_bid', '0' )->orderBy( 'buyer_bid', 'DESC' )->with( 'userName' )->first();
				if ( $buyer_post ) {
//                    $this->allocationToBuyer($s->supplier_post_id, $buyer_post->buyer_post_id);
				} else {
//                    DB::table('supplier_posts')->where('supplier_post_id', $s->supplier_post_id)->update(['status' => 'Unfilled']);
				}
			}
		}
		print_r( $dataa );
	}

	public function allocationToBuyer( $supplier_post_id, $buyer_post_id ) {
		$type                = 'accepted';
		$buyer_post1         = BuyerPost::find( $buyer_post_id );
		$buyer_post1->status = 'accepted';
		$buyer_post1->save();

		DB::table( 'buyer_posts' )->where( 'buyer_post_id', '!=', $buyer_post_id )->where( 'supplier_post_id', $supplier_post_id )->update( [ 'status' => 'Declined' ] );
		$supplier_info = SupplierPost::where( 'supplier_post_id', $supplier_post_id )->first();

		$buyer_user    = User::find( $buyer_post1->user_id );
		$supplier_user = User::find( $supplier_info->user_id );

		$allocation_total                     = $supplier_info->quantity;
		$supp_allocation                      = new SupplierAllocation();
		$supp_allocation->supplier_post_id    = $supplier_post_id;
		$supp_allocation->buyer_post_id       = $buyer_post1->buyer_post_id;
		$supp_allocation->supplier_id         = $supplier_info->user_id;
		$supp_allocation->buyer_id            = $buyer_post1->user_id;
		$supp_allocation->allocation          = $allocation_total;
		$supp_allocation->requried_quantity   = $buyer_post1->quantity;
		$supp_allocation->reallocation        = '';
		$supp_allocation->is_email_sent       = '1';
		$supp_allocation->is_allocation_email = '1';
		$supp_allocation->status              = 'accepted';
		$supp_allocation->sku                 = $supplier_info->sku;
		$supp_allocation->buyer_bid           = $buyer_post1->buyer_bid;
		$supp_allocation->save();


		$supplier_info->status        = 'accepted';
		$supplier_info->is_allocation = '1';
		$supplier_info->save();

		$data11['supplier_user'] = $supplier_user;
		$data11['buyer_user']    = $buyer_user;
		$data11['allocation']    = $allocation_total;
		$data11['supplier_post'] = $supplier_info;
		$data11['buyer_post']    = $buyer_post1;
		$data11['allocation']    = $supp_allocation;
		$data11['type']          = $type;
		$data11['bank_detail']   = Setting::where( 'setting_name', 'product_detail' )->first()->bank_detail;

		$noti                       = new Notification();
		$noti->notification_title   = 'Allocation Accept';
		$noti->notification_content = $supplier_user->name . ' (Supplier) ' . $type . ' The Allocation';
		$noti->status               = 'unread';
		$noti->supplier_id          = $supp_allocation->supplier_id;
		$noti->buyer_id             = $supp_allocation->buyer_id;
		$noti->allocation_id        = $supp_allocation->id;
		$noti->user_id              = $supp_allocation->buyer_id;
		$noti->save();
	}

	public function buyerLogin( $code ) {
		$id = base64_decode( $code );
		if ( Auth::check() ) {
			Auth::logout();
			Auth::loginUsingId( $id, true );
		} else {
			Auth::loginUsingId( $id, true );
		}

		return redirect( '/' );
	}
}
