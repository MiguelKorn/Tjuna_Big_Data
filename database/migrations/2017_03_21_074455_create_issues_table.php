<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('issues', function (Blueprint $table) {
=======
        Schema::create('issuess', function (Blueprint $table) {
>>>>>>> 9302c11018ac706c4b0f2da0401903f4c4d71da8
            $table->increments('id');
            $table->string('issue_type');
            $table->string('issue_key');
            $table->string('users_username');

            $table->string('status');
            $table->string('resolution');

            $table->timestamps();

            $table->integer('custom_field');

            $table->foreign('users_username')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
