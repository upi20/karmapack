<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('nama');
            $table->text('slug')->unique();
            $table->string('foto')->nullable();
            $table->text('detail');
            $table->text('excerpt');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('artikel');
    }
}
