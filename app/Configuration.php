<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $guarded  = [];

    // lấy ra product
    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
