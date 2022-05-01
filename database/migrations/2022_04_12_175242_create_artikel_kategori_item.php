<?php

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
        Schema::create('artikel_kategori_item', function (Blueprint $table) {
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

            // $table->bigInteger('created_by', false, true)->nullable()->default(null);
            // $table->foreign('created_at')
            //     ->references('id')->on('users')
            //     ->nullOnDelete()
            //     ->cascadeOnUpdate();
            // $table->bigInteger('updated_by', false, true)->nullable()->default(null);
            // $table->foreign('updated_at')
            //     ->references('id')->on('users')
            //     ->nullOnDelete()
            //     ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_kategori_detail');
    }
};
