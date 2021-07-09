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
                [ 'name' => 'Cafe'],
                [ 'name' => 'Restaurant'],
                [ 'name' => 'Park'],
                [ 'name' => 'Hotel' ],
                [ 'name' => 'Beach' ],
                [ 'name' => 'Hiking' ],
                [ 'name' => 'Shop' ],
                [ 'name' => 'Other' ],
            ]);
    }
}
