<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
    	$contact = Contact::all();

    	return view('admin.contact.index', compact('contact'));
    }

   	public function delete(Request $request)
    {
        try {
            $contact = Contact::findOrFail($request->id);
            $contact->delete();

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function delMulCon(Request $request)
    {
        try {
            Contact::destroy($request->allVals);

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }
}
