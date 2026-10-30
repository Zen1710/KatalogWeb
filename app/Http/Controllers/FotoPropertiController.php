<?php

namespace App\Http\Controllers;

use App\Models\FotoProperti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FotoPropertiController extends Controller
{
    public function index_properti($properti)
    {
        $data = FotoProperti::where('properti_id',$properti)->orderBy('id','desc')->get();
        return view('admin.foto_properti',compact('data','properti'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_properti($properti)
    {
        //
        return view('admin.foto_properti-add',compact('properti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $data = $request->validate([
         
            'foto'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('images/foto_properti');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }
        $data['properti_id']=$request->properti;

        FotoProperti::create($data);
        return redirect('admin/foto_properti/'.$request->properti)
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
        $data = FotoProperti::find($id);
        return view('admin.foto_properti-edit',compact('data'));
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
            $tujuan_upload = public_path('foto_properti');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }
        $ids= FotoProperti::find($id);
        FotoProperti::findOrFail($id)->update($data);
        // return redirect()->back();
        return redirect('admin/foto_properti/'.$ids->properti_id)
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        FotoProperti::findOrFail($id)->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
