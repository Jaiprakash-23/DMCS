<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $countries = [
            ['country_name' => 'United States', 'locale' => 'en'],
            ['country_name' => 'France', 'locale' => 'fr'],
            ['country_name' => 'Germany', 'locale' => 'de'],
            ['country_name' => 'Spain', 'locale' => 'es'],
            ['country_name' => 'China', 'locale' => 'zh'],
            ['country_name' => 'India', 'locale' => 'hi'],
        ];

        Country::insert($countries);
    }
    

}
