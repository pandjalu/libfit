<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Borrowing;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('Dashboard', [
            "borrowed" =>  Borrowing::where("user_id", $user->id)->count(),
            "undone" => Borrowing::where(['done' => false, "user_id" => $user->id])->count()
        ]);
    }
}
