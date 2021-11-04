<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {
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
		$data['product']  = Product::where( 'type', '!=', '1' )->orderBy( 'category_id', 'asc' )->with( 'category' )->get();
		$data['category'] = Category::get();
		$data['title']    = 'All Product';

		return view( 'product.list', $data );
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
		$data             = array();
		$data['category'] = Category::where( 'category_id', '!=', '16' )->get();
		$data['title']    = 'Add New Product';

		return view( 'product.create', $data );
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
		$exist_product = Product::where( 'category_id', $request->get( 'category_id' ) )->where( 'product_name', $request->get( 'product_name' ) )->first();

		if ( ! $exist_product ) {
			$product                      = new Product();
			$product->product_name        = $request->get( 'product_name' );
			$product->product_description = $request->get( 'product_des' );
			$product->category_id         = $request->get( 'category_id' );
			$product->save();

		}

		return redirect( '/products' );
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
		$data['product']  = Product::where( 'id', $id )->first();
		$data['category'] = Category::where( 'category_id', '!=', '16' )->Sget();
		$data['title']    = 'Edit Product';

		return view( 'product.edit', $data );
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
		$product1                      = Product::where( 'id', $id )->first();
		$product1->product_name        = $request->get( 'product_name' );
		$product1->product_description = $request->get( 'product_des' );
		$product1->category_id         = $request->get( 'category_id' );
		$product1->save();

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

		$user = Product::where( "product_name", "like", "%" . $search . "%" )
		               ->with( 'category' )->get();

		$data             = array();
		$data['category'] = Category::get();
		$data['product']  = $user;
		//Basic Page Settings

		$data['search'] = $search;
		$data['title']  = 'All Product';

		return view( 'product.list', $data );
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

							Product::where( 'id', $id )->delete();
						}

						return redirect( '/products' );
						break;
					}
				} //end switch
			} // end if statement

			return redirect( '/products' );
		}
	}

	public function getProductTag() {
		$category = Category::get();
		foreach ( $category as $ca ) {
			$data    = array();
			$product = Product::where( 'category_id', $ca->id )->where( 'type', '1' )->get();
			foreach ( $product as $key => $p ) {
				$data[ $key ]['text']  = $p->product_name;
				$data[ $key ]['value'] = $p->id;
			}

			$fp = fopen( 'public/category_files/data-' . $ca->id . '.json', 'w' );
			fwrite( $fp, json_encode( $data ) );
			fclose( $fp );
		}
	}

	public function getProductTag1( $id ) {
		$data    = array();
		$product = Product::where( 'category_id', $id )->where( 'type', '1' )->get();
		foreach ( $product as $key => $p ) {
			$data[ $key ]['text']  = $p->product_name;
			$data[ $key ]['value'] = $p->id;
		}

		$fp = fopen( 'public/category_files/data-' . $id . '.json', 'w' );
		fwrite( $fp, json_encode( $data ) );
		fclose( $fp );

	}
}
