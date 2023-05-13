<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function features()
    {
        return view('footer_pages.about') ;
    }
    public function pricing()
    {
        return view('footer_pages.pricing') ;
    }
    public function faqs()
    {
        return view('footer_pages.faqs') ;
    }
    public function about()
    {
        return view('footer_pages.about') ;
    }
    public function howToApply()
    {
        return view('footer_pages.merchant-apply') ;
    }
}
