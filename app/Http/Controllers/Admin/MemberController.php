<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('Admin.Member.Table', [
            "title"      => "Member",
            "data"       => $data,
            "create"     => route('admin.member.create'),
            "name"       => "Member"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Member.Form', [
            'title'         => 'Add New Member',
            'action'        => url('admin/member/store'),
            'isCreated'     => true,
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
            'name'         => 'required',
            'email'        => 'required|unique:users,email',
            'password'     => 'required',
        ]);

        // get form data
        $dataInput = $request->only([
            'name',
            'email',
        ]);
        $dataInput['password'] = Hash::make($request->get('password'));

        $user = User::create($dataInput);
        $user->assignRole('user');

        return redirect()
            ->route('admin.member.index')
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
        $query = User::where('id', $id);
        $query = $query->firstOrFail();

        return view('admin.member.form', [
            'title'         => 'Tampilkan Detail Member ID: ' . $query->id,
            'action'        => url("admin/member/update/$id"),
            'isEdit'        => true,
            'query'         => $query
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
            'password'     => 'required',
        ]);

        // get form data
        $dataInput = $request->only([
            'name'
        ]);
        $dataInput['password'] = Hash::make($request->get('password'));

        $query = User::findOrFail($id);
        $query->update($dataInput);

        return redirect()
            ->route('admin.member.index')
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
        $query = User::findOrFail($id);
        $query->delete();

        // return response json if success
        return redirect()
            ->route('admin.member.index')
            ->with('success', "Berhasil");
    }
}
