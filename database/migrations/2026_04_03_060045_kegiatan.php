<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->text('deskripsi');
    $table->date('tanggal');

    $table->enum('status', [
        'draft',
        'menunggu_validasi',
        'ditolak',
        'disetujui',
        'dijadwalkan',
        'berlangsung',
        'selesai',
        'dibatalkan'
    ])->default('draft');

    $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();

    $table->text('catatan_takmir')->nullable();

    $table->foreignId('validated_by')->nullable()->constrained('users')->nullOnDelete();
    $table->timestamp('validated_at')->nullable();

    // revisi
    $table->integer('revisi_ke')->default(0);
    $table->timestamp('last_submitted_at')->nullable();

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
