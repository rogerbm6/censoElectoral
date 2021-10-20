<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Empresa::factory()->count(50)->create();
    }
}
