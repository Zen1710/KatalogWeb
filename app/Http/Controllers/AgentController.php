<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Carbon\Carbon;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Agent::all();
        return view('admin.agen',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.agen-add');
    }

    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama_agent'=>'required',
            'foto'=>'required',
            'email'=>'required',
            'nohp'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('mitra');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        Agent::create($data);
        return redirect('admin/agen')
        ->with('success',' Berhasil Ditambahkan');
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
        $agen = Agent::find($id);
        return view('admin.agen-edit',compact('agen','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'nama_agent'=>'required',
            'email'=>'required',
            'nohp'=>'required',
            // 'foto'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('agen');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        Agent::findOrFail($id)->update($data);
        return redirect('admin/agen')
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Agent::findOrFail($id)->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
