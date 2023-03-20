<?php

use App\Models\Artikel\Kategori;
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
        Schema::create(Kategori::tableName, function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('foto')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists(Kategori::tableName);
    }
};
