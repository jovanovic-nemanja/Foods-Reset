<?php
namespace App\Libraries;

use Illuminate\Support\Facades\DB;
use App\Models\SupplierPost;
use App\Models\User;

class ZnUtilities {

	//Print Array
	public static function getProductName( $array ) {
		$product_ids = explode( ',', $array );
		$data        = '';

		$product = DB::table( 'products' )->whereIn( 'id', $product_ids )->pluck( 'product_name' )->toArray();
		if ( $product ) {
			$data = implode( ',', $product );
		}

		return $data;
	}

	public static function UnallocatedBalance( $spid ) {


		$supplier_info    = SupplierPost::where( 'supplier_post_id', $spid )->first();
		$supplierQuantity = $supplier_info->quantity;

		$total_sent_allocation   = DB::table( 'supplier_allocations' )->where( 'supplier_post_id', $spid )->where( 'status', '!=', 'reject' )->where( 'parent_id', '0' )->pluck( 'allocation' )->toArray();
		$total_sent_reallocation = DB::table( 'supplier_allocations' )->where( 'supplier_post_id', $spid )->where( 'status', '!=', 'reject' )->where( 'parent_id', '>', '0' )->pluck( 'reallocation' )->toArray();
		$total_sent              = array_sum( $total_sent_allocation ) + array_sum( $total_sent_reallocation );
		$pending_quantity        = $supplierQuantity - $total_sent;

		return $pending_quantity;
	}

	public static function rating( $spid ) {

		$rating_all  = DB::table( 'supplier_allocations' )->where( 'supplier_post_id', $spid )->where( 'rating', '>', '0' )->pluck( 'rating' )->toArray();
		$rating_rows = count( $rating_all );

		$total_rating1 = '';
		if ( $rating_rows > 0 ) {

			$total_rating = array_sum( $rating_all ) / $rating_rows;
			for ( $i = 1; $i <= $total_rating; $i ++ ) {
				$total_rating1 .= '<i class="fa fa-star" aria-hidden="true"></i>';
			}
		}

		return $total_rating1;
	}

	public static function getUserDistance( $user1_id, $user2_id ) {

		$user1 = User::where( 'id', $user1_id )->first();
		$user2 = User::where( 'id', $user2_id )->first();
		$lat1  = $user1->lat;
		$lon1  = $user1->lng;

		$lat2 = $user2->lat;
		$lon2 = $user2->lng;
		if ( $lat1 != '' && $lon1 != '' && $lat2 != '' && $lon2 != '' ) {
			$theta          = (double)$lon1 - (double)$lon2;
			$dist           = sin( deg2rad( (double)$lat1 ) ) * sin( deg2rad( (double)$lat2 ) ) + cos( deg2rad( (double)$lat1 ) ) * cos( deg2rad( (double)$lat2 ) ) * cos( deg2rad( (double)$theta ) );
			$dist           = acos( $dist );
			$dist           = rad2deg( $dist );
			$miles          = $dist * 60 * 1.1515;
			$total_distance = $miles * 1.609344;

			return $total_distance;
		}

	}


}
