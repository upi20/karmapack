<?php

use App\Models\Setting\HomeSlider;
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
        Schema::create(HomeSlider::tableName, function (Blueprint $table) {
            $table->id();
            $table->integer('urutan')->nullable()->default(0);
            $table->string('nama')->nullable()->default(null);
            $table->string('foto')->nullable()->default(null);
            $table->text('judul')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->text('tombol_judul')->nullable()->default(null);
            $table->text('tombol_link')->nullable()->default(null);
            $table->text('tombol_video_judul')->nullable()->default(null);
            $table->text('tombol_video_link')->nullable()->default(null);
            $table->string('tampilkan')->nullable()->default(null);
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
        Schema::dropIfExists(HomeSlider::tableName);
    }
};
