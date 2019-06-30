<?php

use App\User;
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
        User::create([
            'nombre' => 'Carlos',
            'apellidos' => 'Longoria',
            'id_rol' => 1,
            'tipo_documento' => 'credencial ine',
            'num_documento' => 'AAAA',
            'direccion'=>'X',
            'telefono'=>'000000000',
            'email'=>'admin@upv.edu.mx',
            'password' => bcrypt('admin')
        ]);

    }
}
