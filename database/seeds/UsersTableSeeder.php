<?php

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
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'rg'=>'000.000.00-00',
            'cpf'=>'000.000.000-00',
            'telefone'=>'(00) - 0000-0000',
            'celular'=>'(00) - 9999-9999',
            'dt_nascimento'=>'2019-05-20',
            'sexo'=>'Masc',
            'pai'=>'Pedro Jorge',
            'mae'=>'Maria Francisca',
            'id_perfil_users'=>'1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
