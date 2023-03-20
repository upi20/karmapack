<?php

use App\Models\Artikel\Artikel;
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
        Schema::create(Artikel::tableName, function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('foto')->nullable();
            $table->text('detail');
            $table->text('excerpt');
            $table->integer('counter')->default(0);
            $table->date('date')->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->nullOnDelete()
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
        Schema::dropIfExists(Artikel::tableName);
    }
};
