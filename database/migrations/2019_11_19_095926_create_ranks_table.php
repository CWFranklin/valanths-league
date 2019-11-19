<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('points')->nullable();
            $table->integer('order');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('peak_rank');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('peak_rank')->nullable();
            $table->foreign('peak_rank')->references('id')->on('ranks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['peak_rank']);
            $table->dropColumn('peak_rank');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('peak_rank')->nullable();
        });

        Schema::dropIfExists('ranks');
    }
}
