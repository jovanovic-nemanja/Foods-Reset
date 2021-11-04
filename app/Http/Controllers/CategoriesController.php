<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller {
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
		$data['category'] = Category::where( 'id', '!=', '16' )->orderBy( 'id', 'desc' )->paginate();
		$data['title']    = 'All Category';

		return view( 'admin.category.list', $data );
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
		$data['title'] = 'Add New Category';

		return view( 'admin.category.create', $data );
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
		$category                       = new Category();
		$category->category_name        = $request->get( 'category_name' );
		$category->category_description = $request->get( 'category_des' );
		$category->save();

		return redirect( '/categories' );
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
		$data['category'] = Category::where( 'id', $id )->first();
		$data['title']    = 'Edit Category';

		return view( 'admin.category.edit', $data );
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
		$category1 = Category::where( 'id', $id )->first();

		$category1->category_name        = $request->get( 'category_name' );
		$category1->category_description = $request->get( 'category_des' );
		$category1->save();

		return redirect( '/categories' );
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

	public function categorySearch( $search ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$user = Category::where( "category_name", "like", "%" . $search . "%" )
		                ->paginate();

		$data = array();
		$data['category'] = $user;
		$data['search']   = $search;
		$data['title']    = 'All Product';

		return view( 'admin.category.list', $data );
	}

	public function categoryAction( Request $request ) {
		if ( Auth::user()->user_role != 1 ) {
			return redirect( '/' );
		}

		$search = $request->get( 'search' );
		if ( $search != '' ) {
			return redirect( '/category/search/' . $search );
		} else {
			$cid         = $request->get( 'cid' );
			$bulk_action = $request->get( 'bulk_action' );
			if ( $bulk_action != '' ) {
				switch ( $bulk_action ) {
					case 'delete': {
						foreach ( $cid as $id ) {
							Category::where( 'id', $id )->delete();
						}

						return redirect( '/categories' );
						break;
					}
				}
			}

			return redirect( '/categories' )->with( 'fail', 'Please Enter a Keyword' );
		}
	}

	public function getProduct( $id ) {
		$product = Product::where( 'category_id', $id )->where( 'type', '0' )->get()->toJson();

		return $product;
	}
}
