<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
   
    public function run(): void
    {
        User::create ([
            'name' => 'Kelinci Laut Indigo',
            'email' => 'admin2@admin.gov',
            'password' => bcrypt('admin2')
        ]);
    }
}
