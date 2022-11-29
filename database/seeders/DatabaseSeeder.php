<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\PrivacyAndPolicy;
use App\Models\TermsAndCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        \App\Models\User::factory()->create();

        $this->call([
            // pages seeder
            AboutUsSeeder::class,
            PrivacyAndPolicySeeder::class,
            TermAndConditionSeeder::class,


            // setting seeder
            LocationMapSeeder::class,
            SocialMediaSeeder::class,
            ContactDetailSeeder::class


        ]);
    }
}
