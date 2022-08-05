<?php

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
        Schema::create('p_role_has_menu', function (Blueprint $table) {
            $tableNames = config('permission.table_names');
            $table->id();
            $table->bigInteger('role_id', false, true);
            $table->bigInteger('menu_id', false, true);
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on($tableNames['roles'])
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('menu_id')
                ->references('id')->on('p_menu')
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
        Schema::dropIfExists('p_role_has_menu');
    }
};
