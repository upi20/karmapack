<?php

use App\Models\SettingActivity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(SettingActivity::tableName, function (Blueprint $table) {
            $table->id();
            $table->text('key')->nullable()->default(null);
            $table->text('value')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(SettingActivity::tableName);
    }
};
