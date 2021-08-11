<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

        return view('Admin.Category.Table', [
            "title"  => "Categories",
            "data"   => $data,
            "create" => route('admin.category.create'),
            "name"   => "Kategori"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.Form', [
            'title'         => 'Add New Category',
            'action'        => url('admin/category/store'),
            'isCreated'     => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        // get form data
        $dataInput = $request->only([
            'name'
        ]);

        Category::create($dataInput);

        return redirect()
            ->route('admin.category.index')
            ->with('success', "Berhasil");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Category::where('id', $id);
        $query = $query->firstOrFail();

        return view('admin.category.form', [
            'title'         => 'Tampilkan Detail Category ID: ' . $query->id,
            'action'        => url("admin/category/update/$id"),
            'isEdit'        => true,
            'query'         => $query,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
        ]);

        // get form data
        $dataInput = $request->only([
            'name'
        ]);

        $query = Category::findOrFail($id);
        $query->update($dataInput);

        return redirect()
            ->route('admin.category.index')
            ->with('success', "Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Category::findOrFail($id);
        $query->delete();

        // return response json if success
        return redirect()
            ->route('admin.category.index')
            ->with('success', "Berhasil");
    }
}
