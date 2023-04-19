<?php

use App\Models\Produk\Produk;
use App\Models\Produk\VarianWarna;
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
        Schema::create(VarianWarna::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id', false, true)->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->string('kode')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('produk_id')
                ->references('id')->on(Produk::tableName)
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(VarianWarna::tableName);
    }
};
