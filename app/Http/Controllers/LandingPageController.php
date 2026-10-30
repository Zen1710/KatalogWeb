<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Agent;
use App\Models\About;
use App\Models\Properti;
use App\Models\Faq;
use App\Models\Ulasan;

class LandingPageController extends Controller
{
    public function index()
    {
        $agent = Agent::all();
        $property = Properti::with('foto_property')->take(5)->get();
        $mitra = Mitra::all();

        $jumlah = [
            'Rumah'=>Properti::where('type_properti','Rumah')->count(),
            'Apartement'=>Properti::where('type_properti','Apartement')->count(),
            'Villa'=>Properti::where('type_properti','Villa')->count(),
            'Hotel'=>Properti::where('type_properti','Hotel')->count(),
            'Agent'=>Agent::all()->count(),
            'Properti' => Properti::all()->count(),
        ];
        return view('page.landing_page',compact('mitra','property','jumlah','agent'));
    }

    public function property(Request $request)
    {
        $property = Properti::with('foto_property')->get();

        $jumlah = [
            'Rumah'=>$property->where('type_properti','Rumah')->count(),
            'Apartement'=>$property->where('type_properti','Apartement')->count(),
            'Villa'=>$property->where('type_properti','Villa')->count(),
            'Hotel'=>$property->where('type_properti','Hotel')->count(),
        ];

        if($request->has('search') && $request->search != '') {
            $property = $property->where('title','like','%'.$request->search.'%');
        }
        if($request->has('from_price') && $request->from_price != '') {
            $property = $property->where('harga','>=',$request->from_price);
        }
        if($request->has('to_price') && $request->to_price != '') {
            $property = $property->where('harga','<=',$request->to_price);
        }
        if($request->has('jumlah_kamar_mandi') && $request->jumlah_kamar_mandi != '') {
            if($request->has('jumlah_kamar_mandi') == ">5") {
                $property = $property->where('jumlah_kamar_mandi','>','5');
            }else{
                $property = $property->where('jumlah_kamar_mandi',"=",$request->jumlah_kamar_mandi);
            }
        }
        if($request->has('jumlah_kamar_tidur') && $request->jumlah_kamar_tidur != '') {
            if($request->has('jumlah_kamar_tidur') == ">5") {
                $property = $property->where('jumlah_kamar_tidur','>','5');
            }else{
                $property = $property->where('jumlah_kamar_tidur',"=",$request->jumlah_kamar_tidur);
            }
        }
        return view('page.property',compact('property','jumlah'));
    }
    public function property_details($id)
    {
        $property = Properti::with(['foto_property','foto_denah'])->find($id);
        $ulasan = Ulasan::where('properti_id',$id)->get();
        return view('page.property_detail',compact('property','ulasan'));
    }

    public function ulasan($id, Request $request)
    {
        Ulasan::create([
            'nama'=> $request->nama,
            'ulasan'=> $request->ulasan,
            'properti_id'=> $id
        ]);

        return redirect()->back()->with('success', 'Ulasan Berhasil Ditambahkan');
    }

    public function about()
    {
        $about = About::first();
        return view('page.about',compact('about'));
    }
    public function contact_us()
    {
        return view('page.contact_us');
    }
    public function faq()
    {
        $faqs = Faq::all();
        return view('page.faq',compact('faqs'));
    }
}
