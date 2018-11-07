<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    
        User::create([
            'id'=>1,
            'name' => 'Jose Francisco',
            'lastname'=> 'Mateo Carrasco',
            'dni'=> '77041708',
            'dateOfBirth'=> null,
            'cellphone'=>'952283982',
            'email'=> 'locutermo@gmail.com',
            'office'=> 1,

            'code' => 'jose.mc@admin.com',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'id'=>2,
            'name' => 'Juan Alexis',
            'lastname'=> 'Luque Ayala',
            'dni'=> '98712312',
            'dateOfBirth'=> null,
            'cellphone'=>'09182312',
            'email'=> 'luque@gmail.com',
            'office'=> 3,

            'code' => 'alexis.la@admin.com',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'id'=>3,
            'name' => 'Antoni',
            'lastname'=> 'Bancayan',
            'dni'=> '77999282',
            'dateOfBirth'=> null,
            'cellphone'=>'099234987',
            'email'=> 'antoni@gmail.com',
            'office'=> 2,

            'code' => 'antoni.b@admin.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'id'=>4,
            'name' => 'Anonimo',
            'lastname'=> 'Sin Apellido',
            'dni'=> '11111092',
            'dateOfBirth'=> null,
            'cellphone'=>'987654321',
            'email'=> 'anonimo@gmail.com',
            'office'=> 1,
            'photo'=> null,

            'code' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            
        ]);


    }
}
