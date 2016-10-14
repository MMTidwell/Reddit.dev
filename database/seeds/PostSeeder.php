<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // run() is where we will define the steps to see a particular db
    public function run()
    {
        factory(App\Models\Post::class, 1000)->create();

        // this is hardcoded info for the seeder to run
     	// $user1 = new App\User();
	    // $user1->email = 'user1@codeup.com';
	    // $user1->name = 'Luis';
	    // $user1->password = Hash::make('password123');
	    // $user1->save();
    }
}


