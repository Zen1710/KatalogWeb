<?php

namespace App\Http\Controllers;

use App\Models\About;
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
            'foto'=>'nullable|'.self::ATURAN_FOTO,
        ]);
        unset($data['foto']);

        if($request->hasFile('foto')){
            $data['foto'] = $this->simpanFoto($request->file('foto'), 'about');
        }

        About::findOrFail($id)->update($data);
        return redirect('admin/about')
        ->with('success',' Berhasil DiUpdate');
    }


}
