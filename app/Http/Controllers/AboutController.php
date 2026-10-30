<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $about = About::first();
        return view('admin.about',compact('about'));
    }

  
    public function update(Request $request,$id)
    {

        //
        $data = $request->validate([
            'deskripsi'=>'required',
            // 'foto'=>'required',
        ]);
        
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('images/about');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        About::findOrFail($id)->update($data);
        return redirect('admin/about')
        ->with('success',' Berhasil DiUpdate');
    }


}
