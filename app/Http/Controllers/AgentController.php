<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

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
            'foto'=>'required|'.self::ATURAN_FOTO,
            'email'=>'required',
            'nohp'=>'required',
        ]);

        $data['foto'] = $this->simpanFoto($request->file('foto'), 'agen');

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
            'foto'=>'nullable|'.self::ATURAN_FOTO,
        ]);
        unset($data['foto']);

        if($request->hasFile('foto')){
            $data['foto'] = $this->simpanFoto($request->file('foto'), 'agen');
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
