<?php

use Illuminate\Database\Seeder;
use App\Asset;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asset::create([
            'name'=>'Euro Futures',
            'symbol'=>'EUR',
            'type'=>'futures',
            'multiplier'=>'1250',
        ]);
        Asset::create([
            'name'=>'Crude Oil Futures',
            'symbol'=>'CL',
            'type'=>'futures',
            'multiplier'=>'1000'
        ]);
        Asset::create([
            'name'=>'Emini S&P 500 Futures',
            'symbol'=>'ES',
            'type'=>'futures',
            'multiplier'=>'50'
        ]);

        Asset::create([
            'name'=>'Gold Futures',
            'symbol'=>'GC',
            'type'=>'futures',
            'multiplier'=>'100'
        ]);
        Asset::create([
            'name'=>'Natural Gas Futures',
            'symbol'=>'NG',
            'type'=>'futures',
            'multiplier'=>'10000'
        ]);
        Asset::create([
            'name'=>'30 Year Bonds Futures',
            'symbol'=>'ZB',
            'type'=>'futures',
            'multiplier'=>'1000'
        ]);
        Asset::create([
            'name'=>'Corn Futures',
            'symbol'=>'ZC',
            'type'=>'futures',
            'multiplier'=>'50',
            'price_correction'=>'100'
        ]);
        Asset::create([
            'name'=>'Soybean Futures',
            'symbol'=>'ZS',
            'type'=>'futures',
            'multiplier'=>'50',
            'price_correction'=>'100'
        ]);
        Asset::create([
            'name'=>'Wheat Futures',
            'symbol'=>'ZW',
            'type'=>'futures',
            'multiplier'=>'50',
            'price_correction'=>'100'
        ]);
    }
}
