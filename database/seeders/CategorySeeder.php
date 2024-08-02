<?php

namespace Database\Seeders;


use App\Models\Catelogue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catelogue::factory(10)->create();
    }
}
