<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ruangan extends Controller
{
    public function index()
    {
        return view('ruangan.ruangan');
    }

    public function create()
    {
        return view ('ruangan.create');
    }
}
