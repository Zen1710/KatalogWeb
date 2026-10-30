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
                    @csrf
                    <input type="text" class="form-control px-4" name="search" placeholder="Cari rumah impianmu" />
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
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">
                    Popular Properties
                </h2>
            </div>
            <div class="col-lg-6 text-lg-end">
                <p>
                    <a href="{{url('property')}}" class="btn btn-primary text-white py-3 px-4">View all properties</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="property-slider-wrap">
                    <div class="property-slider">

                        @foreach ($property as $item)

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

                                    <a href="{{url('property/detail/'.$item->id)}}"
                                        class="btn btn-primary py-2 px-3">See details</a>
                                </div>
                            </div>
                        </div>

                        @endforeach



                    </div>

                    <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                        <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                        <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="section section-4 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-5">
                <h2 class="font-weight-bold heading text-primary mb-4">
                    Let's find home that's perfect for you
                </h2>
                <p class="text-black-50">
                    Cari beberapa impian tempat tinggal yang sesuai dengan kebutuhanmu dengan menggunakan fitur
                    pencarian.
                </p>
            </div>
        </div>
        <div class="row justify-content-between mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                <div class="img-about dots">
                    <img src="{{url('theme_property')}}/images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-home2"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Property</h3>
                        <p class="text-black-50">
                            Menyediakan beberapa properti yang sesuai dengan kebutuhanmu
                        </p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-person"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Top Agents</h3>
                        <p class="text-black-50">
                            Agent yang paling berpengalaman di bidangnya
                        </p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-security"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Top Mitra</h3>
                        <p class="text-black-50">
                            Mitra yang bekerja sama dengan pihak yang paling berpengalaman
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section-counter mt-5">

            <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">{{$mitra->count()}}</span></span>
                    <span class="caption text-black-50">#Mitra</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">{{$jumlah['Agent']}}</span></span>
                    <span class="caption text-black-50">#Agen</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">{{$jumlah['Properti']}}</span></span>
                    <span class="caption text-black-50">#Properti</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-testimonials">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                    Agent
                </h2>
            </div>
            <div class="col-md-6 text-md-end">
                <div id="testimonial-nav" aria-label="Carousel Navigation" tabindex="0">
                    <span class="prev" data-controls="prev" aria-controls="tns3" tabindex="-1">Prev</span>

                    <span class="next" data-controls="next" aria-controls="tns3" tabindex="-1">Next</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
            <div class="tns-outer" id="tns3-ow">
                <div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0"
                        aria-controls="tns3" style="" aria-label="Carousel Page 1" class=""
                        tabindex="-1"></button><button type="button" data-nav="1" aria-controls="tns3" style=""
                        aria-label="Carousel Page 2 (Current Slide)" class="tns-nav-active"></button><button
                        type="button" data-nav="2" tabindex="-1" aria-controls="tns3" style="display:none"
                        aria-label="Carousel Page 3"></button><button type="button" data-nav="3" tabindex="-1"
                        aria-controls="tns3" style="display:none" aria-label="Carousel Page 4"></button></div>
                <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                        class="current">10 to 12</span> of 4</div>
                <div id="tns3-mw" class="tns-ovh">
                    <div class="tns-inner" id="tns3-iw">
                        <div class="testimonial-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                            id="tns3" style="transform: translate3d(-56.25%, 0px, 0px); transition-duration: 0s;">

                            @foreach ($agent as $item)
                            <div class="item tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                <div class="testimonial">
                                    <img src="{{url('images/mitra/'.$item->foto)}}" alt="Image"
                                        class="img-fluid rounded-circle w-25 mb-4">
                                    <div class="rate">

                                    </div>
                                    <h3 class="h5 text-primary mb-0">{{$item->nama_agent}}</h3>
                                    <blockquote class="mb-0">
                                        <p class="text-black-50 mb-0">
                                            {{$item->email}}
                                        </p>
                                    </blockquote>
                                    <p class="text-black-50 mt-0">{{$item->nohp}}</p>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6 mb-5">
                <h2 class="font-weight-bold heading text-primary mb-4">
                    Mitra
                </h2>
                <p class="text-black-50">
                    Mitra yang sedang bekerja sama dengan kami
                </p>
            </div>
        </div>
        <div class="row">

            @foreach ($mitra as $item)
            <div class="col-md-3">
                <img src="{{url('images/mitra')}}/{{$item->foto}}" class="w-100">
            </div>
            @endforeach




        </div>
    </div>
</div>
@endsection