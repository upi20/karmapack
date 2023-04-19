<?php

use App\Models\TrackerIPDetail;
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
        Schema::create(TrackerIPDetail::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('city')->nullable()->default(null);
            $table->string('region')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('country_code')->nullable()->default(null);
            $table->string('loc')->nullable()->default(null);
            $table->string('timezone')->nullable()->default(null);
            $table->timestamps();

            $table->bigInteger('visitors_id', false, true)->nullable()->default(null);
            $table->foreign('visitors_id')
                ->references('id')->on('visitors')
                ->cascadeOnDelete()
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
        Schema::dropIfExists(TrackerIPDetail::tableName);
    }
};
