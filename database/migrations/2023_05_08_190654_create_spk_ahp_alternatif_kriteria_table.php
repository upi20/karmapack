<?php

use App\Models\SPK\AHP\Alternatif\Alternatif;
use App\Models\SPK\AHP\Alternatif\Kriteria;

use App\Models\SPK\AHP\Kriteria\Kriteria as KriteriaKriteria;
use App\Models\SPK\AHP\Kriteria\Jenis\Jenis as KriteriaJenis;

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
        Schema::create(Kriteria::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('alternatif_id', false, true)->nullable()->default(null);
            $table->bigInteger('kriteria_id', false, true)->nullable()->default(null);
            $table->bigInteger('kriteria_jenis_id', false, true)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('alternatif_id')->references('id')->on(Alternatif::tableName)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kriteria_id')->references('id')->on(KriteriaKriteria::tableName)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kriteria_jenis_id')->references('id')->on(KriteriaJenis::tableName)->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Kriteria::tableName);
    }
};
