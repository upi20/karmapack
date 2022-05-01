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
        Schema::create('galeri_tag_member', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->integer('galeri_id');
            $table->integer('tag_id');
            $table->timestamps();


            $table->foreign('galeri_id')
                ->references('id')->on('galeri')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('tag_id')
                ->references('id')->on('artikel_tag')
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
        Schema::dropIfExists('galeri_tag_pengurus');
    }
};
