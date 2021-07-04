<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(StatesSeeder::class);

/*
シーダーファイルの数が増えてくるとデータベースを初期化するたびにファイルの数だけコマンドを実行しなければならないため、
上記の記載で複数のシーダーファイルをまとめて実行できる。

*/

    }
}
