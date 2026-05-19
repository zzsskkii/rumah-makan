<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\categories;

class categoriesSeeder extends Seeder
{
    public function run(): void
    {
        categories::create(['name' => 'Makanan']);
        categories::create(['name' => 'Minuman']);
    }
}