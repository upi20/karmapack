<?php

use App\Models\Artikel\KategoriArtikel;
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
        Schema::create(KategoriArtikel::tableName, function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->integer('artikel_id');
            $table->integer('kategori_id');
            $table->timestamps();

            $table->foreign('artikel_id')
                ->references('id')->on('artikel')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('kategori_id')
                ->references('id')->on('artikel_kategori')
                ->cascadeOnDelete()
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
        Schema::dropIfExists(KategoriArtikel::tableName);
    }
};
