<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tempwarehouse extends Model
{
	protected $table = "temp_warehouse";

	public function poolName() {
		return $this->hasOne( 'App\Models\Pool', 'id', 'pool_id' );
	}
}
