<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Matheus',
            'email' => 'matheus.stag@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // secret
            'remember_token' => str_random(10),
            'cpf' => '05175004182',
            'category' => 1,
        ]);
    }
}
