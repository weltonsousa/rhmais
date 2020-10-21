<?php

namespace Tests;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> 2215e0e2d723ef7c81cf215bf832dbb425588a3c
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

<<<<<<< HEAD
=======
        Hash::setRounds(4);

>>>>>>> 2215e0e2d723ef7c81cf215bf832dbb425588a3c
        return $app;
    }
}
