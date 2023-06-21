<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        //création de l'administrateur
        User::create([
            'pseudo' => 'administrateur',
            'password' => Hash::make('Azerty88@'),
            'email' => 'admin@niceplaces.fr',
            'email_verified_at' =>now(),
            'departement_id' => '80',
            'rememer_token' => Str::random(10),
            'role_id' => 2
        ]);

        //Création d'un utilsateur de test
        User::create([
            'pseudo' => 'utilisateur',
            'pasword' => Hash::make('Azerty88@'),
            'email' => 'utilisateur@test.fr',
            'email_verified_at' => now(),
            'departement_id' => '86',
            'rememer_token' => Str::random(10),
            'role_id' => 1
        ]);

        //création de 8 users aléatoires
        User::factory(8)->create();
    }
}
//good