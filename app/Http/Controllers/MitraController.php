<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Mitra::orderBy('id','desc')->get();
        return view('admin.mitra',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.mitra-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama_mitra'=>'required',
            'foto'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('mitra');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        Mitra::create($data);
        return redirect('admin/mitra')
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
        $mitra = Mitra::find($id);
        return view('admin.mitra-edit',compact('mitra','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'nama_mitra'=>'required',
            // 'foto'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('mitra');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        Mitra::findOrFail($id)->update($data);
        return redirect('admin/mitra')
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Mitra::findOrFail($id)->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
