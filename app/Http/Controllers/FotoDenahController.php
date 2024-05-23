<?php

namespace App\Http\Controllers;

use App\Models\FotoDenah;
use App\Models\FotoProperti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FotoDenahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_properti($properti)
    {
        $data = FotoDenah::where('properti_id',$properti)->orderBy('id','desc')->get();
        return view('admin.foto_denah',compact('data','properti'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_properti($properti)
    {
        //
        return view('admin.foto_denah-add',compact('properti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
         
            'foto'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('foto_denah');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }
        $data['properti_id']=$request->properti;

        FotoDenah::create($data);
        return redirect('admin/foto_denah/'.$request->properti)
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
        $data = FotoDenah::find($id);
        return view('admin.foto_denah-edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // return 's';
        $data = $request->validate([
           
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('foto_denah');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }
        $ids= FotoDenah::find($id);
        FotoDenah::findOrFail($id)->update($data);
        // return redirect()->back();
        return redirect('admin/foto_denah/'.$ids->properti_id)
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        FotoDenah::findOrFail($id)->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
