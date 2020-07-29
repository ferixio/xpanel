<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('hak_akses'); // 80 = super admin /  owner , 10 = user , 20 = admin
            $table->string('telp', 200)->nullable()->default('');
            $table->text('alamat')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->boolean('status_aktif')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
