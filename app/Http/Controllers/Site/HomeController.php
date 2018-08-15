<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\News;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$product_new = Product::getProductView()->get();
    	// $posts = Product::withCount('order')->get();
    	// dd($posts);
    	//dd($product_sell);
    	$product_disc = Product::getProductDis()->get();
    	$product_view = Product::getProductView()->first();
    	$news = News::getNews()->get();

    	return view('site.home.index', compact(
    		[
	    		'product_new', 
	    		'product_disc', 
	    		'news',
	    		'product_view'
    		]
    	));
    }

    public function search(Request $request)
    {
        $key = $request->key;
        if ($key == "") {
            return back();
        }
        $news = News::getNews()->get();
        $product_view = Product::getProductView()->first();
        $product = Product::search($key)->get();

        return view('site.home.search', compact('news', 'product', 'product_view'));
    }

    public function segest(Request $request)
    {
        $product = Product::search($request->key)->pluck('name');
        return response()->json($product);
    }
}
