<?php

use App\Models\Address\District;
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
        Schema::create(District::tableName, function (Blueprint $table) {
            $table->char('id', 7)->primary();
            $table->char('regency_id', 4)->nullable();
            $table->string('name');
            $table->timestamps();
            $table->foreign('regency_id')
                ->references('id')->on('address_regencies')
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
        Schema::dropIfExists(District::tableName);
    }
};
