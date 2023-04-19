<?php

use App\Models\Produk\Produk;
use App\Models\Produk\Kategori;
use App\Models\User;
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
        Schema::create(Produk::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id', false, true)->nullable()->default(null);
            $table->text('nama')->nullable()->default(null);
            $table->text('slug')->nullable()->default(null)->unique();
            $table->text('sku')->nullable()->default(null);
            $table->text('kilasan')->nullable()->default(null);
            $table->text('informasi_lain')->nullable()->default(null);
            $table->boolean('tampilkan_harga')->nullable()->default(0);
            $table->integer('harga')->nullable()->default(0);
            $table->integer('harga_diskon')->nullable()->default(null);
            $table->boolean('status_stok')->nullable()->default(false);
            $table->integer('rating')->nullable()->default(0);
            $table->string('rating_nama')->nullable()->default(null);
            $table->integer('jml_dilihat')->nullable()->default(0);
            $table->boolean('tampilkan_di_halaman_utama')->nullable()->default(false);
            $table->boolean('is_insert')->nullable()->default(true);
            $table->bigInteger('created_by', false, true)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('created_by')
                ->references('id')->on(User::tableName)
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('kategori_id')
                ->references('id')->on(Kategori::tableName)
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
        Schema::dropIfExists(Produk::tableName);
    }
};
