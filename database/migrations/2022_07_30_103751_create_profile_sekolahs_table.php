<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProfileSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('image')->default('gambar smk anda');
            $table->string('alamat')->default('alamat smk anda');
            $table->string('telpon')->default('telepon smk anda');
            $table->string('website')->default('website smk anda');
            $table->string('kepsek')->default('kepala sekolah smk anda');
            $table->string('profile')->default('profile smk anda');
            $table->timestamps();
        });

        DB::table('profile_sekolahs')->insert(
            ['nama' => 'nama sekolah anda'],

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_sekolahs');
    }
}
