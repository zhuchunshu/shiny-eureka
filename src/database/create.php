<?php

namespace App\Plugins\FuckYou\src\database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class create extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fuckyou')) {
            Schema::create('fuckyou', function (Blueprint $table) {
                $table->increments('id');
                $table->string('group')->comment('群号')->nullable();
                $table->string('qq')->comment('qq号');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuckyou');
    }
}
