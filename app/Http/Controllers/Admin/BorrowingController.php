<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Borrowing;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index() {
        $data = DB::select("select borrowing.*, books.name as book_name, users.name as user_name, books.image as image from borrowing left join books on borrowing.book_id = books.id left join users on borrowing.user_id = users.id");
        return view('Admin.Borrowing.Table', [
            "data" => $data,
            "title" => "Buku yg di pinjam"
        ]);
    }

    public function returnBack($id) {
        $book = Borrowing::where(['id' => $id]);
        $book->firstOrFail();
        $book->update([
            "done" => true
        ]);
        return redirect()
        ->route('admin.borrowing.index')
        ->with('success', "Berhasil");
    }
}

?>