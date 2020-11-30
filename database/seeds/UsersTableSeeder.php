<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'mari@marquesweb.ca')->first();

        if(!$user) {
            User::create([
                'name' => 'Mari Marques',
                'email' => 'mari@marquesweb.ca',
                'password' => Hash::make('password') 
            ]);
        }
    }
}
