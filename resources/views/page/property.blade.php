@extends('theme.user.master')
@section('content')
<div class="hero">
    <div class="hero-slide">
        <div class="img overlay" style="background-image: url('{{url('theme_property')}}/images/hero_bg_3.jpg')">
        </div>
        <div class="img overlay" style="background-image: url('{{url('theme_property')}}/images/hero_bg_2.jpg')">
        </div>
        <div class="img overlay" style="background-image: url('{{url('theme_property')}}/images/hero_bg_1.jpg')">
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
                <h1 class="heading" data-aos="fade-up">
                    Easiest way to find your dream home
                </h1>
                <form action="{{url('property')}}" class="narrow-w form-search d-flex align-items-stretch mb-3"
                    data-aos="fade-up" data-aos-delay="200">
                    <input type="text" class="form-control px-4" name="search" value="{{ request('search') }}" placeholder="Cari rumah impianmu" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<section class="features-1">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="box-feature">
                    <span class="flaticon-house"></span>
                    <h3 class="mb-3">Perumahan</h3>
                    <p><a href="#" class="learn-more">{{$jumlah['Rumah']}}</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="box-feature">
                    <span class="flaticon-building"></span>
                    <h3 class="mb-3">Villa</h3>

                    <p><a href="#" class="learn-more">{{$jumlah['Villa']}}</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature">
                    <span class="flaticon-house-3"></span>
                    <h3 class="mb-3">Apartement</h3>

                    <p><a href="#" class="learn-more">{{$jumlah['Apartement']}}</a></p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="box-feature">
                    <span class="flaticon-house-1"></span>
                    <h3 class="mb-3">Hotel</h3>
                    <p><a href="#" class="learn-more">{{$jumlah['Hotel']}}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section">
    <div class="container">
        <div class="row mb-3 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">
                    Properties
                </h2>
            </div>
            <div class="col-lg-6 text-lg-end">

            </div>
        </div>

        <div class="card mb-4 bg-primary text-white">
            <div class="card-body">
                <form action="{{url('property')}}" method="get">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <div class="row">
                        <div class="col-md-4 mx-2 border">

                            <div class="row">
                                <label for="" class="text-center">Range Harga</label>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Dari</label>
                                        <input type="number" class="form-control" name="from_price" value="{{ request('from_price') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Sampai</label>
                                        <input type="number" class="form-control" name="to_price" value="{{ request('to_price') }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 mx-2 border">

                            <div class="row">
                                <label for="" class="text-center">Kamar</label>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Kamar Tidur</label>
                                        <select id="" class="form-control" name="jumlah_kamar_tidur">
                                            <option value="">Semua</option>
                                            @foreach (['1', '2', '3', '4', '5+'] as $opsi)
                                            <option value="{{ $opsi }}" @selected(request('jumlah_kamar_tidur') === $opsi)>{{ $opsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Kamar Mandi</label>
                                        <select id="" class="form-control" name="jumlah_kamar_mandi">
                                            <option value="">Semua</option>
                                            @foreach (['1', '2', '3', '4', '5+'] as $opsi)
                                            <option value="{{ $opsi }}" @selected(request('jumlah_kamar_mandi') === $opsi)>{{ $opsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-light float-end mt-3" type="submit">Cari</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="row">

            @forelse ($property as $item)

            <div class="col-md-4">
                <div class="property-item">
                    <a href="{{url('property/detail/'.$item->id)}}" class="img">
                        <img src="{{url('images/foto_properti')}}/{{ $item->foto_property->isNotEmpty() ? $item->foto_property->first()->foto : 'empty_image.jpg'  }}"
                            alt="Image" class="img-fluid w-100" />
                    </a>

                    <div class="property-content">
                        <div class="price mb-2"><span>Rp. {{ number_format($item->harga) }}</span> <a
                        class=" float-end badge bg-{{$item->terjual ? 'danger' : 'primary' }}"
                                        style="font-size: 10px">{{ $item->terjual ? 'Terjual' : $item->status }} </a> </div>
                        <div>
                            <span class="d-block mb-2 text-black-50">{{$item->alamat}}</span>
                            <span class="city d-block mb-3">{{$item->nama_properti}}</span>


                            <div class="specs d-flex mb-4">
                                <span class="d-block d-flex align-items-center me-3">
                                    <span class="icon-bed me-2"></span>
                                    <span class="caption">{{$item->jumlah_kamar_tidur}} beds</span>
                                </span>
                                <span class="d-block d-flex align-items-center">
                                    <span class="icon-bath me-2"></span>
                                    <span class="caption">{{$item->jumlah_kamar_mandi}} baths</span>
                                </span>
                            </div>

                            <a href="{{url('property/detail/'.$item->id)}}" class="btn btn-primary py-2 px-3">See
                                details</a>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12">
                <p class="text-center text-black-50 py-5">Properti tidak ditemukan. Coba ubah kata kunci atau filter.</p>
            </div>
            @endforelse



        </div>
    </div>
</div>
</div>





@endsection