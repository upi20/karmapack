<?php

use App\Models\Portfolio\Kategori;
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
        Schema::create(Kategori::tableName, function (Blueprint $table) {
            $table->id();
            $table->integer('urutan')->nullable()->default(1);
            $table->string('nama')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null)->unique();
            $table->text('keterangan')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Kategori::tableName);
    }
};
