<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pengaturan extends Controller
{
    public function index()
    {
        return view('pengaturan.pengaturan');
    }
}
