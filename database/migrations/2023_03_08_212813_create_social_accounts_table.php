<?php

use App\Models\SocialAccount;
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
        Schema::create(SocialAccount::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('provider_id')->unique();
            $table->string('provider_name');
            $table->json('provider_data')->nullable()->default(null);
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
        Schema::dropIfExists(SocialAccount::tableName);
    }
};
