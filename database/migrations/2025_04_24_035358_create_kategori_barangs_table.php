<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kategori_barangs', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kategori');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('kategori_barangs');
}

};
