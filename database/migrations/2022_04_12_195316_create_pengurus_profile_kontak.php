<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusProfileKontak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus_profile_kontak', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->integer('kontak_tipe_id')->nullable()->default(null);
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->text('value');

            // relationship
            $table->foreign('kontak_tipe_id')
                ->references('id')->on('pengurus_profile_kontak_tipe')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('pengurus_profile_kontak');
    }
}
