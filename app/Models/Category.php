<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories";
	protected $primarykey = "category_id";
	protected $fillable = array( 'category_name' );
}
