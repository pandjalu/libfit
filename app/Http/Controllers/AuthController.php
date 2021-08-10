<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function index() {
        if(Auth::check()) {
            $roles = (array)Auth::user()->getRoleNames()[0];
            if(in_array('admin', $roles)) {
                return redirect('/admin');
            } else {
                return redirect('/user');
            }
        }
        return view('auth');
    }

    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $roles = (array)Auth::user()->getRoleNames()[0];
            if(in_array('admin', $roles)) {
                return redirect('/admin');
            } else {
                return redirect('/user');
            }
        } else {
            return "Gagal Login";
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}

?>