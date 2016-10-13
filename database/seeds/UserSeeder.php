<?php

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
    	// telling the function where the class is, and create 1000 fake users
        factory(App\User::class, 1000)->create();
    }
}
