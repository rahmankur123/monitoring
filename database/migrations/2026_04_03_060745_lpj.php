<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lpj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpj', function (Blueprint $table) {
    $table->id();

    $table->foreignId('kegiatan_id')->unique()->constrained('kegiatan')->cascadeOnDelete();

    $table->string('file');
    $table->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete();

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
