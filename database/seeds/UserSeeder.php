<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::select('*')->delete();
        \App\User::create([
            'name'=>'ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
    }
}
