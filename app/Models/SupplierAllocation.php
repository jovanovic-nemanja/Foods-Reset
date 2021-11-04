<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierAllocation extends Model {
	protected $table = "supplier_allocations";

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
}
