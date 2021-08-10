<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Category;

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
        return view('Admin.Book.Table', [
            "title"      => "Table",
            "data"       => $data,
            "categories" => $categories
        ]);
    }

    public function create() {
        $categories = Category::all();
        return view('Admin.Book.Form', [
            'title'         => 'Add New Book',
            'action'        => url('admin/book/store'),
            'isCreated'     => true,
            'categories'    => $categories
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name'         => 'required',
            'category'  => 'required',
            'image'        => 'required',
            'creator'      => 'required',
        ]);

        // get form data
        $dataInput = $request->only([
            'name',
            'category',
            'image',
            'creator',
            'download_link'
        ]);

        $query = Book::create($dataInput);

        return redirect()
            ->route('admin.book.index')
            ->with('success', "Berhasil");
    }

    public function show($id) {
        $query = Book::where('id', $id);
        $query = $query->firstOrFail();
        $categories = Category::all();

        $editUrl = url('admin/book/edit/' . $id);

        return view('admin.book.form', [
            'title'         => 'Tampilkan Detail Buku ID: ' . $query->id,
            'action'        => '#',
            'isShow'        => $editUrl,
            'query'         => $query,
            'categories'    => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     *
     * @return Application|Factory|RedirectResponse|Response|View
     */
    public function edit(int $id) {
        $query = Book::where('id', $id);
        $query = $query->firstOrFail();
        $categories = Category::all();

        return view('admin.book.form', [
            'title'         => 'Tampilkan Detail Buku ID: ' . $query->id,
            'action'        => url("admin/book/update/$id"),
            'isEdit'        => true,
            'query'         => $query,
            'categories'    => $categories
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'         => 'required',
            'category_id'  => 'required',
            'image'        => 'required',
            'creator'      => 'required',
        ]);

        // get form data
        $dataInput = $request->only([
            'name',
            'category_id',
            'image',
            'creator'
        ]);

        $query = Book::findOrFail($id);
        $query->update($dataInput);

        return redirect()
            ->route('admin.book.index')
            ->with('success', "Berhasil");
    }

    public function destroy($id) {
        $query = Book::findOrFail($id);
        $query->delete();

        // return response json if success
        return redirect()
            ->route('admin.book.index')
            ->with('success', "Berhasil");
    }
}
 