<?php

use App\Models\Contact\Message;
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
        Schema::create(Message::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->text('message')->nullable()->default(null);
            $table->boolean('status')->nullable()->default(null);
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
        Schema::dropIfExists(Message::tableName);
    }
};
