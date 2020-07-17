<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user=App\User::create([
			'name' => 'felipe',
	        'email' =>'felipe@gmail.com',
	        'password' =>bcrypt('1234')
		]);

        $user=App\User::create([
            'name' => 'jaime',
            'email' =>'jaime@gmail.com',
            'password' =>bcrypt('1234')
        ]);

        $user=App\User::create([
            'name' => 'rodolfo',
            'email' =>'rodolfo@gmail.com',
            'password' =>bcrypt('1234')
        ]);

    }
}
