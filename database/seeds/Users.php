<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'yogi1',
            'email'=>'yogi@gmail.com',
            'password'=>Hash::make('87654321'),
            'group'=>'admin'


        ]);
    }
}
