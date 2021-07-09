<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            State::insert([
                [ 'name' => 'NSW'],
                [ 'name' => 'VIC'],
                [ 'name' => 'QLD'],
                [ 'name' => 'WA' ],
                [ 'name' => 'SA' ],
                [ 'name' => 'TAS' ],
                [ 'name' => 'ACT' ],
                [ 'name' => 'NT' ],
                [ 'name' => 'Other' ],
            ]);
    }
}

