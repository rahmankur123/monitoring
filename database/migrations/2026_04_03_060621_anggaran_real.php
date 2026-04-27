<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnggaranReal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_anggaran', function (Blueprint $table) {
    $table->id();
    $table->foreignId('kegiatan_id')->constrained('kegiatan')->cascadeOnDelete();

    $table->string('nama_item');
    $table->integer('qty');
    $table->bigInteger('harga');
    $table->bigInteger('total');

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
        //
    }
}
