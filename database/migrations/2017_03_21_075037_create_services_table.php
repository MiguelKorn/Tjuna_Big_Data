<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('users_username');

            $table->decimal('worked', 6, 2);
            $table->decimal('billed', 6, 2);
            $table->decimal('planned', 6, 2);
            $table->decimal('required', 6, 2);
            $table->decimal('progress', 6, 2);

            $table->timestamp('date');

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
        Schema::dropIfExists('services');
    }
}
