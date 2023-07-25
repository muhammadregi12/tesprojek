<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_club');
            $table->string('kota_club');
            $table->bigInteger('main')->nullable();
            $table->bigInteger('menang')->nullable();
            $table->bigInteger('seri')->nullable();
            $table->bigInteger('kalah')->nullable();
            $table->bigInteger('goal_menang')->nullable();
            $table->bigInteger('goal_kalah')->nullable();
            $table->bigInteger('point')->nullable();
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
        Schema::dropIfExists('clubs');
    }
}
