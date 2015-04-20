<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'username' => 'thgab',
        'email'    => 'thgab74@gmail.com',
        'password' => Hash::make('password'),
    ));
}

}

