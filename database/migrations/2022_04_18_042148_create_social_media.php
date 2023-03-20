<?php

use App\Models\SocialMedia;
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
        Schema::create(SocialMedia::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('icon');
            $table->string('url');
            $table->integer('order');
            $table->string('keterangan');
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
        Schema::dropIfExists(SocialMedia::tableName);
    }
};
