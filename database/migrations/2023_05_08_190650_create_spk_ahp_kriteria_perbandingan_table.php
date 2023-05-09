<?php

use App\Models\SPK\AHP\Kriteria\Kriteria;
use App\Models\SPK\AHP\Kriteria\Perbandingan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Perbandingan::tableName, function (Blueprint $table) {
            $table->id();
            $table->double('nilai')->nullable()->default(0);
            $table->bigInteger('kriteria_x_id', false, true)->nullable()->default(null);
            $table->bigInteger('kriteria_y_id', false, true)->nullable()->default(null);
            $table->timestamps();

            $table->unique(['kriteria_x_id', 'kriteria_y_id']);
            $table->foreign('kriteria_x_id')->references('id')->on(Kriteria::tableName)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kriteria_y_id')->references('id')->on(Kriteria::tableName)->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Perbandingan::tableName);
    }
};
