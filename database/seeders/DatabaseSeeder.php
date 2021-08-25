<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = new \App\Models\Administrador();
        $admin->usuario = 'prueba';
        $admin->nombre = 'Auria';
        $admin->telefono = '9191180100';
        $admin->email = 'alegriabautistaauriacristina@gmail.com';
        $admin->pass = Hash::make('12345');
        $admin->save();
    }
}
