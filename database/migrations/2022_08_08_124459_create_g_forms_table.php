<?php

use App\Models\Pendaftaran\GForm;
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
        Schema::create(GForm::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->string('nama');
            $table->string('slug');
            $table->text('deskripsi');
            $table->integer('no_urut');
            $table->date('dari')->nullable();
            $table->date('sampai')->nullable();
            $table->text('link');
            $table->string('foto');
            $table->boolean('tampilkan')->default(0)->comment("1 ya, 0 Tidak");
            $table->boolean('status')->default(0)->comment("0 Tidak Aktif,1 Aktif,2 Ditutup");
            $table->timestamps();

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
        Schema::dropIfExists(GForm::tableName);
    }
};
