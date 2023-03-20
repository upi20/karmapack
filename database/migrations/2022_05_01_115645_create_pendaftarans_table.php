<?php

use App\Models\Pendaftaran;
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
        Schema::create(Pendaftaran::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('pengumuman');
            $table->integer('no_urut');
            $table->date('dari')->nullable();
            $table->date('sampai')->nullable();
            $table->string('route');
            $table->string('foto');
            $table->boolean('status')->default(0)->comment("0 Tidak Aktif,1 Aktif,2 Ditutup");
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
        Schema::dropIfExists(Pendaftaran::tableName);
    }
};
