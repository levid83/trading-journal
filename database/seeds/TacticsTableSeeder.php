<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\My\Models\Tactic;

class TacticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Tactic::insert([['name'=>'Back Spread w/Calls'],
					  ['name'=>'Back Spread w/Puts'],
					  ['name'=>'Cash-Secured Put'],
					  ['name'=>'Christmas Tree Butterfly w/Calls'],
					  ['name'=>'Christmas Tree Butterfly w/Puts'],
					  ['name'=>'Collar'],
					  ['name'=>'Covered Call'],
					  ['name'=>'Diagonal Spread w/Calls'],
					  ['name'=>'Diagonal Spread w/Puts'],
					  ['name'=>'Double Diagonal'],
					  ['name'=>'Fig Leaf'],
					  ['name'=>'Front Spread w/Calls'],
					  ['name'=>'Front Spread w/Puts'],
					  ['name'=>'Inverse Skip Strike Butterfly w/Calls'],
					  ['name'=>'Inverse Skip Strike Butterfly w/Puts'],
					  ['name'=>'Iron Butterfly'],
					  ['name'=>'Iron Condor'],
					  ['name'=>'Long Butterfly Spread w/Calls'],
					  ['name'=>'Long Butterfly Spread w/Puts'],
					  ['name'=>'Long Calendar Spread w/Calls'],
					  ['name'=>'Long Calendar Spread w/Puts'],
					  ['name'=>'Long Call'],
					  ['name'=>'Long Call Spread'],
					  ['name'=>'Long Combination'],
					  ['name'=>'Long Condor Spread w/Calls'],
					  ['name'=>'Long Condor Spread w/Puts'],
					  ['name'=>'Long Put'],
					  ['name'=>'Long Put Spread'],
					  ['name'=>'Long Straddle'],
					  ['name'=>'Long Strangle'],
					  ['name'=>'Protective Put'],
					  ['name'=>'Short Call'],
					  ['name'=>'Short Call Spread'],
					  ['name'=>'Short Combination'],
					  ['name'=>'Short Put'],
					  ['name'=>'Short Put Spread'],
					  ['name'=>'Short Straddle'],
					  ['name'=>'Short Strangle'],
					  ['name'=>'Skip Strike Butterfly w/Calls'],
					  ['name'=>'Skip Strike Butterfly w/Puts'],
				   	  ['name'=>'Long Underlying'],
					  ['name'=>'Short Underlying'],
						   ]
			);
    }
}
