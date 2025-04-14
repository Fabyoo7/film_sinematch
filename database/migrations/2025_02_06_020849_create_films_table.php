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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_genre');
            $table->string('aktor');
            $table->longtext('sipnosis');
            $table->date('tahun_rilis');
            $table->string('waktu');
            $table->string('poster');
            $table->string('trailer');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('id_genre')->references('id')->on('genres')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
};
