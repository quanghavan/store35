<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    // lấy ra product
    public function product() {
    	return $this->belongsTo(Product::class);
    }

    // lấy ra order
    public function order() {
    	return $this->belongsTo(Order::class);
    }
}
