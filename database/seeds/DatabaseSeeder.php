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

        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);

        // stops bulk entries from happening (this must be closed after being opened)
        Model::reguard();
    }
}
