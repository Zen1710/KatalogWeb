<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;
use App\Models\Ulasan;
use App\Models\Tiket;

class PropertiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Properti::all();
        return view('admin.property',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.property-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $data = $request->validate([
            'nama_properti'=>'required','type_properti'=>'required',
            'nomor_rumah'=>'required','deskripsi'=>'required',
            'luas'=>'required','tahun_pembuatan'=>'required',
            'jumlah_kamar_tidur'=>'required','jumlah_kamar_mandi'=>'required',
            'garasi'=>'required','status'=>'required',
            'ac'=>'required','wifi'=>'required','tv'=>'required','kulkas'=>'required',
            'gym'=>'required','alamat'=>'required',
            'harga'=>'required','informasi_tambahan'=>'required'
        ]);

        if($request->has('latitude')) {
            $data['latitude'] = $request->latitude;
            $data['longitude'] = $request->longitude;
        }

        

        Properti::create($data);
        return redirect('admin/property')
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
        $property = Properti::find($id);
        return view('admin.property-edit',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'nama_properti'=>'required','type_properti'=>'required',
            'nomor_rumah'=>'required','deskripsi'=>'required',
            'luas'=>'required','tahun_pembuatan'=>'required',
            'jumlah_kamar_tidur'=>'required','jumlah_kamar_mandi'=>'required',
            'garasi'=>'required','status'=>'required',
            'ac'=>'required','wifi'=>'required','tv'=>'required','kulkas'=>'required',
            'gym'=>'required','alamat'=>'required',
            'harga'=>'required','informasi_tambahan'=>'required'
        ]);
        
        if($request->has('latitude')) {
            $data['latitude'] = $request->latitude;
            $data['longitude'] = $request->longitude;
        }

        Properti::where('id',$id)->update($data);
        return redirect('admin/property')
        ->with('success',' Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Tiket::where('properti_id',$id)->delete();
        Ulasan::where('properti_id',$id)->delete();
        Properti::findOrFail($id)->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }

    public function status(Request $request)
    {
        Properti::where('id',$request->id)->update([
            'terjual'=>$request->terjual
        ]);
        return redirect()->back()->with('success',' Berhasil Diupdate');
    }
}
