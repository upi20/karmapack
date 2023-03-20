<?php

use App\Models\Keanggotaan\Kontak;
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
        Schema::create(Kontak::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_id', false, true)->nullable()->default(null);
            $table->bigInteger('anggota_id', false, true)->nullable()->default(null);
            $table->text('nilai');
            $table->timestamps();

            $table->foreign('jenis_id')
                ->references('id')->on('anggota_kontak_jenis')
                ->nullOnDelete()
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
        Schema::dropIfExists(Kontak::tableName);
    }
};
