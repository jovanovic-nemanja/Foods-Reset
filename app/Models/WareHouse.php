<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model {
	protected $table = "warehouse";

	public function poolName() {
		return $this->hasOne( 'App\Models\Pool', 'id', 'pool_id' );
	}
}
