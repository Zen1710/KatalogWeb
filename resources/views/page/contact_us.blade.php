@extends('theme.user.master')
@section('content')

<div class="hero page-inner overlay" style="background-image: url({{url('theme_property/images/hero_bg_1.jpg')}})">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Contact Us</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Contact
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">

        <div class="contact-info d-flex justify-content-between">
            <div class="address mt-4">
                <i class="icon-room"></i>
                <h4 class="mb-2">Location:</h4>
                <p>
                    Surabaya,<br />
                    Indonesia
                </p>
            </div>

            <div class="open-hours mt-4">
                <i class="icon-clock-o"></i>
                <h4 class="mb-2">Open Hours:</h4>
                <p>
                    Sunday-Friday:<br />
                    08:00 AM - 23:00 PM
                </p>
            </div>

            <div class="email mt-4">
                <i class="icon-envelope"></i>
                <h4 class="mb-2">Email:</h4>
                <p>info@ekatalog.com</p>
            </div>

            <div class="phone mt-4">
                <i class="icon-phone"></i>
                <h4 class="mb-2">Call:</h4>
                <p>+62 113 1225 12</p>
            </div>
        </div>

    </div>
</div>

@endsection