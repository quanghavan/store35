<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function view($id)
    {
    	$product = Product::findOrFail($id);
    	$product_relate = Product::where('category_id', $product->category_id)->get();

    	return view('site.product.view', compact('product', 'product_relate'));
    }
}
