<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Requests;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Requests::factory()->count(50)->create();
    }
}
