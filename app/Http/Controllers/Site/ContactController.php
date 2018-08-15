<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
    	return view('site.contact.index');
    }

    public function store(ContactRequest $request)
    {
    	Contact::create($request->all());

    	return back()->with('success', __('Cám ơn bạn đã liên hệ với chúng tôi'));
    }
}
