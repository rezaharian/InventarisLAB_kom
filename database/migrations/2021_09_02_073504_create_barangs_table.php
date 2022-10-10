<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->default(11)->nullable();
            $table->string('nama')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('image')->nullable();
            $table->integer('jumlah')->default(1)->nullable();
            $table->string('kondisi')->default('0')->nullable();;
            $table->string('jenis')->nullable();
            $table->string('ruang')->nullable();
            $table->string('status')->default(1)->nullable();
            $table->string('sumber')->default('ok')->nullable();
            $table->string('penerima')->default('admin')->nullable();
            $table->string('keterangan')->default('OK')->nullable();
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
        Schema::dropIfExists('barangs');
    }
}
