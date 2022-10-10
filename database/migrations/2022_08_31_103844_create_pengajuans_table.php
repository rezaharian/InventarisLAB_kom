<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('nopengajuan');
            $table->string('nama');
            $table->string('penempatan');
            $table->string('jenis');
            $table->string('jumlah');
            $table->string('merek')->nullable();
            $table->string('tipe')->nullable();
            $table->string('harga');
            $table->string('hargatotal');
            $table->string('pengaju')->nullable();
            $table->string('kondisi')->default(0);
            $table->string('keperluan')->default(0);
            $table->string('link')->nullable();
            $table->string('status')->default(0);
            $table->string('keterangan')->nullable();
            $table->string('tanggal')->nullable();
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
        Schema::dropIfExists('pengajuans');
    }
}
