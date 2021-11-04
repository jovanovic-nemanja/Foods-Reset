<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller {

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
		$data = array();
//        $data['product_tags'] = ProductTag::orderBy('id','desc')->paginate();
		$data['product_tags'] = Product::where( 'type', '1' )->with( 'category' )->orderBy( 'id', 'desc' )->paginate();
		$data['title']        = 'All Product Tag';

		return view( 'frontend.tags.list', $data );
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

		$data['title']    = 'Add New Product Tag';
		$data['category'] = Category::where( 'category_id', '!=', '16' )->Sget();

		return view( 'frontend.tags.create', $data );
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

		$exist_product = Product::where( 'category_id', $request->get( 'category_id' ) )
		                        ->where( 'product_name', $request->get( 'product_tag_name' ) )
		                        ->where( 'type', '1' )->first();

		if ( ! $exist_product ) {
			$product                      = new Product();
			$product->product_name        = $request->get( 'product_tag_name' );
			$product->product_description = $request->get( 'product_des' );
			$product->category_id         = $request->get( 'category_id' );
			$product->type                = '1';
			$product->save();

		}

		return redirect( '/producttags' );
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

		$data                = array();
		$data['product_tag'] = Product::where( 'id', $id )->first();
		$data['title']       = 'Edit Product Tag';
		$data['category']    = Category::where( 'category_id', '!=', '16' )->Sget();

		return view( 'frontend.tags.edit', $data );
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
		$product1 = Product::where( 'id', $id )->first();
		$product1->product_name        = $request->get( 'product_tag_name' );
		$product1->product_description = $request->get( 'product_des' );
		$product1->category_id         = $request->get( 'category_id' );
		$product1->type                = '1';
		$product1->save();


		return redirect( '/producttags' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function productTagSearch( $search ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$user = ProductTag::where( "product_tag_name", "like", "%" . $search . "%" )->paginate();

		$data = array();

		$data['product_tags'] = $user;
		//Basic Page Settings

		$data['search'] = $search;
		$data['title']  = 'All Product Tag';

		return view( 'frontend.tags.list', $data );
	}

	public function productTagAction( Request $request ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$search = $request->get( 'search' );
		if ( $search != '' ) {
			return redirect( '/producttag/search/' . $search );
		} else {
			$cid         = $request->get( 'cid' );
			$bulk_action = $request->get( 'bulk_action' );
			if ( $bulk_action != '' ) {
				switch ( $bulk_action ) {
					case 'delete': {
						foreach ( $cid as $id ) {
							Product::where( 'id', $id )->delete();
						}
						return redirect( '/producttags' );
						break;
					}
				} //end switch
			} // end if statement

			return redirect( '/producttags' );
		}
	}
}
