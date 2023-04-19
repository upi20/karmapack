<?php

use App\Models\Portfolio\Item;
use App\Models\Portfolio\Portfolio;
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
        Schema::create(Item::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('portfolio_id', false, true)->nullable()->default(null);
            $table->integer('urutan')->nullable()->default(1);
            $table->string('nama')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('portfolio_id')
                ->references('id')->on(Portfolio::tableName)
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Item::tableName);
    }
};
