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
        Schema::create('pengurus_profile_pengalaman_organisasi', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->text('nama');
            $table->year('dari');
            $table->year('sampai')->nullable();
            $table->string('jabatan');
            $table->text('keterangan')->nullable();

            // relationship
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();

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
        Schema::dropIfExists('pengurus_profile_pengalaman_organisasi');
    }
};
