<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Borrowing;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class BookController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param BookDataTable $dataTables
     *
     * @return mixed
     */
    public function index()
    {
        $loopCategories = Category::all();
        $categories = [];
        foreach($loopCategories as $category) {
            $categories[$category->id] = $category->name;
        }
        $data = Book::all();
        return view('Book.Table', [
            "title"      => "Table",
            "data"       => $data,
            "categories" => $categories
        ]);
    }

    public function show($id) {
        $query = Book::where('id', $id);
        $query = $query->firstOrFail();
        $categories = Category::all();

        $editUrl = url('user/book/borrow/' . $id);
        $downloadUrl = is_null($query->download_link) ? null : url("user/book/download/$query->id");

        return view('book.form', [
            'title'         => 'Tampilkan Detail Buku ID: ' . $query->id,
            'action'        => '#',
            'isBorrow'        => $editUrl,
            'downloadLink'  => $downloadUrl,
            'query'         => $query,
            'categories'    => $categories,
            "showDownload"  => true
        ]);
    }

    public function borrow($id) {
        $user = Auth::user();
        $insertData = [
            "user_id" => $user->id,
            "book_id" => $id,
            "is_download" => false,
            "done"      => false
        ];
        Borrowing::create($insertData);
        
        return redirect()
            ->route('user.borrowing.index')
            ->with('success', "Berhasil Meminjam Buku");
    }

    public function download($id) {
        $user = Auth::user();
        $query = Book::where('id', $id);
        $query = $query->firstOrFail();
        $insertData = [
            "user_id" => $user->id,
            "book_id" => $id,
            "is_download" => true,
            "done"      => true
        ];
        Borrowing::create($insertData);
        
        // return header("Location: $query->download_link");
        return redirect($query->download_link);
    }
}
 
