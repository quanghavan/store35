<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = User::role(0)->get();
        

        return view('admin.customer.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::seft();

        return view('admin.customer.add', compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'level' => 0,
        ]);
        User::create($request->all());

        return redirect('admin/customer')->with('success', __('Thêm mới khách hàng thành công!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $customer = User::findOrFail($id);
            $addresses = Address::seft();

            return view('admin.customer.edit', compact('customer', 'addresses'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        try {
            $customer = User::findOrFail($id);
            if($request->password != '') {
                $request->merge([
                    'password' => bcrypt($request->password),
                ]);
            }else{
                $request->merge([
                    'password' => $customer->password,
                ]);
            }
            $customer->update($request->all());

            return redirect('admin/customer')->with('success', __('Cập nhật khách hàng thành công!'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $customer = User::findOrFail($request->id);
            $customer->delete();

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function delMulCustomer(Request $request)
    {
        try {
            User::destroy($request->allVals);

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function restore()
    {
        User::withTrashed()->restore();

        return redirect()->route('customer.index')->with('success', __('Khôi phục lại các khách hàng đã xóa'));
    }
}
