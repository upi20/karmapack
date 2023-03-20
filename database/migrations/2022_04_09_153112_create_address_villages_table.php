<?php

use App\Models\Address\Village;
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
        Schema::create(Village::tableName, function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('district_id', 7)->nullable();
            $table->string('name');
            $table->timestamps();
            $table->foreign('district_id')
                ->references('id')->on('address_districts')
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
        Schema::dropIfExists(Village::tableName);
    }
};
