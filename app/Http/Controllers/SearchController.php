<?php

namespace App\Http\Controllers;

use App\Models\BuyerPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\SupplierPost;
use Illuminate\Http\Request;

class SearchController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	public function search( Request $request ) {
		$data        = array();
		$product     = array();
		$user_type   = $request->get( 'user_type' );
		$category_id = $request->get( 'category_id' );
		$product_id  = $request->get( 'product_id' );


		if ( $user_type == '2' ) //buyer search
		{


			if ( $category_id == 0 && $product_id == 0 ) {
				$product = SupplierPost::with( 'product' )->orderBy( 'supplier_post_id', 'desc' )->get();
			} else if ( $category_id > 0 && $product_id == 0 ) {
				$product = SupplierPost::where( 'category_id', $category_id )->with( 'product' )->orderBy( 'supplier_post_id', 'desc' )->get();
			} else if ( $category_id > 0 && $product_id > 0 ) {
				$product = SupplierPost::where( 'category_id', $category_id )->where( 'product_id', $product_id )->with( 'product' )->orderBy( 'supplier_post_id', 'desc' )->get();
			}


		} else if ( $user_type == '2' )// supplier search
		{
			if ( $category_id == 0 && $product_id == 0 ) {
				$product = BuyerPost::with( 'product' )->orderBy( 'buyer_post_id', 'desc' )->get();
			} else if ( $category_id > 0 && $product_id == 0 ) {
				$product = BuyerPost::where( 'category_id', $category_id )->with( 'product' )->orderBy( 'buyer_post_id', 'desc' )->get();

			} else if ( $category_id > 0 && $product_id > 0 ) {
				$product = BuyerPost::where( 'category_id', $category_id )->where( 'product_id', $product_id )->with( 'product' )->orderBy( 'buyer_post_id', 'desc' )->get();

			}


		} else {

			return redirect( '/' );
		}

		$data['search_result'] = $product;
		$data['user_type']     = $user_type;
		$data['category_id']   = $category_id;
		$data['product_id']    = $product_id;
		$data['products']      = Product::where( 'category_id', $category_id )->where( 'type', '0' )->get();

		return view( 'auth.login', $data );
	}

	static function categoryName( $id ) {

		$cate_id = Product::where( 'id', $id )->first();

		if ( $cate_id != '' ) {
			$category = Category::where( 'id', $cate_id->category_id )->first();

			return isset( $category->category_name ) ? $category->category_name : '';
		} else {
			return '';
		}

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
}