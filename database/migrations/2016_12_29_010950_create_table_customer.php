<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('cust_id');
            $table->string('uuid')->unique();
            $table->integer('createdby')->nullable()->unsigned()->default(null);
            $table->datetime('createdtime')->nullable()->default(null);
            $table->integer('changedby')->nullable()->unsigned()->default(null);
            $table->datetime('changedtime')->nullable()->default(null);
            $table->integer('deletedby')->nullable()->unsigned()->default(null);
            $table->datetime('deletedtime')->nullable()->default(null);
            $table->nullableTimestamps();
            $table->string('status')->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->text('alamat')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
