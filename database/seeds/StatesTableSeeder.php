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
                ['id' => '1',
                'name' => 'NSW',
                ],
                ['id' => '2',
                'name' => 'VIC',
                ],
                ['id' => '3',
                'name' => 'QLD',
                ],
                ['id' => '4',
                'name' => 'WA',
                ],
                ['id' => '5',
                'name' => 'SA',
                ],
                ['id' => '6',
                'name' => 'TAS',
                ],
                ['id' => '7',
                'name' => 'ACT',
                ],
                ['id' => '8',
                'name' => 'NT',
                ],
                ['id' => '9',
                'name' => 'Other',
                ],
            ]);
    }
}

