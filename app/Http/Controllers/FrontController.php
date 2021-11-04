<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['title'] = 'home';
        return view('frontend.home', $data);
    }

    public function about_us()
    {
        $data = array();
        $data['title'] = 'about-us';
        return view('frontend.about_us', $data);
    }

    public function offering()
    {
        $data = array();
        $data['title'] = 'offering';
        return view('frontend.offering', $data);
    }

    public function marketplace()
    {
        $data = array();
        $data['title'] = 'marketplace';
        return view('frontend.marketplace', $data);
    }

    public function faq()
    {
        $data = array();
        $data['title'] = 'faq';
        return view('frontend.faq', $data);
    }

    public function career()
    {
        $data = array();
        $data['title'] = 'career';
        return view('frontend.career', $data);
    }

    public function contact()
    {
        $data = array();
        $data['title'] = 'contact';
        return view('frontend.contact', $data);
    }

    public function register()
    {
        $data = array();
        $data['title'] = 'register';
        return view('auth.register', $data);
    }

    public function registerStep2()
    {
        $data = array();
        $data['title'] = 'register';
        return view('auth.register-step-2', $data);
    }

    public function registerStep3()
    {
        $data = array();
        $data['title'] = 'register';
        return view('auth.register-step-3', $data);
    }
}
