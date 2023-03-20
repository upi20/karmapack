<?php

use App\Models\Keanggotaan\PengalamanLain;
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
        Schema::create(PengalamanLain::tableName, function (Blueprint $table) {
            $table->id();
            $table->text('pengalaman')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->bigInteger('anggota_id', false, true)->nullable()->default(null);
            $table->timestamps();

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
        Schema::dropIfExists(PengalamanLain::tableName);
    }
};
