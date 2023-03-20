<?php

use App\Models\Contact\FAQ;
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
        Schema::create(FAQ::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->string('link')->nullable()->default(null);
            $table->text('jawaban')->nullable()->default(null);
            $table->boolean('type')->nullable()->default(null)->comment('1 text, 2 link');
            $table->boolean('status')->nullable()->default(null)->comment('1 digunakan, 0 tidak digunakan');
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
        Schema::dropIfExists(FAQ::tableName);
    }
};
