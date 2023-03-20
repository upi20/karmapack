<?php

use App\Models\Keanggotaan\PendidikanJenis;
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
        Schema::create(PendidikanJenis::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama');
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
        Schema::dropIfExists(PendidikanJenis::tableName);
    }
};
