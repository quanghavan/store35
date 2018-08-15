<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class CustomerController extends Controller
{
    public function logIn()
    {
        return view('site.customer.login');
    }

    public function postLogIn(SignInRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('site.home.index');
        }

        return back()->with('message', __('Đăng nhập không thành công'))->withInput();
    }

    public function logOut()
    {
        if (Auth::user()) {
            Auth::logout();
        }

        return redirect()->route('site.home.index');
    }

    public function regester()
    {
        $addresses = Address::seft();
        return view('site.customer.regester', compact('addresses'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::seft();

        return view('site.customer.regester', compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $password = $request->password;
        $request->merge([
            'password' => bcrypt($request->password),
            'level' => 0,
        ]);
        $user = User::create($request->all());
        $credentials = array('email' => $user->email, 'password' => $password);
        if (Auth::attempt($credentials)) {
            return redirect()->route('site.home.index');//->with('success', __('Thêm mới khách hàng thành công!'));
        }
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

            return view('site.customer.edit', compact('customer', 'addresses'));
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

            return redirect()->route('site.customer.edit', ['customer' => $id])->with('success', __('Cập nhật thông tin thành công!'));
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
    public function destroy($id)
    {
        //
    }
}
