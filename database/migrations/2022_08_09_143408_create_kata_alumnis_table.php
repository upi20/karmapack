<?php

use App\Models\KataAlumni;
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
        Schema::create(KataAlumni::tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id', false, true)->nullable()->default(null);
            $table->string('sebagai');
            $table->text('deskripsi');
            $table->integer('sequence')->nullable()->default(null);
            $table->string('profesi');
            $table->boolean('status')->default(0)->comment("0 Disimpan, 1 Di Pusbish");
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
        Schema::dropIfExists(KataAlumni::tableName);
    }
};
