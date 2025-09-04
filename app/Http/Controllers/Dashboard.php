<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function chart(){
       return response()->json([
        'boxes' => [
            'admin' => 3,
            'ruangan' => 5,
            'asetIndexed' => 31,

        ],

        'chartBar' => [
            'labels' => ['Furnitur', 'Elektronik', 'Dekorasi'],
            'labelData' => [10, 15, 6],
        ],

        'chartPie' => [
            'labels' => ['Baik', 'Rusak Ringan', 'Rusak Berat'],
            'labelData' => [ 28, 2, 1],
        ],

    ]);
  }
    
}




