<?php

use App\Models\Versioning;
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
        Schema::create(Versioning::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->dateTime('waktu')->nullable()->default(null);
            $table->text('deskripsi')->nullable()->default(null);
            $table->string('kode')->nullable()->default(null);
            $table->integer('major')->nullable()->default(null);
            $table->integer('minor')->nullable()->default(null);
            $table->integer('patch')->nullable()->default(null);
            $table->text('oprional')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Versioning::tableName);
    }
};
