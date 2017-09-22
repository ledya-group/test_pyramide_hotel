<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('histories', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('user_id');
        //     $table->string('user_type', 50);
        //     $table->string('user_action', 50);
        //     $table->unsignedInterger('user_action_id');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('histories');
    }
}
