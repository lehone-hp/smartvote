<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ValidateController extends Controller
{
    public function contact_validate(Request $request){
//    	dd($request->message);
//    	$this->validate($request, [
//		    'name' => 'required|max:255',
//		    'email' => 'required|email|max:255',
//		    'message' => 'required',
//	    ]);

	    $validator = Validator::make($request->all(), [
		    'name' => 'required|max:255',
		    'email' => 'required|email|max:255',
		    'message' => 'required',
	    ]);

	    //ensure message cant carry a url
	    $temp_msg=$request->input("message");

	    if(strstr($temp_msg,"http://") || strstr($temp_msg,"https://")){
	       return redirect('contact')->with('status', __('contact.no_url'))->withInput();
	    }
	    //exit();

	    if ($validator->fails()) {
		    return redirect()->back()->withErrors($validator)->withInput();
	    }

	    Mail::send(new sendMail());
	    return redirect('contact')->with('status', 'Your Message has been sent Successfully');
    }

    public function comment_validate(Request $request){
    	$this->validate($request, [
		    'name' => 'required|max:255',
		    'email' => 'required|email|max:255',
		    'message' => 'required',
	    ]);
    }
}
