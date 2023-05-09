<?php

use App\Models\SPK\AHP\Kriteria\Jenis\Jenis;
use App\Models\SPK\AHP\Kriteria\Jenis\Perbandingan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Perbandingan::tableName, function (Blueprint $table) {
            $table->id();
            $table->double('nilai')->nullable()->default(0);
            $table->bigInteger('kriteria_x_id', false, true)->nullable()->default(null);
            $table->bigInteger('kriteria_y_id', false, true)->nullable()->default(null);
            $table->timestamps();


            $table->foreign('kriteria_x_id')->references('id')->on(Jenis::tableName)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kriteria_y_id')->references('id')->on(Jenis::tableName)->cascadeOnDelete()->cascadeOnUpdate();

            // $table->unique(['kriteria_x_id', 'kriteria_y_id']); // to long characetr
        });
        $tbl_name = Perbandingan::tableName;
        DB::statement("ALTER TABLE `$tbl_name` ADD UNIQUE(`kriteria_x_id`, `kriteria_y_id`);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Perbandingan::tableName);
    }
};
