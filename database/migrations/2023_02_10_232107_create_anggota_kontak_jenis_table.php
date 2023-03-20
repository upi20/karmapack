<?php

use App\Models\Keanggotaan\KontakJenis;
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
        Schema::create(KontakJenis::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('icon')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
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
        Schema::dropIfExists(KontakJenis::tableName);
    }
};
