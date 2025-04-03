<?php

namespace App\Http\Controllers;

use App\Mail\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // public function send(){
    //     Mail::to('aliciafelisha67@gmail.com')->send(new test());
    // }

    public function viewPage(){
        return view('welcome');
    }
    public function contactPage(){
        return view('../contactus');
    }

    public function contact(Request $request){
        $filePath = public_path('testpdf.pdf');
        Mail::to('aliciafelisha67@gmail.com')->send(new test($request->name, $request->email, $request->subject, $request->contactMessage, $filePath));
    }
}
