<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status',20);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('createdby')->nullable()->unsigned()->default(null);
            $table->datetime('createdtime')->nullable()->default(null);
            $table->integer('changedby')->nullable()->unsigned()->default(null);
            $table->datetime('changedtime')->nullable()->default(null);
            $table->integer('deletedby')->nullable()->unsigned()->default(null);
            $table->datetime('deletedtime')->nullable()->default(null);
            $table->nullableTimestamps();
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
