<?php

use App\Models\Utility\NotifAdminAtas;
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
        Schema::create(NotifAdminAtas::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->date('dari')->nullable()->default(null);
            $table->date('sampai')->nullable()->default(null);
            $table->text('link')->nullable()->default(null);
            $table->text('link_nama')->nullable()->default(null);
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
        Schema::dropIfExists(NotifAdminAtas::tableName);
    }
};
