<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
     public function index()
    {
        return view('pages.astrology.pages.astrology-webinar');
    }

    public function graphologyWebinar()
    {
        return view('pages.graphology.pages.graphology-webinar');
    }

    public function graphologyWebinarlvl1()
    {
        return view('pages.graphology.pages.graphology-webinar1');
    }

    public function astrologyWebinar()
    {
        return view('pages.astrology.pages.astrology-webinar1');
    }

    public function astrologyCheckout()
    {
        return view('pages.astrology.checkout');
    }

    public function astrologyThankyou()
    {
        return view('pages.astrology.thankyou');
    }

    public function graphologyCheckout()
    {
        return view('pages.graphology.checkout');
    }

    public function graphologyThankyou()
    {
        return view('pages.graphology.thankyou');
    }
}
