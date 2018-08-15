<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Address;

class AdminController extends Controller
{

    public function index()
    {
        $admin = User::role(1)->get();

        return view('admin.admin.index', compact('admin'));
    }

    public function edit($id)
    {
        try {
            $admin = User::findOrFail($id);
            $addresses = Address::seft();

            return view('admin.admin.edit', compact('admin', 'addresses'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function update(CustomerUpdateRequest $request, $id)
    {
        try {
            $admin = User::findOrFail($id);
            if($request->password != '') {
                $request->merge([
                    'password' => bcrypt($request->password),
                ]);
            }else{
                $request->merge([
                    'password' => $admin->password,
                ]);
            }
            $admin->update($request->all());

            return redirect('admin/admin/index.html')->with('success', __('Cập nhật thông tin Admin thành công!'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function getLogin()
    {
        if(Auth::user() && Auth::user()->level == 1)
			return redirect()->intended('admin/home/index.html');
        
        return view('admin.login');
    }

    public function postLogin(SignInRequest $request)
    {
    	$credentials = $request->only('email', 'password');
    	$credentials['level'] = 1;
        if(Auth::attempt($credentials)){
            return redirect()->intended('admin/home/index.html');
        }

        return back()->with('message', trans('common.error.login'))->withInput();
    }
    
    public function getLogout()
    {
       	if (Auth::user() && Auth::user()->level == 1) {
            Auth::logout();
        }

        return redirect('admin/login.html');
    }
}
