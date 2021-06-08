<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
        ]);
        $credentials = Auth::guard('admin')->attempt(["username" => $request->username, "password" => $request->password]);
        if ($credentials == TRUE){
            return redirect("home")->with('status', 'Berhasil Login');
        } else {
            return redirect("login")->with('error', 'Gagal Login');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect("login");
    }
}
