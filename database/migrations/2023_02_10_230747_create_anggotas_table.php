<?php

use App\Models\Keanggotaan\Anggota;
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
        Schema::create(Anggota::tableName, function (Blueprint $table) {
            $table->id();
            $table->string('nomor_anggota')->unique()->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->date('tanggal_lahir')->nullable()->default(null);
            $table->string('jenis_kelamin')->nullable()->default(null);
            $table->year('angkatan')->nullable()->default(null);

            $table->char('province_id', 2)->nullable()->default(null);
            $table->char('regency_id', 4)->nullable()->default(null);
            $table->char('district_id', 7)->nullable()->default(null);
            $table->char('village_id', 10)->nullable()->default(null);
            $table->text('alamat_lengkap')->nullable()->default(null);

            $table->text('bio')->nullable()->default(null);
            $table->string('profesi')->nullable()->default(null);
            $table->string('foto')->nullable()->default(null);
            $table->string('telepon')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);

            $table->bigInteger('user_id', false, true)->nullable()->default(null);

            $table->timestamps();

            $table->foreign('province_id')
                ->references('id')->on('address_provinces')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('regency_id')
                ->references('id')->on('address_regencies')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('district_id')
                ->references('id')->on('address_districts')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('village_id')
                ->references('id')->on('address_villages')
                ->nullOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists(Anggota::tableName);
    }
};
