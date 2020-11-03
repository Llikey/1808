<?php

use Illuminate\Database\Seeder;

class AroleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data=[
		['name'=>'管理员'],	
		['name'=>'编辑'],
		['name'=>'普通用户'],
		['name'=>'特殊用户']
		];
        \DB::table('role')->insert($data);
    }
}
