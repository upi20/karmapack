<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusProfilePengalamanLain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus_profile_pengalaman_lain', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->text('nama');
            $table->text('keterangan')->nullable();
            $table->boolean('status')->default(0);

            // relationship
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
        Schema::dropIfExists('pengurus_profile_pengalaman_lain');
    }
}
