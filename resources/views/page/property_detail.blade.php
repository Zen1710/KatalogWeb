@extends('theme.user.master')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style>
    .accordion {
        width: 100%;
        padding: 15px;
    }

    .accordion .accordion-content {
        margin: 10px 0;
        border-radius: 4px;
        background: #FFF7F0;
        border: 1px solid #FFD6B3;
        overflow: hidden;
    }

    .accordion-content:nth-child(2n) {
        background-color: #F0FAFF;
        border-color: #CCEEFF;
    }



    .accordion-content.open {
        padding-bottom: 10px;
    }

    .accordion-content header {
        display: flex;
        min-height: 50px;
        padding: 0 15px;
        cursor: pointer;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s linear;
    }

    .accordion-content.open header {
        min-height: 35px;
    }

    .accordion-content.open .description {
        display: block;
    }

    .accordion-content header .title {
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .accordion-content header i {
        font-size: 15px;
        color: #333;
    }

    .accordion-content .description {
        display: none;
        height: 0;
        font-size: 12px;
        color: #333;
        font-weight: 400;
        padding: 0 15px;
        transition: all 0.2s linear;
    }
</style>
@endpush
@section('content')



<div class="section mt-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <div class="img-property-slide-wrap">
                    <div class="img-property-slide">
                        @forelse($property->foto_property as $item)
                        <img src="{{ asset('images/foto_properti/' . $item->foto) }}" alt="Image" class="img-fluid" />
                        @empty
                        <img src="{{ asset('images/foto_properti/empty_image.jpg') }}" alt="Image" class="img-fluid" />
                        @endforelse
                    </div>
                </div>

                <div class="card bg-primary text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Buat Tiket</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('buat-tiket')}}" method="post">
                            @csrf
                            <input type="hidden" name="properti_id" value="{{$property->id}}">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="">No HP</label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pesan</label>
                                <input type="text" class="form-control" name="pesan">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Kirim</button>

                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <h2 class="heading text-primary">{{$property->nama_properti}}</h2>
                <p class="meta mb-0">{{$property->alamat}}</p>
                <h6 class="meta mt-0">Rp. {{ number_format($property->harga, 0, ',', '.') }}</h6>
                <div class="d-flex">
                    <div class="badge bg-primary me-3">{{$property->type_properti}}</div>
                    <div class="badge bg-warning">{{$property->status}}</div>
                    @if($property->terjual)
                    <div class="badge bg-danger ms-3">Terjual</div>
                    @endif
                </div>

                <div class="agent-box py-1 mb-1">
                    <div class="text mb-2">
                        <h3 class="mb-0">Fasilitas</h3>
                    </div>
                    <div class="d-flex mb-3 justify-content-center">
                        @if($property->tv == "true")
                        <div class="ic">
                            <img src="{{ asset('images/icon/tv.svg') }}" alt="">
                            <span>TV</span>
                        </div>
                        @endif
                        @if($property->ac == "true")
                        <div class="ic">
                            <img src="{{ asset('images/icon/ac.svg') }}" alt="">
                            <span>AC</span>
                        </div>
                        @endif
                        @if($property->kulkas == "true")
                        <div class="ic">
                            <img src="{{ asset('images/icon/kulkas.svg') }}" alt="">
                            <span>KULKAS</span>
                        </div>
                        @endif
                        @if($property->wifi == "true")
                        <div class="ic">
                            <img src="{{ asset('images/icon/wifi.svg') }}" alt="">
                            <span>Wi-Fi</span>
                        </div>
                        @endif
                        @if($property->gym == "true")
                        <div class="ic">
                            <img src="{{ asset('images/icon/gym.svg') }}" alt="">
                            <span>Gym</span>
                        </div>
                        @endif

                    </div>
                </div>

                <div class="agent-box py-1 mb-1 mt-1">
                    <div class="text">
                        <h3 class="mb-0">Deskripsi</h3>
                    </div>
                    <p class="text-black-50 mt-1">
                        {!! str_replace("\n","<br>",$property->deskripsi) !!}
                    </p>
                </div>

                <div class="agent-box py-1 mb-1 mt-1">
                    <div class="text">
                        <h3 class="mb-0">Detail</h3>
                    </div>
                    <table>
                        <tr>
                            <td>Nomor Rumah </td>
                            <td>: {{$property->nomor_rumah}}</td>
                        </tr>
                        <tr>
                            <td>Luas Tanah </td>
                            <td>: {{$property->luas}} M<sup>2</sup></td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan </td>
                            <td>: {{ date('d-m-Y', strtotime($property->tahun_pembuatan)) }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Kamar Tidur </td>
                            <td>: {{$property->jumlah_kamar_tidur}}</td>
                        </tr>

                        <tr>
                            <td>Jumlah Kamar Mandi </td>
                            <td>: {{$property->jumlah_kamar_mandi}}</td>
                        </tr>

                    </table>
                </div>

                <div class=" agent-box  mt-1 py-1">
                    <div class="text">
                        <h3 class="mb-0">Denah</h3>
                    </div>

                    <div class="accordion">
                        @foreach ($property->foto_denah as $n=>$denah)
                        <div class="accordion-content">
                            <header>
                                <span class="title">Denah {{$n+1}}</span>
                                <i class="fa-solid fa-angle-down"></i>
                            </header>

                            <p class="description">
                                <img src="{{asset('images/foto_denah/'.$denah->foto)}}"
                                    class="img-fluid w-100 border mb-2 mx-auto" alt="">
                            </p>
                        </div>
                        @endforeach
                    </div>


                </div>

                <div class=" agent-box  mt-1 py-1">
                    <div class="text">
                        <h3 class="mb-0">Informasi Tambahan</h3>
                    </div>
                    <p class="text-black-50 mt-1">
                        {!! str_replace("\n","<br>",$property->informasi_tambahan) !!}
                    </p>
                </div>

                @if($property->latitude != null && $property->longitude != null)
                <div class="agent-box  mt-1 py-1">
                    <div class="text">
                        <h3 class="mb-0">Lokasi</h3>
                    </div>
                    <p class="text-black-50 mt-1">
                    <iframe src="http://maps.google.com/?q={{$property->latitude}},{{$property->longitude}}&hl=es&z=14&amp;output=embed" class="w-100" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </p>
                </div>
                @endif



            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-7">
                <h1>Ulasan</h1>
                @foreach($ulasan as $u)
                <div class="d-flex">
                    <img src="https://ui-avatars.com/api/?background=random&color=fff&name={{$u->nama}}" width="50" height="50" class="rounded rounded-circle">
                    <div class="card w-100 ms-2">
                        <div class="card-body py-1">
                            <strong>{{$u->nama}}</strong>
                            <p class="card-text">{{$u->ulasan}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-md-5">
                <h3>Kirim Ulasan</h3>
                <form action="{{url('kirimulasan/'.$property->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ulasan</label>
                        <textarea name="ulasan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection

@push('js')
<script>
    const accordionContent = document.querySelectorAll(".accordion-content");

    accordionContent.forEach((item, index) => {
        let header = item.querySelector("header");
        header.addEventListener("click", () => {
            item.classList.toggle("open");

            let description = item.querySelector(".description");
            if (item.classList.contains("open")) {
                description.style.height =
                    `${description.scrollHeight}px`; //scrollHeight property returns the height of an element including padding , but excluding borders, scrollbar or margin
                item.querySelector("i").classList.replace("fa-angle-down", "fa-angle-up");
            } else {
                description.style.height = "0px";
                item.querySelector("i").classList.replace("fa-angle-up", "fa-angle-down");
            }
            removeOpen(
                index); //calling the funtion and also passing the index number of the clicked header
        })
    })

    function removeOpen(index1) {
        accordionContent.forEach((item2, index2) => {
            if (index1 != index2) {
                item2.classList.remove("open");

                let des = item2.querySelector(".description");
                des.style.height = "0px";
                item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
            }
        })
    }
</script>

@endpush