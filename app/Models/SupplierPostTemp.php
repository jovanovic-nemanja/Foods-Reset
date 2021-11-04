<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierPostTemp extends Model {

	protected $table = "supplier_posts_temp";
	protected $primaryKey = 'supplier_post_id';


	public function product() {

		return $this->hasOne( 'App\Models\Product', 'id', 'product_id' );
	}

	public function category() {

		return $this->hasOne( 'App\Models\Category', 'id', 'category_id' );
	}

	public function poolName() {
		return $this->hasOne( 'App\Models\Pool', 'id', 'pool' );
	}

	public function warehouseName() {
		return $this->hasOne( 'App\Models\WareHouse', 'id', 'product_location' );
	}

	public function userInfo() {
		return $this->hasOne( 'App\Models\User', 'id', 'product_location' );
	}

	public function skuInfo() {
		return $this->hasOne( 'App\Models\Sku', 'id', 'sku' );
	}

	public function userinfo1() {

		return $this->hasOne( 'App\Models\User', 'id', 'user_id' );
	}
}
