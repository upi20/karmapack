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
        Schema::table('users', function (Blueprint $table) {
            $table->char('province_id', 2)->after('password')->nullable()->default(null);
            $table->char('regency_id', 4)->after('password')->nullable()->default(null);
            $table->char('district_id', 7)->after('password')->nullable()->default(null);
            $table->char('village_id', 10)->after('password')->nullable()->default(null);
            $table->text('alamat_lengkap')->after('password')->nullable()->default(null);

            $table->date('date_of_birth')->after('name')->nullable()->default(null);
            $table->year('angkatan')->after('name')->nullable()->default(null);
            $table->string('username')->after('email')->unique()->nullable()->default(null);
            $table->string('gender')->after('email')->nullable()->default(null);

            $table->boolean('active')->after('password')->default('0');
            $table->string('role')->after('name')->default(User::ROLE_MEMBER);

            $table->text('bio')->after('name')->nullable()->default(null);
            $table->string('profesi')->after('name')->nullable()->default(null);
            $table->string('foto')->after('name')->nullable()->default(null);
            $table->string('telepon')->after('name')->nullable()->default(null);
            $table->string('whatsapp')->after('name')->nullable()->default(null);

            // relationship
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('regency_id');
            $table->dropColumn('district_id');
            $table->dropColumn('village_id');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('angkatan');
            $table->dropColumn('username');
            $table->dropColumn('gender');
            $table->dropColumn('active');
            $table->dropColumn('role');
            $table->dropColumn('bio');
            $table->dropColumn('profesi');
            $table->dropColumn('foto');
            $table->dropColumn('telepon');
            $table->dropColumn('whatsapp');
        });
    }
};
