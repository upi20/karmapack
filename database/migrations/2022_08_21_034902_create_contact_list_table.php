<?php

use App\Models\Contact\ListContact;
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
        Schema::create(ListContact::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->text('url')->nullable()->default(null);
            $table->integer('order')->nullable()->default(null);
            $table->string('keterangan')->nullable()->default(null);
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
        Schema::dropIfExists(ListContact::tableName);
    }
};
