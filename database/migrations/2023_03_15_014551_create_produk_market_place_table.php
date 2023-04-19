<?php

use App\Models\Produk\Produk;
use App\Models\Produk\MarketPlace;
use App\Models\Produk\MarketPlaceJenis;
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
        Schema::create(MarketPlace::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id', false, true)->nullable()->default(null);
            $table->bigInteger('jenis_id', false, true)->nullable()->default(null);
            $table->text('link')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('produk_id')
                ->references('id')->on(Produk::tableName)
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('jenis_id')
                ->references('id')->on(MarketPlaceJenis::tableName)
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
        Schema::dropIfExists(MarketPlace::tableName);
    }
};
