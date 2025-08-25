<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aset extends Controller
{
    public function index()
    {
        return view('aset.aset');
    }

    public function create()
    {
        return view ('aset.create');
    }
}
