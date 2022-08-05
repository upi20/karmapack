<?php

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
        Schema::create('p_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->string('route')->nullable()->default(null);
            $table->integer('sequence')->nullable()->default(null);
            $table->boolean('active')->nullable()->default(1);
            $table->boolean('type')->nullable()->default(1)->comment("0 seeparator, 1 menu");
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
        Schema::dropIfExists('p_menu');
    }
};
