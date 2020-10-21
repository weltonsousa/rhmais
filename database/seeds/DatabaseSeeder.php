<?php

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
<<<<<<< HEAD
         $this->call(UsersSeeder::class);
=======
        $this->call([UsersTableSeeder::class]);
>>>>>>> 2215e0e2d723ef7c81cf215bf832dbb425588a3c
    }
}
