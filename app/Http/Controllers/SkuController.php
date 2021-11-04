<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$sku = Sku::orderBy( 'is_use', 'asc' )->paginate(15);
		$title = 'All Sku';

		return view( 'admin.sku.list', compact('sku', 'title'));
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
		$data = array();

		$data['title'] = 'Add New Sku';

		return view( 'admin.sku.create', $data );
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
		$exist_sku = Sku::where( 'sku', $request->get( 'sku' ) )->first();

		if ( ! $exist_sku ) {
			$sku      = new Sku();
			$sku->sku = $request->get( 'sku' );
			$sku->save();
		}

		return redirect( '/sku' );
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
		$data          = array();
		$data['sku']   = Sku::where( 'id', $id )->first();
		$data['title'] = 'Edit Sku';

		return view( 'admin.sku.edit', $data );
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
		$exist_sku = Sku::where( 'sku', $request->get( 'sku' ) )->first();

		if ( ! $exist_sku ) {
			$sku      = Sku::where( 'id', $id )->first();
			$sku->sku = $request->get( 'sku' );
			$sku->save();

		}


		return redirect( '/sku' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function skuSearch( $search ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$sku = Sku::where( "sku", "like", "%" . $search . "%" )->get();

		$data           = array();
		$data['sku']    = $sku;
		$data['search'] = $search;
		$data['title']  = 'All Sku';

		return view( 'admin.sku.list', $data );
	}

	public function skuAction( Request $request ) {

		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}
		$search = $request->get( 'search' );
		if ( $search != '' ) {
			return redirect( '/sku/search/' . $search );
		} else {
			$cid         = $request->get( 'cid' );
			$bulk_action = $request->get( 'bulk_action' );
			if ( $bulk_action != '' ) {
				switch ( $bulk_action ) {
					case 'delete': {
						foreach ( $cid as $id ) {

							Sku::where( 'id', $id )->delete();
						}

						return redirect( '/sku' );
						break;
					}
				} //end switch
			} // end if statement

			return redirect( '/sku' );
		}
	}
}
