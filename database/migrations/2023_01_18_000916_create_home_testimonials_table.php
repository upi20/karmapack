<?php

use App\Models\Home\Testimonial;
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
        Schema::create(Testimonial::tableName, function (Blueprint $table) {
            $table->id();
            $table->integer('urutan')->nullable()->default(0);
            $table->string('nama')->nullable()->default(null);
            $table->string('sebagai')->nullable()->default(null);
            $table->string('foto')->nullable()->default(null);
            $table->text('testimoni')->nullable()->default(null);
            $table->string('tampilkan')->nullable()->default(null);
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
        Schema::dropIfExists(Testimonial::tableName);
    }
};
