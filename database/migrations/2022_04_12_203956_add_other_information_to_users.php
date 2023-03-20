<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(User::tableName, function (Blueprint $table) {
            $table->string('username')->after('email')->unique()->nullable()->default(null);
            $table->boolean('active')->after('password')->default(0);
            $table->string('foto')->after('email')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(User::tableName, function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('active');
        });
    }
};
