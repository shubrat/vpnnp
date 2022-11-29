<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('location_maps')->insert([
                'frame' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28261.810363619617!2d85.31937898701361!3d27.694853148997172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1939979222b1%3A0xa7abff0db51aabfd!2sTech%20Community%20Nepal!5e0!3m2!1sen!2snp!4v1649055462858!5m2!1sen!2snp' 
                
            ]);
        }
    }
}
