<?php

use App\Models\Utility\HariBesarNasional;
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
        Schema::create(HariBesarNasional::tableName, function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->nullable()->default(null)->comment('1 tetap, 0 tidak tetap');
            $table->smallInteger('hari')->nullable()->default(null);
            $table->smallInteger('bulan')->nullable()->default(null);
            $table->year('tahun')->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
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
        Schema::dropIfExists(HariBesarNasional::tableName);
    }
};
