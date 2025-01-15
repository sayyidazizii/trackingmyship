<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('level', ['user', 'admin', 'kurir'])->default('user');
            $table->text('alamat')->nullable();
            $table->text('foto')->nullable();
            $table->bigInteger('dompet_id')->nullable();
            $table->rememberToken(); // Menambahkan kolom remember_token
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
