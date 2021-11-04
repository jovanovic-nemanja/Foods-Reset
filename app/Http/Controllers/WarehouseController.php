<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data              = array();
		$data['warehouse'] = User::where( 'user_role', '3' )->orderBy( 'id', 'desc' )->paginate();
		$data['title']     = 'All WareHouse';

		return view( 'admin.warehouse.list', $data );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$data          = array();
		$data['title'] = 'Add WareHouse';
		$data['pool']  = Pool::get();

		return view( 'admin.warehouse.create', $data );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$this->validate( $request, [
			'email' => 'required|email|max:255|unique:users',

			'password' => 'required|min:6|confirmed',
		] );

		$city    = $request->get( 'city' );
		$state   = $request->get( 'state' );
		$street  = $request->get( 'street' );
		$zipcode = $request->get( 'zipcode' );
		$country = $request->get( 'country' );

		$address = $street;
		if ( $city != '' ) {
			$address = $address . ', ' . $city;
		}
		if ( $state != '' ) {
			$address = $address . ', ' . $state;
		}
		if ( $zipcode != '' ) {
			$address = $address . ', ' . $zipcode;
		}

		$warehouse               = new User();
		$warehouse->name         = $request->get( 'username' );
		$warehouse->email        = $request->get( 'email' );
		$warehouse->address      = $address;
		$warehouse->city         = $city;
		$warehouse->state        = $state;
		$warehouse->street       = $street;
		$warehouse->zipcode      = $zipcode;
		$warehouse->country      = $country;
		$warehouse->company_name = $request->get( 'company_name' );
		$warehouse->user_role    = '3';
		if ( $request->get( 'delivery_service' ) != '' ) {
			$warehouse->delivery_service = implode( ',', $request->get( 'delivery_service' ) );
		}
		$warehouse->delivery_location  = $request->get( 'delivery_location' );
		$warehouse->delivery_window    = date( "Y-m-d H:i:s", strtotime( $request->get( 'delivery_window' ) ) );
		$warehouse->delivery_window_to = date( "Y-m-d H:i:s", strtotime( $request->get( 'delivery_window_to' ) ) );
		$warehouse->noti_email         = $request->get( 'notification' );
		$warehouse->description        = $request->get( 'description' );
		$warehouse->geo_boundary       = $request->get( 'geo_boundary' );
		$warehouse->pikup              = 'Supplier delivery Preference';
		$warehouse->bank               = $request->get( 'bank' );
		$warehouse->branch             = $request->get( 'branch' );
		$warehouse->transit            = $request->get( 'transit' );
		$warehouse->account_number     = $request->get( 'account_number' );
		$warehouse->details            = $request->get( 'details' );
		$warehouse->lat                = $request->get( 'lat' );
		$warehouse->lng                = $request->get( 'lng' );

		$warehouse->password = bcrypt( $request->get( 'password' ) );
		if ( $request->get( 'pool_id' ) != '' ) {
			$warehouse->pool = implode( ',', $request->get( 'pool_id' ) );
		}
		$warehouse->lat = $request->get( 'lat' );
		$warehouse->lng = $request->get( 'lng' );
		$warehouse->save();

		return redirect( '/warehouse' );
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
		$data              = array();
		$data['warehouse'] = User::where( 'id', $id )->first();

		$data['pool']  = Pool::get();
		$data['title'] = 'Edit WareHouse';

		return view( 'admin.warehouse.edit', $data );
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


		$city    = $request->get( 'city' );
		$state   = $request->get( 'state' );
		$street  = $request->get( 'street' );
		$zipcode = $request->get( 'zipcode' );
		$country = $request->get( 'country' );

		$address = $street;
		if ( $city != '' ) {
			$address = $address . ', ' . $city;
		}
		if ( $state != '' ) {
			$address = $address . ', ' . $state;
		}
		if ( $zipcode != '' ) {
			$address = $address . ', ' . $zipcode;
		}


		$warehouse       = User::where( 'id', $id )->first();
		$warehouse->name = $request->get( 'username' );

		$warehouse->address      = $address;
		$warehouse->city         = $city;
		$warehouse->street       = $street;
		$warehouse->state        = $state;
		$warehouse->zipcode      = $zipcode;
		$warehouse->country      = $country;
		$warehouse->company_name = $request->get( 'company_name' );
		$warehouse->user_role    = '3';
		if ( $request->get( 'delivery_service' ) != '' ) {
			$warehouse->delivery_service = implode( ',', $request->get( 'delivery_service' ) );
		}
		$warehouse->delivery_location  = $request->get( 'delivery_location' );
		$warehouse->delivery_window    = date( "Y-m-d H:i:s", strtotime( $request->get( 'delivery_window' ) ) );
		$warehouse->delivery_window_to = date( "Y-m-d H:i:s", strtotime( $request->get( 'delivery_window_to' ) ) );
		$warehouse->noti_email         = $request->get( 'notification' );
		$warehouse->description        = $request->get( 'description' );
		$warehouse->geo_boundary       = $request->get( 'geo_boundary' );
		$warehouse->pikup              = 'Supplier delivery Preference';
		$warehouse->bank               = $request->get( 'bank' );
		$warehouse->branch             = $request->get( 'branch' );
		$warehouse->transit            = $request->get( 'transit' );
		$warehouse->account_number     = $request->get( 'account_number' );
		$warehouse->details            = $request->get( 'details' );
		$warehouse->lat                = $request->get( 'lat' );
		$warehouse->lng                = $request->get( 'lng' );
		if ( $request->get( 'password' ) != '' ) {
			$warehouse->password = bcrypt( $request->get( 'password' ) );
		}
		if ( $request->get( 'pool_id' ) != '' ) {
			$warehouse->pool = implode( ',', $request->get( 'pool_id' ) );
		}
		$warehouse->lat = $request->get( 'lat' );
		$warehouse->lng = $request->get( 'lng' );
		$warehouse->save();


		return redirect( '/warehouse' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}

	public function wareHouseSearch( $search ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$user = User::where( "address", "like", "%" . $search . "%" )
		            ->where( 'user_role', '3' )
		            ->paginate();

		$data = array();

		$data['warehouse'] = $user;
		//Basic Page Settings

		$data['search'] = $search;
		$data['title']  = 'All WareHouse';

		return view( 'admin.warehouse.list', $data );
	}

	public function wareHouseAction( Request $request ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$search = $request->get( 'search' );
		if ( $search != '' ) {
			return redirect( '/warehouse1/search/' . $search );
		} else {


			//die(Input::get('bulk_action')   );

			$cid         = $request->get( 'cid' );
			$bulk_action = $request->get( 'bulk_action' );
			if ( $bulk_action != '' ) {
				switch ( $bulk_action ) {
					case 'delete': {
						foreach ( $cid as $id ) {

//                            WareHouse::where('id', $id)->delete();
						}

						return redirect( '/warehouse' );
						break;
					}
				} //end switch
			} // end if statement

			return redirect( '/warehouse' )->with( 'fail', 'Please Enter a Keyword' );
		}
	}


}
