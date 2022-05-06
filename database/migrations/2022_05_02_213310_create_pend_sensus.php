<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pend_sensus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->year('angkatan');
            $table->string('email')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('telepon')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->boolean('status')->default(0)->comment("0=>diterima, 1=>diproses, 2=>selsai, 3=>ditolak");
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
        Schema::dropIfExists('pend_sensus');
    }
};
