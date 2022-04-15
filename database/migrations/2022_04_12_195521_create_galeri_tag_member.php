<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriTagMember extends Migration
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
}
