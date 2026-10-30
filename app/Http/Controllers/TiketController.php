<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Agent;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tiket::with(['properti','agen'])->get();
        return view('admin.tiket',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'properti_id'=>'required|exists:propertis,id',
            'nama'=>'required|max:100',
            'email'=>'required|email|max:100',
            'no_hp'=>'required|max:20',
            'pesan'=>'nullable|max:255',
        ]);
        $data['status'] = 'pending';
        $data['no_tiket'] = 'INV' . rand(100000, 999999);
        Tiket::create($data);
        return redirect()->back()->with('success',' Tiket Berhasil dikirmkan');
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
        $data = Tiket::find($id);
        $agen = Agent::all();
        return view('admin.tiket_edit',compact('data','agen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Tiket::find($id);
        $req_data = $request->validate([
            'agent_id'=>'required',
            'jadwal'=>'required',
        ]);
        $data['status'] = 'penjadwalan';
        $data->update($req_data);
        return redirect('/admin/tiket')->with('success',' Jadwal Tiket Berhasil ditentukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tiket::find($id);
        $data->delete();
        return redirect()->back()->with('success',' Tiket Berhasil di hapus');
    }
}
