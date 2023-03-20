<?php

use App\Models\Address\Regencie;
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
        Schema::create(Regencie::tableName, function (Blueprint $table) {
            $table->char('id', 4)->primary();
            $table->char('province_id', 2)->nullable();
            $table->string('name');
            $table->timestamps();
            $table->foreign('province_id')
                ->references('id')->on('address_provinces')
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
        Schema::dropIfExists(Regencie::tableName);
    }
};
