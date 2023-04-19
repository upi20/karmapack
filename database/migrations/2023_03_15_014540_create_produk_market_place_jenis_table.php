<?php

use App\Models\Produk\Produk;
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
        Schema::create(MarketPlaceJenis::tableName, function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable()->default(null);
            $table->text('link')->nullable()->default(null);
            $table->text('link_produk')->nullable()->default(null);
            $table->text('slug')->nullable()->default(null);
            $table->string('foto_icon')->nullable()->default(null);
            $table->string('foto_cover')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
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
        Schema::dropIfExists(MarketPlaceJenis::tableName);
    }
};
