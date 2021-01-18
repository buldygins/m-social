<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrNew([
            'name' => 'admin',
            'email' => 'test@test',
            'password' => Hash::make('123456'),
        ]);
    }
}
