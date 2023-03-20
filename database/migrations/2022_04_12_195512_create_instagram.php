<?php

use App\Models\Instagram;
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
        Schema::create(Instagram::tableName, function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('nama');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->boolean('status')->default(0)->comment('1 digunakan 0 tidak digunakan');
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
        Schema::dropIfExists(Instagram::tableName);
    }
};
