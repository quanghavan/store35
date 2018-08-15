<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;

class OrderController extends Controller
{
    public function index()
    {
    	$order = Order::all();

    	return view('admin.order.index', compact('order'));
    }

    public function detail(Request $request)
    {
    	$order = Order::findOrFail($request->id);
    	$user = User::withTrashed()->find($order->user_id);
    	$orderDetails = $order->orderDetails; 
    	$listId = array();
    	foreach ($orderDetails as $key => $value) {
    		$listId[] = $value->product_id;
    	}
    	$product = Product::withTrashed()->find($listId);

    	return view('admin.order.detail', compact('order', 'orderDetails', 'user', 'product'));
    }

    public function delete(Request $request)
    {
    	try {
    		$listId = $request->allVals;
    		foreach ($listId as $key => $value) {
                $category = Category::findOrFail($value);
                $category->products()->delete();
                $category->delete();
            }
    	} catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function deleteOrderDetail(Request $request)
    {
    	try {
    		$listId = $request->allVals;
    		$orderId = OrderDetail::findOrFail($listId[0])->order_id;
			$order = Order::findOrFail($orderId);
			$amount = $order->amount;
			foreach ($listId as $key => $value) {
				$orderDetail = OrderDetail::findOrFail($value);
				$price = $orderDetail->product->price - $orderDetail->product->discount;
				$amount -= $price * $orderDetail->quantity;
			}
			OrderDetail::destroy($listId);
			if (OrderDetail::count() == 0) {
				$order->delete();
			}
    		
            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function confirmOrder(Request $request)
    {
    	try {
	    	$order = Order::findOrFail($request->id_order);
	    	$order->update(array('status' => 1));

	    	return redirect()->route('order.index')->with('success', __('Xác nhận đơn hàng thành công'));
    	} catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }
}
