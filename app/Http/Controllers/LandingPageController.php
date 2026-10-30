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
        $total = Properti::selectRaw('type_properti, count(*) as total')
            ->groupBy('type_properti')
            ->pluck('total', 'type_properti');

        $jumlah = [];
        foreach (['Rumah', 'Apartement', 'Villa', 'Hotel'] as $type) {
            $jumlah[$type] = $total[$type] ?? 0;
        }

        $property = Properti::with('foto_property')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('nama_properti', 'like', '%'.$request->search.'%')
                        ->orWhere('alamat', 'like', '%'.$request->search.'%');
                });
            })
            ->when($request->filled('from_price'), fn ($query) => $query->where('harga', '>=', (int) $request->from_price))
            ->when($request->filled('to_price'), fn ($query) => $query->where('harga', '<=', (int) $request->to_price))
            ->when($request->filled('jumlah_kamar_tidur'), fn ($query) => $this->filterJumlahKamar($query, 'jumlah_kamar_tidur', $request->jumlah_kamar_tidur))
            ->when($request->filled('jumlah_kamar_mandi'), fn ($query) => $this->filterJumlahKamar($query, 'jumlah_kamar_mandi', $request->jumlah_kamar_mandi))
            ->get();

        return view('page.property',compact('property','jumlah'));
    }

    // Opsi "5+" di form berarti 5 kamar atau lebih
    private function filterJumlahKamar($query, $kolom, $nilai)
    {
        if ($nilai === '5+') {
            return $query->where($kolom, '>=', 5);
        }

        return $query->where($kolom, (int) $nilai);
    }
    public function property_details($id)
    {
        $property = Properti::with(['foto_property','foto_denah'])->find($id);
        $ulasan = Ulasan::where('properti_id',$id)->get();
        return view('page.property_detail',compact('property','ulasan'));
    }

    public function ulasan($id, Request $request)
    {
        $properti = Properti::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required|max:100',
            'ulasan' => 'required|max:1000',
        ]);

        Ulasan::create($data + ['properti_id' => $properti->id]);

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
