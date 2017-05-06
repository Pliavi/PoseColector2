<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $request){
        if(config('app.nFolders') <= $request->input('folder') && $request->input('folder') > 0) {
            $request->session()->put('folder', $request->input('folder'));
            $request->session()->put('volunteer', $request->input('volunteer'));
            return redirect()->route('frame', 1);
        } else {
            $request->session()->flash('error', 'A numeração '. @$request->input('folder') . ' não existe, verifique se digitou corretamente.');
            return redirect()->back()->withInput();
        }
    }
}
