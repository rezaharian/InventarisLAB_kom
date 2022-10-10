<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangRusaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_rusaks', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah')->nullable();
            $table->foreignId('barang_id')->nullable();
            $table->string('keterangan');
            $table->date('tanggal')->date_format('dd/mm/yyy');
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
        Schema::dropIfExists('barang-rusaks');
    }
}
