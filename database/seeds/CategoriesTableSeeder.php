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
        $names = [
            'Cafe', 'Restaurant', 'Park', 'Hotel', 'Beach', 'Hiking', 'Shop', 'Other'
            ];
    }
}
