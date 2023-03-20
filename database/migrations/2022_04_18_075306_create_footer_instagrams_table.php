<?php

use App\Models\FooterInstagram;
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
        Schema::create(FooterInstagram::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('url')->nullable();
            $table->string('foto');
            $table->integer('order');
            $table->string('keterangan')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists(FooterInstagram::tableName);
    }
};
