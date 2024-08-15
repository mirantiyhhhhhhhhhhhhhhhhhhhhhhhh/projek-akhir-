<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dataguru', function (Blueprint $table) {
            $table->increments('id_dataguru');
            $table->string('nama_guru');
            $table->string('nip')->nullable;
            $table->string('status_pegawai');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('foto_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataguru');
    }
};
