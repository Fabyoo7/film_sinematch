<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_film');
            $table->unsignedBigInteger('id_user');
            $table->enum('rating', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'])->default('1');
            $table->text('komen');
            $table->timestamps();

            $table->foreign('id_film')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
