<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

use App\Models\Rate;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = [
            [ 'base_currency_id' => 1, 'target_currency_id' => 2, 'rate' => 0.85, 'effective_date' => null],
            [ 'base_currency_id' => 1, 'target_currency_id' => 3, 'rate' => 0.73, 'effective_date' => null],
            [ 'base_currency_id' => 1, 'target_currency_id' => 4, 'rate' => 110.25, 'effective_date' => null],
            [ 'base_currency_id' => 1, 'target_currency_id' => 5, 'rate' => 1.35, 'effective_date' => null],
            [ 'base_currency_id' => 1, 'target_currency_id' => 2, 'rate' => 0.81, 'effective_date' => '2023-07-01'],
            [ 'base_currency_id' => 1, 'target_currency_id' => 3, 'rate' => 0.68, 'effective_date' => '2023-07-01'],
            [ 'base_currency_id' => 1, 'target_currency_id' => 4, 'rate' => 109.31, 'effective_date' => '2023-07-01'],
            [ 'base_currency_id' => 1, 'target_currency_id' => 5, 'rate' => 1.25, 'effective_date' => '2023-07-01'],
        ];

        foreach ($rates as $rate) {
            \DB::table('rates')->insert([
                'base_currency_id' => $rate['base_currency_id'], 
                'target_currency_id' => $rate['target_currency_id'], 
                'rate' => $rate['rate'],
                'effective_date' => $rate['effective_date'] ?? Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}