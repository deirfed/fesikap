<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function request_fitur()
    {
        return view('pages.admin.request-fitur');
    }

    public function info_web()
    {
        return view('pages.shared.informasi');
    }
}
