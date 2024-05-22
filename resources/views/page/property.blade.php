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
                    <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                        data-aos-delay="200">
                        <input type="text" class="form-control px-4" placeholder="Cari rumah impianmu" />
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
                        <p><a href="#" class="learn-more">72</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Villa</h3>
                      
                        <p><a href="#" class="learn-more">13</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Apartement</h3>
                     
                        <p><a href="#" class="learn-more">91</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                        <span class="flaticon-house-1"></span>
                        <h3 class="mb-3">Hotel</h3>
                        <p><a href="#" class="learn-more">22</a></p>
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
                       Properties
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                  
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_1.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Perumahan Villa Bukit Mas</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_2.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Villa Bejhong</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_3.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Apartement Gajahmada</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_4.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Villa Indah</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_5.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Hotel Baru</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_6.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">El Royale</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_7.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Perumahan Adimas</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_8.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Perumahan Bejhong</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
<div class="col-md-4">
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{url('theme_property')}}/images/img_1.jpg" alt="Image"
                                        class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>Rp. 1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Yogyakarta, Jawa Tengah</span>
                                        <span class="city d-block mb-3">Perumahan Puri 2</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">2 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>

                                        <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                    </div>
                                </div>
                            </div>
</div>
                            <!-- .item -->
                        
                </div>
            </div>
        </div>
    </div>





@endsection