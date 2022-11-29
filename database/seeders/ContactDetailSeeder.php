<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactDetailSeeder extends Seeder
{
 
    public function run()
    {
        
        DB::table('company_details')->insert([
            'address' => ' Tinkune,KATHMANDU, NEPAL',
            'secondAddress' => ' Tinkune, KATHMANDU, NEPAL',
            'phone' => '01200293',
            'secondPhone' => '3456789',
            'email' => 'fairex.ktm@gmail.com',
            'secondEmail' => 'fairex.ktm@gmail.com;',
        ]);
    }
}
