<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Expiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data             = array();
		$data['product']  = Setting::orderBy( 'id', 'desc' )->with( 'category' )->get();
		$data['category'] = Category::get();
		$data['title']    = 'All Setting';

		return view( 'admin.product.list', $data );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create( $type ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data = array();
		if ( $type == 'pool' ) {
			$data['title'] = 'Pool';

			return view( 'admin.setting.pool', $data );
		} else if ( $type == 'remainingdays' ) {
			$data['title'] = 'Remaining Days';

			return view( 'admin.setting.remainingdays', $data );
		} else if ( $type == 'quantity' ) {
			$data['title'] = 'Quantity';

			return view( 'admin.setting.quantity', $data );
		} else if ( $type == 'duration' ) {
			$data['title'] = 'Order Duration';

			return view( 'admin.setting.duration', $data );
		} else if ( $type == 'bankdetail' ) {
			$data['title'] = 'Bank Detail';

			return view( 'admin.setting.bank_detail', $data );
		}

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request, $type ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$setting = Setting::where( 'setting_name', 'product_detail' )->first();

		if ( $type == 'pool' ) {
			$setting1 = array();

			if ( $setting->pool != '' ) {
				$setting1 = explode( ',', $setting->pool );
			}
			if ( ! in_array( $request->get( 'pool' ), $setting1 ) ) {
				array_push( $setting1, $request->get( 'pool' ) );

				$setting->pool = implode( ',', $setting1 );
				$setting->save();
			}

		} else if ( $type == 'remainingdays' ) {

			$exist_product = Expiry::where( 'expiry', $request->get( 'expiry' ) )->first();
			if ( ! $exist_product ) {
				$product               = new Expiry();
				$product->expiry       = $request->get( 'expiry' );
				$product->expiry_value = $request->get( 'expiry_value' );
				$product->save();
			}
		} else if ( $type == 'quantity' ) {
			$setting1 = array();

			if ( $setting->quantity != '' ) {
				$setting1 = explode( ',', $setting->quantity );
			}
			if ( ! in_array( $request->get( 'quantity' ), $setting1 ) ) {
				array_push( $setting1, $request->get( 'quantity' ) );

				$setting->quantity = implode( ',', $setting1 );
				$setting->save();
			}
		} else if ( $type == 'duration' ) {
			$setting1 = array();

			if ( $setting->duration != '' ) {
				$setting1 = explode( ',', $setting->duration );
			}
			if ( ! in_array( $request->get( 'duration' ), $setting1 ) ) {
				array_push( $setting1, $request->get( 'duration' ) );

				$setting->duration = implode( ',', $setting1 );
				$setting->save();
			}
		} else if ( $type == 'bankdetail' ) {


			$setting->bank_detail = $request->get( 'bank_detail' );
			$setting->save();
		}


		return redirect( '/admin/setting/' . $type );
	}

	public function delete( Request $request, $type ) {

		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$setting = Setting::where( 'setting_name', 'product_detail' )->first();

		if ( $type == 'pool' ) {
			$setting1 = array();
			$setting1 = explode( ',', $setting->pool );
			$cid      = $request->get( 'cid' );
			foreach ( $cid as $d ) {
				if ( ( $key = array_search( $d, $setting1 ) ) !== false ) {
					unset( $setting1[ $key ] );
				}
			}
			$setting->pool = implode( ',', $setting1 );
			$setting->save();

		} else if ( $type == 'remainingdays' ) {
			$cid = $request->get( 'cid' );
			foreach ( $cid as $ddd ) {
				Expiry::where( 'id', $ddd )->delete();

			}


		} else if ( $type == 'quantity' ) {
			$setting1 = array();
			$setting1 = explode( ',', $setting->quantity );
			$cid      = $request->get( 'cid' );
			foreach ( $cid as $d ) {
				if ( ( $key = array_search( $d, $setting1 ) ) !== false ) {
					unset( $setting1[ $key ] );
				}
			}
			$setting->quantity = implode( ',', $setting1 );
			$setting->save();
		} else if ( $type == 'duration' ) {
			$setting1 = array();
			$setting1 = explode( ',', $setting->duration );
			$cid      = $request->get( 'cid' );
			foreach ( $cid as $d ) {
				if ( ( $key = array_search( $d, $setting1 ) ) !== false ) {
					unset( $setting1[ $key ] );
				}
			}
			$setting->duration = implode( ',', $setting1 );
			$setting->save();
		}


		return redirect( '/admin/setting/' . $type );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data             = array();
		$data['product']  = Setting::where( 'id', $id )->first();
		$data['category'] = Category::get();
		$data['title']    = 'Edit Category';

		return view( 'admin.product.edit', $data );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( $id, Request $request ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$setting1 = Setting::where( 'id', $id )->first();

		$setting1->product_name        = $request->get( 'product_name' );
		$setting1->product_description = $request->get( 'product_des' );
		$setting1->category_id         = $request->get( 'category_id' );
		$setting1->save();

		return redirect( '/products' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function productSearch( $search ) {

		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$user = Setting::where( "product_name", "like", "%" . $search . "%" )
		               ->with( 'category' )->get();

		$data             = array();
		$data['category'] = Category::get();
		$data['product']  = $user;

		$data['search'] = $search;
		$data['title']  = 'All Category';

		return view( 'admin.product.list', $data );
	}

	public function productAction( Request $request ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$search = $request->get( 'search' );
		if ( $search != '' ) {
			return redirect( '/product/search/' . $search );
		} else {
			$cid         = $request->get( 'cid' );
			$bulk_action = $request->get( 'bulk_action' );
			if ( $bulk_action != '' ) {
				switch ( $bulk_action ) {
					case 'delete': {
						foreach ( $cid as $id ) {
							Setting::where( 'id', $id )->delete();
						}

						return redirect( '/products' );
						break;
					}
				} //end switch
			} // end if statement

			return redirect( '/products' );
		}
	}
}
