<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->references('id')->on('wisata')->onDelete('cascade')->onUpdate('cascade');
            $table->string('url');
            $table->string('session_id');
            $table->string('ip');
            $table->string('agent');
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
        Schema::dropIfExists('wisata_views');
    }
}
