<?php

use Illuminate\Database\Seeder;

class AuserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
		['name'=>'aaa'],	
		['name'=>'bbb'],
		['name'=>'ccc']
		];
        \DB::table('user')->insert($data);
    }
}
