<?php

use App\Models\Tracker;
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
        Schema::create(Tracker::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->date('date');
            $table->time('time');
            $table->string('platform')->nullable()->default(null);
            $table->string('browser')->nullable()->default(null);
            $table->string('browser_version')->nullable()->default(null);
            $table->string('user_agent')->nullable()->default(null);
            $table->integer('hits')->default(0);
            $table->boolean('has_detail')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Tracker::tableName);
    }
};
