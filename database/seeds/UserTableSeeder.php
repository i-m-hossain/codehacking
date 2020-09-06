<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
           'name' => Str::random(10),
            'email'=> Str::random(10).'@codehacking.com',
            'is_active'=>1 ,
            'role_id'=>1,
            'password'=>bcrypt('secret')


        ]);



    }
}
