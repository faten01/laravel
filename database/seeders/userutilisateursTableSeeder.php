<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userutilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('user_utilisateurs')->insert([
            'Nom' => 'John Doe',
            'Email' => 'john@doe.com',
            'MotDePasse' => Hash::make('MotDePasse')
        ]);
    }
}
