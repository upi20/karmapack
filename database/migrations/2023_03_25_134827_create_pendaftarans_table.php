<?php

use App\Models\Pendaftaran;
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
        Schema::create(Pendaftaran::tableName, function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable()->default(null);
            $table->string('jenis_kelamin')->nullable()->default(null);
            $table->date('tanggal_lahir')->nullable()->default(null);
            $table->text('alamat')->nullable()->default(null);
            $table->string('no_telepon')->nullable()->default(null);
            $table->string('no_whatsapp')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
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
        Schema::dropIfExists(Pendaftaran::tableName);
    }
};
