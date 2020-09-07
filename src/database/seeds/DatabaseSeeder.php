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
      echo "executing";
      $users = factory(App\User::class, 1)->create();
      $leafs = factory(App\Movie::class,3)->create();
    }
}
