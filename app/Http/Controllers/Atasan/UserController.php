<?php

namespace App\Http\Controllers\Atasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Super-Admin.User-Page.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Super-Admin.User-Page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users=User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'username' =>$request->username,
            'role' => 2,
            'password' =>Hash::make($request->password)
        ]);
        if($users){
            Alert::success('User Berhasil Ditambahkan','Selamat');
            return redirect()->route('user.index');
        }
        else{
            Alert::error('User Gagal Ditambahkan','Coba Lagi');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('Super-Admin.User-Page.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $users->update($request->all());
        if($users){
            Alert::success('User Berhasil Diubah','Selamat');
            return redirect()->route('user.index');
        }
        else{
            Alert::error('User Gagal Diubah','Coba Lagi');
            return redirect()->route('user.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        if($users->delete())
        {
            Alert::success('User Berhasil Dihapus', 'Success');
            return redirect()->route('user.index');
        }
        else{
            Alert::error('User Gagal Dihapus','Coba Lagi');
            return redirect()->route('user.index');
        }
    }
}
