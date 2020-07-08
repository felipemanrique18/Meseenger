<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $converstion=App\Message::create([
			'from_id' => 1,
	        'to_id' =>2,
	        'content' =>'Hola como estas?',
		]);
		$converstion=App\Message::create([
			'from_id' => 2,
	        'to_id' =>1,
	        'content' =>'Bien y usted payaso',
		]);
    }
}
