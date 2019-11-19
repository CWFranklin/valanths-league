<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFreeAgentInfoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('free_agent')->default(false);
            $table->string('peak_rank')->nullable();
            $table->integer('preferred_position_1')->nullable();
            $table->integer('preferred_position_2')->nullable();
            $table->integer('preferred_position_3')->nullable();
            $table->integer('preferred_position_4')->nullable();
            $table->integer('preferred_position_5')->nullable();
            $table->text('description')->nullable();
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
            $table->dropColumn('free_agent');
            $table->dropColumn('peak_rank');
            $table->dropColumn('preferred_position_1');
            $table->dropColumn('preferred_position_2');
            $table->dropColumn('preferred_position_3');
            $table->dropColumn('preferred_position_4');
            $table->dropColumn('preferred_position_5');
            $table->dropColumn('description');
        });
    }
}
