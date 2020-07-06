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

    }
}
