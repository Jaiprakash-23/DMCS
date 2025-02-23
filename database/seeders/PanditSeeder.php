<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pandit;
class PanditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Pandit::factory()->count(1)->create();
    }
}
