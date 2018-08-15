<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $guarded = [];
    // lấy ra product
    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
