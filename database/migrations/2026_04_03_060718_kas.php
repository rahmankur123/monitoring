<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
    $table->id();

    $table->date('tanggal');
    $table->string('keterangan');

    $table->enum('tipe', ['masuk','keluar']);
    $table->bigInteger('jumlah');

    $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();

    $table->foreignId('kegiatan_id')->nullable()->constrained('kegiatan')->nullOnDelete();

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
