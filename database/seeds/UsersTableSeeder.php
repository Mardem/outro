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
            'name' => 'Marden',
            'email' => 'mardenmc22@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('marden'), // secret
            'remember_token' => str_random(10),
            'cpf' => '05175004182',
            'category' => 1,
        ]);
    }
}
