<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(array(
            'name' => 'Nombre1 Nombre2 Apellido1 Apellido2',
            'email' => 'prueba@social-project.com',
            'password' => bcrypt('12345678'),
            'twitter' => 'https://twitter.com/usuario1',
            'github' => 'https://github.com/usuario1',
            'socialmedia' => json_encode([
                'twitter' => 'https://twitter.com/usuario1',
                'github' => 'https://github.com/usuario1'
            ])
        ))->create();
    }
}