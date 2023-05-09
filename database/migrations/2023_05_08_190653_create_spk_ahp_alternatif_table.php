<?php

use App\Models\Keanggotaan\Anggota;
use App\Models\SPK\AHP\Alternatif\Alternatif;
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
        Schema::create(Alternatif::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anggota_id', false, true)->nullable()->default(null);
            $table->timestamps();
            $table->foreign('anggota_id')->references('id')->on(Anggota::tableName)->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Alternatif::tableName);
    }
};
