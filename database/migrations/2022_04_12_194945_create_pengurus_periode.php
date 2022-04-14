<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusPeriode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus_periode', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->year('dari');
            $table->year('sampai');
            $table->string('slug')->unique();
            $table->text('slogan');
            $table->text('visi');
            $table->text('misi');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('pengurus_periode');
    }
}
