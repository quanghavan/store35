<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    public function add(OrderRequest $request)
    {
    	$amount = Cart::instance(Auth::user()->id)->subtotal();
    	$value = $request->all();
    	$value['amount'] = floatval(str_replace(',', '', $amount));
    	$value['user_id'] = Auth::user()->id;
    	$order = Order::create($value);
    	foreach (Cart::instance(Auth::user()->id)->content() as $key => $value) {
    		$listOrderDetail = array(
    			'product_id' => $value->id,
    			'quantity' => $value->qty
    		);
    		$order->orderDetails()->create($listOrderDetail);
    	}
    	Cart::instance(Auth::user()->id)->destroy();
    	
    	return redirect()->route('site.home.index')->with('success', __('Cám ơn bạn đã mua hàng'));
    }
}
