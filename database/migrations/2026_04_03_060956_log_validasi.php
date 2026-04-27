<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogValidasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_validasi', function (Blueprint $table) {
    $table->id();

    $table->foreignId('kegiatan_id')->constrained('kegiatan')->cascadeOnDelete();

    $table->enum('status', ['disetujui','ditolak']);
    $table->text('catatan')->nullable();

    $table->foreignId('oleh')->constrained('users')->cascadeOnDelete();

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
