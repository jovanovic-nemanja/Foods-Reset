<?php

namespace App\Console\Commands;

use DateTime;
use App\Models\User;
use App\Models\Setting;
use App\Models\BuyerPost;
use App\Models\Notification;
use App\Models\SupplierPost;
use App\Models\SupplierAllocation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class StatusUpdate extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'status:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
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
				$buyer_post = BuyerPost::where( 'supplier_post_id', $s->supplier_post_id )->where( 'is_low_bid', '0' )->orderBy( 'buyer_bid', 'DESC' )->with( 'userName' )->first();
				if ( $buyer_post ) {
					$this->allocationToBuyer( $s->supplier_post_id, $buyer_post->buyer_post_id );
				} else {
					DB::table( 'supplier_posts' )->where( 'supplier_post_id', $s->supplier_post_id )->update( [ 'status' => 'Unfilled' ] );
				}
			}
		}

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
}
