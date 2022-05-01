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
        Schema::create('pengurus_periode_jabatan_member', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->integer('jabatan_id');
            $table->bigInteger('user_id', false, true);
            $table->unique(['jabatan_id', 'user_id'], 'jabatan_id_user_id');

            // relationship
            $table->foreign('jabatan_id')
                ->references('id')->on('pengurus_periode_jabatan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()
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
        Schema::dropIfExists('pengurus_periode_detail');
    }
};
