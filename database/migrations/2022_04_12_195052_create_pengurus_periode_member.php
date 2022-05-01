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
        Schema::create('pengurus_periode_member', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->integer('periode_id');
            $table->bigInteger('user_id', false, true);
            $table->timestamps();
            $table->unique(['periode_id', 'user_id']);

            // relationship
            $table->foreign('periode_id')
                ->references('id')->on('pengurus_periode')
                ->cascadeOnUpdate()
                ->cascadeOnUpdate();
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('pengurus_periode_jabatan');
    }
};
