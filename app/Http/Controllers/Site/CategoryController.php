<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index($id)
    {
    	$cate = Category::findOrFail($id);
    	$product = $cate->products;

    	return view('site.category.index', compact('product', 'cate'));
    }
}
