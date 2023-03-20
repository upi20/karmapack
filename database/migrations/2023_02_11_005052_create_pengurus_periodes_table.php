<?php

use App\Models\Kepengurusan\Periode;
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
        Schema::create(Periode::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->string('foto')->nullable()->default(null);
            $table->year('dari')->nullable()->default(null);
            $table->year('sampai')->nullable()->default(null);
            $table->string('slug')->unique()->default(null);
            $table->text('slogan')->nullable()->default(null);
            $table->text('visi')->nullable()->default(null);
            $table->text('misi')->nullable()->default(null);
            $table->text('filosofi_logo')->nullable()->default(null);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists(Periode::tableName);
    }
};
