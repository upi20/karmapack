<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusPeriodeJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus_periode_jabatan', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->integer('periode_id')->nullable();
            $table->integer('parrent_id')->nullable()->default(null);
            $table->integer('no_urut');
            $table->string('nama');
            $table->text('slug');
            $table->string('foto')->nullable();
            $table->text('visi');
            $table->text('misi');
            $table->text('slogan');
            $table->boolean('status')->default(0);

            // relationship
            $table->foreign('periode_id')
                ->references('id')->on('pengurus_periode')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('parrent_id')
                ->references('id')->on('pengurus_periode_jabatan')
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
        Schema::dropIfExists('pengurus_periode_jabatan');
    }
}
