<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema makes the table in the DB
        // create makes the table called 'useres'
        // Blueprint is the plan of the table
        Schema::create('users', function (Blueprint $table) {
            // this is the primay key
            // always needs to be here
            $table->increments('id');
            // string is the same as VARCHAR
            $table->string('name');
            // unique makes sure that the eamils are all different
            // this one will cause an errror
            $table->string('email')->unique();
            // the number at the end is the max number of characters
            $table->string('password', 60);
            // DO NOT REMOVE THE rememberToken!!!!
            $table->rememberToken();
            // dont always need them but they do come in handy
            // this will create 2 colloumns 
                // first made
                // last time it was updated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
