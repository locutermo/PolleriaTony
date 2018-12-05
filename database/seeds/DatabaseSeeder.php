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
         $this->call(UsersTableSeeder::class);
        //  factory(App\Table::class,25)->create();
        //  factory(App\Product::class,100)->create();

    }
}
