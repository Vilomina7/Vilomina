<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalamanStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaman_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('negara')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->text('alamat_lengkap')->nullable();
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
        Schema::dropIfExists('halaman_stores');
    }
}
