<?php

use App\Models\SPK\AHP\Kriteria\Kriteria;
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
            $table->text('nama')->nullable()->default(null);
            $table->text('slug')->nullable()->default(null);
            $table->string('kode')->nullable()->default(null);
            $table->double('ci')->nullable()->default(0);
            $table->double('ri')->nullable()->default(0);
            $table->double('cr')->nullable()->default(0);
            $table->double('prioritas')->nullable()->default(0);
            $table->double('total')->nullable()->default(0);
            $table->double('eign_value')->nullable()->default(0);
            $table->timestamps();
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
