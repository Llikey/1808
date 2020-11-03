<?php

use Illuminate\Database\Seeder;

class Admin_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user' => 'aa', 'pwd' => Hash::make('123'), 'typeid' => '3']
        ];
        \DB::table('xm_admin_user')->insert($data);


    }
}
