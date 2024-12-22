<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [ 'id' => 1, 'code' => 'USD', 'name' => 'US Dollar' ],
            [ 'id' => 2, 'code' => 'EUR', 'name' => 'Euro' ],
            [ 'id' => 3, 'code' => 'GBP', 'name' => 'British Pound' ],
            [ 'id' => 4, 'code' => 'JPY', 'name' => 'Japanese Yen' ],
            [ 'id' => 5, 'code' => 'AUD', 'name' => 'Australian Dollar' ],
        ];

        foreach ($currencies as $currency) {
            \DB::table('currencies')->insert([
                'id' => $currency['id'], 
                'code' => $currency['code'], 
                'name' => $currency['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
