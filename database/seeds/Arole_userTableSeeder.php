<?php

use Illuminate\Database\Seeder;

class Arole_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data=[
		['role_id'=>'1','user_id'=>'1'],	
		['role_id'=>'2','user_id'=>'3'],	
		['role_id'=>'3','user_id'=>'3'],	
		['role_id'=>'4','user_id'=>'1'],	
		['role_id'=>'2','user_id'=>'1'],	
		['role_id'=>'2','user_id'=>'2']
		];
        \DB::table('role_user')->insert($data);
    }
}
