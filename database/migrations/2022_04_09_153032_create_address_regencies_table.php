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
        Schema::create('address_regencies', function (Blueprint $table) {
            $table->char('id', 4)->primary();
            $table->char('province_id', 2)->nullable();
            $table->string('name');
            $table->timestamps();
            $table->foreign('province_id')
                ->references('id')->on('address_provinces')
                // ->nullOnDelete()
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
        Schema::dropIfExists('address_regencies');
    }
};
