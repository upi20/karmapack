<?php

use App\Models\Kepengurusan\Anggota;
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
        Schema::create(Anggota::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jabatan_id', false, true)->nullable()->default(null);
            $table->bigInteger('anggota_id', false, true)->nullable()->default(null);
            $table->unique(['jabatan_id', 'anggota_id'], 'jabatan_anggota');
            $table->timestamps();

            // relationship
            $table->foreign('jabatan_id')
                ->references('id')->on('pengurus_jabatans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('anggota_id')
                ->references('id')->on('anggotas')
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
        Schema::dropIfExists(Anggota::tableName);
    }
};
