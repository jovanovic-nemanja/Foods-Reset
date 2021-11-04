<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $table = "products";
	protected $primarykey = "product_id";

	public function category()
	{
		return $this->hasOne( 'App\Models\Category', 'id', 'category_id' );
	}
}
