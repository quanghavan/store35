<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    // lấy ra catalog của 1 product
    public function category() {
    	return $this->belongsTo(Category::class);
    }
    
    // lấy ra các comment của product
    public function comments() {
    	return $this->hasMany(Comment::class);
    } 

    // lấy ra các order chứa product
    public function orders() {
    	return $this->belongsToMany(Orders::class, 'orders');
    }

    // lấy ra configuration của product
    public function configuration() {
    	return $this->hasOne(Configuration::class);
    }

    // lấy ra các image của product
    public function images() {
    	return $this->hasMany(Image::class);
    }

    // lấy ra orderDetail
    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeGetProductDis($query)
    {
        return $query->where('discount', '>', 0);
    }

    public function scopeGetProductView($query)
    {
        return $query->latest('view');
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('name', 'like', '%' . $key . '%');
    }

    public function scopeGetProductNew($query)
    {
        return $query->latest();
    }
}
