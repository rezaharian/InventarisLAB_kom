<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->default('admin@admin.com');;
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['admin', 'petugas','tu','kepsek'])->default('admin');
            $table->string('password')->default(Hash::make('11111111'));;
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            ['name' => 'admin'],

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
