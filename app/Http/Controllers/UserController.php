<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('id', '!=', auth()->user()->id)->get();
        return view('admin.user-index', compact('data'));
    }

    public function create()
    {
        return view('admin.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
        ]);

        return redirect('admin/user')->with('success', 'User Berhasil Ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ];
        // Field password kosong berarti password lama tetap dipakai
        if($request->filled('password')) {
            $user['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($user);
        return redirect('admin/user')->with('success', 'User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/user')->with('success', 'User Berhasil Dihapus');
    }
}
