<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Borrowing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index() {
        $data = DB::select("select borrowing.*, books.name as book_name, books.image as image from borrowing left join books on borrowing.book_id = books.id where borrowing.user_id = :user_id", ["user_id" => Auth::user()->id]);
        return view('Borrowing.Table', [
            "data" => $data,
            "title" => "Buku yg di pinjam"
        ]);
    }

    public function returnBack($id) {
        $user = Auth::user();
        $book = Borrowing::where(['id' => $id, "user_id" => $user->id]);
        $book->firstOrFail();
        $book->update([
            "done" => true
        ]);
        return redirect()
        ->route('user.borrowing')
        ->with('success', "Berhasil");
    }
}

?>
