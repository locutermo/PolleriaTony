<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Worker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    
        User::create([
            'username' => "locutermo",
            'password' => bcrypt('admin'),
        ]);

        Worker::create([
            'user_id' => 1,
            'name' => 'Jose Francisco',
            'lastname'=> 'Mateo Carrasco',
            'dni'=> '77041708',
            'birthday'=> null,
            'phone'=>'952283982',
            'email'=> 'locutermo@gmail.com',
            'type'=> 1,
            'photo'=>NULL,
        ]);

        User::create([
            'username' => "antoni",
            'password' => bcrypt('admin'),
        ]);

        Worker::create([
            'user_id' => 2,
            'name' => 'Antoni',
            'lastname'=> 'Bancayan',
            'dni'=> '9876542',
            'birthday'=> null,
            'phone'=>'999998',
            'email'=> 'antonix@gmail.com',
            'type'=> 2,
            'photo'=>NULL,
        ]);

     

    }
}
