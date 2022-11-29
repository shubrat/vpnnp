<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivacyAndPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privacy_and_policies')->insert([
            'description' => 'ish. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for\
             will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
              (injected humour and the like)',
        ]);
    }
}
