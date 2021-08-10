<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Borrowing;

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
        return view('Admin.Dashboard', [
            "book" => Book::count(),
            "member" => User::count(),
            "borrowed" =>  Borrowing::count(),
            "undone" => Borrowing::where('done', false)->count()
        ]);
    }
}
