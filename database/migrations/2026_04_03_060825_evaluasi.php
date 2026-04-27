<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Evaluasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi', function (Blueprint $table) {
    $table->id();

    $table->foreignId('kegiatan_id')->constrained('kegiatan')->cascadeOnDelete();
    $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

    $table->enum('role_pengisi', ['admin','takmir']);
    $table->text('isi');

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
