<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $request){
        $request->session()->put('folder', $request->input('folder'));
        $request->session()->put('volunteer', $request->input('volunteer'));
        return redirect()->route('frame', 1);
    }
}
