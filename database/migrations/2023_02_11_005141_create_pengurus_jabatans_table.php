<?php

use App\Models\Kepengurusan\Jabatan;
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
        Schema::create(Jabatan::tableName, function (Blueprint $table) {
            $tableNames = config('permission.table_names');

            $table->id();
            $table->integer('no_urut')->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->string('slug')->unique()->nullable()->default(null);
            $table->string('foto')->nullable()->nullable()->default(null);
            $table->string('singkatan')->nullable()->default(null);
            $table->text('visi')->nullable()->default(null);
            $table->text('misi')->nullable()->default(null);
            $table->text('slogan')->nullable()->default(null);
            $table->boolean('status')->default(0);
            $table->bigInteger('role_id', false, true)->nullable()->default(null);
            $table->bigInteger('periode_id', false, true)->nullable()->default(null);
            $table->bigInteger('parent_id', false, true)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on($tableNames['roles'])
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('periode_id')
                ->references('id')->on('pengurus_periodes')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('parent_id')
                ->references('id')->on(Jabatan::tableName)
                ->cascadeOnDelete()
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
        Schema::dropIfExists('jabatans');
    }
};
