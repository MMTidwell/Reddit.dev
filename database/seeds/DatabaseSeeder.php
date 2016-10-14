<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // allows for bulk entries to be added
        Model::unguard();

        // $this->command->info('Deleting votes records');
        // DB::table('votes')->delete();
        $this->command->info('Deleting posts records');
        DB::table('posts')->delete();
        $this->command->info('Deleting users records');
        DB::table('users')->delete();

        // each seeder class
        // cal() looks for the class in the seeds directory and executes the run() method in that class
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        // $this->call(VoteSeeder::class);

        // stops bulk entries from happening (this must be closed after being opened)
        Model::reguard();
    }
}



// php artisan db:seed 
    // ---> runs all the seeders listed in DatabaseSeeder
// php artisan db:seed --class=UserSeeder 
    // ---> runs just the seed that is called to run
// php artisan migrate:refresh --seed
    // ---> runs your seeders after your migrations





