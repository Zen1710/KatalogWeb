<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('page.landing_page');
    }

    public function property()
    {
        return view('page.property');
    }

    public function about()
    {
        return view('page.about');
    }
    public function contact_us()
    {
        return view('page.contact_us');
    }
    public function faq()
    {
        return view('page.faq');
    }
}
