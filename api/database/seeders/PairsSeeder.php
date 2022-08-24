<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pairs;

class PairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pairs::factory()->create([
            'from'=>'EUR',
            'to'=>'USD',
            'count'=>0,
            'rate'=>0.99,
        ]);
        Pairs::factory()->create([
            'from'=>'USD',
            'to'=>'EUR',
            'count'=>0,
            'rate'=>1.1,
        ]);
    }
}
