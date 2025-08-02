<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function main_dashboard()
    {
        return view('pages.dashboard');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function admin2_page()
    {
        return view('pages.admin2');
    }

    public function admin3_page()
    {
        return view('pages.admin-lord');
    }

    public function admin4_page()
    {
        return view('pages.admin4');
    }

    public function admin_page()
    {
        return view('pages.admin');
    }

    public function form_page()
    {
        return view('pages.form');
    }

    public function detail()
    {
        return view('pages.detail');
    }
}
