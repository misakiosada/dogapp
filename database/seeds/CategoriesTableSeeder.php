<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Category::insert([
                ['id' => '1',
                'name' => 'Cafe',
                ],
                ['id' => '2',
                'name' => 'Restaurant',
                ],
                ['id' => '3',
                'name' => 'Park',
                ],
                ['id' => '4',
                'name' => 'Hotel',
                ],
                ['id' => '5',
                'name' => 'Beach',
                ],
                ['id' => '6',
                'name' => 'Hiking',
                ],
                ['id' => '7',
                'name' => 'Shop'
                ],
                ['id' => '8',
                'name' => 'Other',
                ],

            ]);
    }
}
