<?php

use App\Models\Galeri;
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
        Schema::create(Galeri::tableName, function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('foto_id_gdrive')->nullable();
            $table->string('id_gdrive')->nullable();
            $table->text('slug');
            $table->date('tanggal')->nullable()->default(null);
            $table->string('lokasi')->nullable()->default(null);
            $table->text('keterangan')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists(Galeri::tableName);
    }
};
