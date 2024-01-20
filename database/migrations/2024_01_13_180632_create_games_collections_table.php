<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('console_id');
            $table->integer('copies');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('fsk_id');
            $table->string('year');
            $table->string('cover')->nullable();
            $table->timestamps();

            $table->foreign('console_id')->references('id')->on('consoles')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('fsk_id')->references('id')->on('fsks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_collections');
    }
}
