<?php

use Illuminate\Database\Seeder;

class PerfilUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('perfil_users')->insert([
            'tipo'=>'Administrator',
             'created_at' => now(),
            'updated_at' => now()
       ] );
       DB::table('perfil_users')->insert([
            'tipo'=>'Estagiário',
             'created_at' => now(),
            'updated_at' => now()
       ] );
       DB::table('perfil_users')->insert([
            'tipo'=>'Funcionário',
             'created_at' => now(),
            'updated_at' => now()
       ] );
      }
}
